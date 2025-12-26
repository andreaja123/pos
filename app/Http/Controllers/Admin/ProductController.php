<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    // app/Http/Controllers/ProductController.php

    public function index(Request $request)
    {
        // 1. Query Dasar dengan Eager Loading agar efisien
        $query = Product::with(['category', 'stocks']);

        // 2. Fitur Pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%")
                    ->orWhere('barcode', 'like', "%{$search}%");
            });
        }

        // 3. Ambil Data dengan Pagination (10 per halaman)
        // withSum('stocks', 'quantity') otomatis membuat field 'stocks_sum_quantity'
        $products = $query->withSum('stocks', 'quantity')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // 4. Hitung Statistik (Top Cards)
        // Menggunakan Query Builder langsung agar ringan (tidak load semua model ke memori)

        // Total Item (Jumlah fisik semua barang)
        $totalStock = \DB::table('product_stocks')->sum('quantity');

        // Stok Menipis (Misal: jika stok di gudang manapun <= 5)
        $lowStockCount = \DB::table('product_stocks')
            ->where('quantity', '<=', 5)
            ->count();

        // Total Nilai Aset (Qty * Harga Beli)
        $totalAssetValue = \DB::table('product_stocks')
            ->join('products', 'product_stocks.product_id', '=', 'products.id')
            ->sum(\DB::raw('product_stocks.quantity * products.cost_price'));

        return view('persediaan.kelolaprodukbaru', compact('products', 'totalStock', 'lowStockCount', 'totalAssetValue'));
    }
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        $subcategories = Category::whereNotNull('parent_id')->get(); // Idealnya via AJAX
        $warehouses = Warehouse::all();

        return view('persediaan.produkbaru', compact('categories', 'subcategories', 'warehouses'));
    }

    public function store(Request $request)
    {

        // 1. Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:50',
            'barcode' => 'nullable|string|unique:products,barcode',
            'cost_price' => 'required|numeric|min:0',
            'sell_price' => 'required|numeric|gte:cost_price', // Sell price >= Cost price
            'tax_rate' => 'nullable|numeric|min:0',
            'discount_rate' => 'nullable|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            // Validasi Array (Variasi, Stok, Serial)
            // Pastikan HTML name menggunakan array: variants[0][brand], stocks[0][quantity], dll.
            'variants' => 'nullable|array',
            'variants.*.brand' => 'nullable|string',
            'variants.*.color' => 'nullable|string',
            'variants.*.size' => 'nullable|string',

            'stocks' => 'nullable|array',
            'stocks.*.warehouse_id' => 'required|exists:warehouses,id',
            'stocks.*.quantity' => 'required|numeric|min:0',

            'serials' => 'nullable|array',
            'serials.*' => 'required|string|distinct'
        ], [
            'sell_price.gte' => 'Harga jual tidak boleh lebih rendah dari harga beli (HPP).',
            'barcode.unique' => 'Barcode sudah terdaftar pada produk lain.'
        ]);

        try {
            DB::beginTransaction();

            // 2. Simpan Data Produk Utama
            $product = Product::create([
                'name' => $request->name,
                'code' => $request->code ?? 'PRD-' . strtoupper(Str::random(8)), // Auto-generate jika kosong
                'barcode' => $request->barcode,
                'barcode_digits' => $request->barcode_digits ?? 13,
                'cost_price' => $request->cost_price,
                'sell_price' => $request->sell_price,
                'tax_rate' => $request->tax_rate ?? 0,
                'discount_rate' => $request->discount_rate ?? 0,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'default_warehouse_id' => $request->warehouse_id,
                'is_active' => $request->has('is_active') ? true : false, // Checkbox handling
            ]);

            // 3. Upload & Simpan Gambar
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('product-images', 'public');
                $product->images()->create([
                    'image_path' => $path,
                    'is_primary' => true
                ]);
            }

            // 4. Simpan Variasi Produk
            if ($request->has('variants')) {
                foreach ($request->variants as $variant) {
                    // Skip jika baris kosong
                    if (empty($variant['brand']) && empty($variant['color']) && empty($variant['size'])) continue;

                    $product->variants()->create([
                        'brand' => $variant['brand'] ?? null,
                        'color' => $variant['color'] ?? null,
                        'size' => $variant['size'] ?? null,
                        'stock' => $variant['stock'] ?? 0,
                        'stock_alert' => $variant['alert'] ?? 0,
                    ]);
                }
            }

            // 5. Simpan Stok Gudang
            if ($request->has('stocks')) {
                foreach ($request->stocks as $stock) {
                    $product->stocks()->create([
                        'warehouse_id' => $stock['warehouse_id'],
                        'quantity' => $stock['quantity'],
                        'alert_limit' => $stock['alert_limit'] ?? 5
                    ]);
                }
            }

            // 6. Simpan Serial Number
            if ($request->has('serials')) {
                foreach ($request->serials as $serial) {
                    if (!empty($serial)) {
                        $product->serials()->create([
                            'serial_number' => $serial,
                            'status' => 'available'
                        ]);
                    }
                }
            }

            DB::commit();

            return redirect()->route('products.index')
                ->with('success', 'Produk berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $product = Product::with(['category', 'subCategory', 'variants', 'stocks.warehouse', 'images', 'serials'])
            ->findOrFail($id);


        return view('persediaan.detailproduk', compact('product'));
    }

    /**
     * Menampilkan Form Edit
     */
    public function edit($id)
    {
        $product = Product::with(['variants', 'stocks', 'serials', 'images'])->findOrFail($id);

        $categories = Category::whereNull('parent_id')->where('is_active', true)->get();
        $subcategories = Category::whereNotNull('parent_id')->where('is_active', true)->get();
        $warehouses = Warehouse::all();

        return view('persediaan.editproduk', compact('product', 'categories', 'subcategories', 'warehouses'));
    }

    /**
     * Proses Update Data
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // 1. Validation (Mirip store, tapi ignore ID sendiri untuk unique check)
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:50',
            'barcode' => ['nullable', 'string', Rule::unique('products')->ignore($product->id)],
            'cost_price' => 'required|numeric|min:0',
            'sell_price' => 'required|numeric|gte:cost_price',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            // Validasi Array
            'variants' => 'nullable|array',
            'stocks' => 'nullable|array',
            'stocks.*.warehouse_id' => 'required',
            'stocks.*.quantity' => 'required|numeric',
        ]);

        try {
            DB::beginTransaction();

            // 2. Update Produk Utama
            $product->update([
                'name' => $request->name,
                'code' => $request->code,
                'barcode' => $request->barcode,
                'barcode_digits' => $request->barcode_digits,
                'cost_price' => $request->cost_price,
                'sell_price' => $request->sell_price,
                'tax_rate' => $request->tax_rate ?? 0,
                'discount_rate' => $request->discount_rate ?? 0,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'default_warehouse_id' => $request->warehouse_id,
                'is_active' => $request->has('is_active') ? true : false,
            ]);

            // 3. Update Gambar (Jika ada upload baru)
            if ($request->hasFile('image')) {
                // Hapus gambar lama
                $oldImage = $product->images()->where('is_primary', true)->first();
                if ($oldImage) {
                    Storage::disk('public')->delete($oldImage->image_path);
                    $oldImage->delete();
                }

                // Upload baru
                $path = $request->file('image')->store('product-images', 'public');
                $product->images()->create([
                    'image_path' => $path,
                    'is_primary' => true
                ]);
            }

            // 4. Update Variasi (Strategi: Hapus Semua & Buat Ulang untuk simplifikasi form repeater)
            // Note: Di sistem produksi besar, sebaiknya update based on ID agar history terjaga.
            if ($request->has('variants')) {
                $product->variants()->delete(); // Reset varian
                foreach ($request->variants as $variant) {
                    if (empty($variant['brand']) && empty($variant['color']) && empty($variant['size'])) continue;
                    $product->variants()->create($variant);
                }
            }

            // 5. Update Stok
            if ($request->has('stocks')) {
                $product->stocks()->delete(); // Reset stok
                foreach ($request->stocks as $stock) {
                    $product->stocks()->create($stock);
                }
            }

            // 6. Update Serial
            if ($request->has('serials')) {
                // Hanya tambah serial baru, jangan hapus yang lama jika status 'sold' (opsional logic)
                $product->serials()->delete();
                foreach ($request->serials as $serial) {
                    if (!empty($serial)) {
                        $product->serials()->create([
                            'serial_number' => $serial,
                            'status' => 'available'
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal update: ' . $e->getMessage());
        }
    }

    public function export()
    {
        return Excel::download(
            new ProductsExport,
            'laporan-produk.xlsx'
        );
    }
    public function search(Request $request)
    {
        return Product::where('name', 'like', '%' . $request->q . '%')
            ->limit(10)
            ->get(['id', 'name', 'cost_price']);
    }
}