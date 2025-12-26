<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\CategoriesExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SingleCategoryExport;

class CategoryController extends Controller
{
    public function index(Request $request)
    {

        $categories = Category::query()
            ->with('parent')
            ->withCount([
                'products as total_produk' => function ($q) {
                    $q->where('is_active', true);
                },
            ])
            ->withSum([
                'products as jumlah_stok' => function ($q) {
                    $q->join('product_stocks', 'products.id', '=', 'product_stocks.product_id');
                }
            ], 'product_stocks.quantity')
            ->when($request->search, function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(10)
            ->withQueryString();

        $categories->getCollection()->transform(function ($category) {
            $category->kelayakan_persen = $category->jumlah_stok
                ? min(100, round(($category->total_produk / $category->jumlah_stok) * 100))
                : 0;

            return $category;
        });

        return view('persediaan.kategoriproduk', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'parent_id' => 'nullable|exists:categories,id',
            'is_active' => 'nullable|boolean',
        ]);

        Category::create([
            'name' => $validated['name'],
            'parent_id' => $validated['parent_id'] ?? null,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'is_active' => 'nullable|boolean',
        ]);

        $category->update($request->only('name', 'parent_id', 'is_active'));

        return back()->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Kategori berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(
            new CategoriesExport,
            'laporan_kategori_produk.xlsx'
        );
    }

    public function exportSingle(Category $category)
    {
        return Excel::download(
            new SingleCategoryExport($category->id),
            'kategori-' . \Str::slug($category->name) . '.xlsx'
        );
    }
}