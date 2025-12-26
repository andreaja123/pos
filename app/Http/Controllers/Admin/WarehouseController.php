<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use App\Http\Requests\StoreWarehouseRequest;
use App\Http\Requests\UpdateWarehouseRequest;
use Illuminate\Http\Request;
use App\Exports\WarehousesExport;
use Maatwebsite\Excel\Facades\Excel;

class WarehouseController extends Controller
{
    /**
     * Menampilkan daftar gudang dengan kalkulasi stok.
     */
    public function index(Request $request)
    {
        $query = Warehouse::query();

        // Fitur Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%");
        }

        // Logic kalkulasi total_produk (count row) dan jumlah_stok (sum quantity)
        // Menggunakan withCount dan withSum agar efisien (1 query) tanpa N+1 problem
        $warehouses = $query->withCount('stocks as total_produk')
            ->withSum('stocks as jumlah_stok', 'quantity')
            ->latest()
            ->paginate(10)
            ->withQueryString(); // Agar parameter search tetap ada saat pindah halaman

        return view('persediaan.gudang', compact('warehouses'));
    }

    /**
     * Menyimpan gudang baru.
     */
    public function store(StoreWarehouseRequest $request)
    {
        Warehouse::create($request->validated());

        return redirect()->route('warehouses.index')
            ->with('success', 'Gudang berhasil ditambahkan.');
    }

    /**
     * Update gudang.
     */
    public function update(UpdateWarehouseRequest $request, Warehouse $warehouse)
    {
        $warehouse->update($request->validated());

        return redirect()->route('warehouses.index')
            ->with('success', 'Data gudang berhasil diperbarui.');
    }

    /**
     * Hapus gudang (Soft Delete).
     */
    public function destroy(Warehouse $warehouse)
    {
        // Opsional: Cek jika gudang masih punya stok sebelum dihapus
        // if ($warehouse->stocks()->sum('quantity') > 0) {
        //    return back()->with('error', 'Gudang masih memiliki stok aktif.');
        // }

        $warehouse->delete();

        return redirect()->route('warehouses.index')
            ->with('success', 'Gudang berhasil dihapus (arsip).');
    }


    public function export()
    {
        return Excel::download(
            new WarehousesExport,
            'data-gudang.xlsx'
        );
    }
}