<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Exports\SuppliersExport;
use Maatwebsite\Excel\Facades\Excel;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('per_page', 10);

        $suppliers = Supplier::query()
            ->when($search, function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate($perPage)
            ->withQueryString(); // 🔥 penting agar search tidak hilang saat pagination

        return view('persediaan.kelolasupplier', compact('suppliers', 'search', 'perPage'));
    }

    public function create()
    {
        return view('persediaan.supplierbaru');
    }

    public function store(StoreSupplierRequest $request): RedirectResponse
    {
        Supplier::create($request->validated());

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function update(StoreSupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->validated());

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier berhasil diperbarui.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier berhasil dihapus.');
    }
    public function show(Supplier $supplier)
    {
        return view('persediaan.detailsupplier', compact('supplier'));
    }
    public function export()
    {
        return Excel::download(new SuppliersExport, 'laporan-supplier.xlsx');
    }
    public function search(Request $request)
    {
        return Supplier::where('name', 'like', '%' . $request->q . '%')
            ->limit(10)
            ->get(['id', 'name', 'email', 'address']);
    }
}
