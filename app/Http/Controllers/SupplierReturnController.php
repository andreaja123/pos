<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierReturn;
use Illuminate\Support\Facades\DB;

class SupplierReturnController extends Controller
{
    public function index(Request $request)
    {
        $query = SupplierReturn::with('supplier')->latest();

        // 🔍 SEARCH
        if ($request->search) {
            $query->where('return_code', 'like', '%' . $request->search . '%')
                  ->orWhereHas('supplier', function ($q) use ($request) {
                      $q->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('company', 'like', '%' . $request->search . '%');
                  });
        }

        // 📅 FILTER DATE
        if ($request->start && $request->end) {
            $query->whereBetween('return_date', [$request->start, $request->end]);
        }

        $returns = $query->paginate(10)->withQueryString();
        $suppliers = \App\Models\Supplier::select('id', 'company')->orderBy('company')->get();
        return view('persediaan.catatansupplier', compact('returns', 'suppliers'));
    }

    /**
     * TAMBAH DATA
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id'   => 'required|exists:suppliers,id',
            'return_date'   => 'required|date',
            'total_amount'  => 'required|numeric|min:0',
            'status'        => 'required|in:pending,proses,selesai',
        ]);

        DB::transaction(function () use ($request) {
            SupplierReturn::create([
                'return_code'  => $this->generateCode(),
                'supplier_id'  => $request->supplier_id,
                'return_date'  => $request->return_date,
                'total_amount' => $request->total_amount,
                'status'       => $request->status,
            ]);
        });

        return redirect()
            ->route('retur.index')
            ->with('success', 'Retur supplier berhasil ditambahkan');
    }

    /**
     * EDIT / UPDATE
     */
    public function update(Request $request, $id)
    {
        $retur = SupplierReturn::findOrFail($id);

        $request->validate([
            'supplier_id'   => 'required|exists:suppliers,id',
            'return_date'   => 'required|date',
            'total_amount'  => 'required|numeric|min:0',
            'status'        => 'required|in:pending,proses,selesai',
        ]);

        DB::transaction(function () use ($request, $retur) {
            $retur->update([
                'supplier_id'  => $request->supplier_id,
                'return_date'  => $request->return_date,
                'total_amount' => $request->total_amount,
                'status'       => $request->status,
            ]);
        });

        return redirect()
            ->route('retur.index')
            ->with('success', 'Retur supplier berhasil diperbarui');
    }

    /**
     * DELETE
     */
    public function destroy($id)
    {
        $retur = SupplierReturn::findOrFail($id);

        DB::transaction(function () use ($retur) {
            $retur->delete();
        });

        return redirect()
            ->route('retur.index')
            ->with('success', 'Retur supplier berhasil dihapus');
    }

    private function generateCode()
    {
        $last = SupplierReturn::latest()->first();

        $number = $last
            ? intval(substr($last->return_code, -3)) + 1
            : 1;

        return 'RET-' . date('Y') . '-' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }
}