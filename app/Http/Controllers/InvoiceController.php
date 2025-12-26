<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index(Request $request)
{
    $query = Invoice::latest();

    // 1. Search (No Faktur / Nama Pelanggan)
    if ($request->search) {
        $query->where('invoice_number', 'like', '%' . $request->search . '%')
              ->orWhere('customer_name', 'like', '%' . $request->search . '%');
    }

    // 2. Filter Status
    if ($request->status) {
        $query->where('status', $request->status);
    }

    // 3. Filter Tanggal
    if ($request->date) {
        $query->whereDate('invoice_date', $request->date);
    }

    $invoices = $query->paginate(10)->withQueryString();

    return view('penjualan.kelolafaktur', compact('invoices'));
}

    public function create()
    {
        // Generate Auto Number INV-YYYY001 (Opsional)
        $latest = Invoice::latest()->first();
        $nextId = $latest ? $latest->id + 1 : 1;
        $invNumber = 'INV-' . date('Y') . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        return view('penjualan.fakturbaru', compact('invNumber'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $validated = $request->validate([
            'customer_name' => 'nullable|string|max:255',
            'customer_address' => 'nullable|string',
            'invoice_number' => 'required|unique:invoices,invoice_number',
            'po_reference' => 'nullable|string|max:255',
            'invoice_date' => 'required|date',
            'due_date' => 'nullable|date',
            'global_tax_percent' => 'nullable|numeric|min:0',
            'admin_note' => 'nullable|string',
            'customer_note' => 'nullable|string',
            'shipping_cost' => 'nullable|numeric|min:0',
            'additional_discount' => 'nullable|numeric|min:0',
            'status' => 'required|in:draft,published', // Dari tombol submit
            
            // Validasi Array Items
            'items' => 'required|array|min:1',
            'items.*.item_name' => 'required|string',
            'items.*.qty' => 'required|numeric|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            // 2. Hitung Ulang Total di Backend (Security Best Practice)
            $subtotal = 0;
            $totalItemDiscount = 0;
            $totalTax = 0;

            // Variabel penampung untuk items yang akan di-insert
            $itemsData = [];

            foreach ($request->items as $item) {
                $qty = $item['qty'];
                $price = $item['unit_price'];
                $taxPct = $item['tax_percent'] ?? 0;
                $discPct = $item['discount_percent'] ?? 0;

                // Hitung per baris
                $grossAmount = $qty * $price;
                $discountAmount = $grossAmount * ($discPct / 100);
                $taxAmount = ($grossAmount - $discountAmount) * ($taxPct / 100);
                $lineTotal = $grossAmount - $discountAmount + $taxAmount;

                // Akumulasi ke header
                $subtotal += $grossAmount;
                $totalItemDiscount += $discountAmount;
                $totalTax += $taxAmount;

                $itemsData[] = [
                    'item_name' => $item['item_name'],
                    'description' => $item['description'] ?? null,
                    'qty' => $qty,
                    'unit_price' => $price,
                    'tax_percent' => $taxPct,
                    'discount_percent' => $discPct,
                    'amount' => $lineTotal
                ];
            }

            // Hitung Pajak Global (Jika ada input pajak global)
            $globalTaxPct = $request->input('global_tax_percent', 0);
            $globalTaxAmount = ($subtotal - $totalItemDiscount) * ($globalTaxPct / 100);
            $totalTax += $globalTaxAmount;

            // Grand Total
            $shipping = $request->input('shipping_cost', 0);
            $additionalDisc = $request->input('additional_discount', 0); // Nominal langsung

            $grandTotal = ($subtotal - $totalItemDiscount) + $totalTax + $shipping - $additionalDisc;

            // 3. Simpan Header Invoice
            $invoice = Invoice::create([
                'invoice_number' => $request->invoice_number,
                'po_reference' => $request->po_reference,
                'invoice_date' => $request->invoice_date,
                'due_date' => $request->due_date,
                'customer_name' => $request->customer_name ?? 'Umum / Walk-in',
                'customer_address' => $request->customer_address,
                'global_tax_percent' => $globalTaxPct,
                'admin_note' => $request->admin_note,
                'customer_note' => $request->customer_note,
                'subtotal' => $subtotal,
                'total_tax' => $totalTax,
                'total_item_discount' => $totalItemDiscount,
                'shipping_cost' => $shipping,
                'additional_discount' => $additionalDisc,
                'grand_total' => $grandTotal,
                'status' => $request->status
            ]);

            // 4. Simpan Items via Relationship
            $invoice->items()->createMany($itemsData);

            DB::commit();

            return redirect()->route('invoices.index')
                ->with('success', 'Faktur berhasil dibuat!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}