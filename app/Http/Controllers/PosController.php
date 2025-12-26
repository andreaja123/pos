<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function index()
    {
        // Mengambil produk awal untuk ditampilkan di katalog
        $products = Product::with(['images', 'stocks'])->where('is_active', true)->get();
        return view('penjualan.fakturBaruKasir', compact('products'));
    }

    public function searchProduct(Request $request)
    {
        $query = $request->get('query');
        return Product::with(['images', 'stocks'])
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('code', 'LIKE', "%{$query}%")
            ->get();
    }

    public function searchCustomer(Request $request)
    {
        $query = $request->get('query');
        return Customer::where('name', 'LIKE', "%{$query}%")
            ->orWhere('phone', 'LIKE', "%{$query}%")
            ->get();
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            // =======================
            // 1. SIMPAN INVOICE
            // =======================
            $invoice = Invoice::create([
                'invoice_number' => 'INV-' . now()->format('YmdHis'),
                'po_reference' => $request->po_reference,
                'invoice_date' => $request->invoice_date,
                'due_date' => $request->due_date,
                'customer_name' => $request->customer_name,
                'customer_address' => $request->customer_address,
                'subtotal' => $request->subtotal,
                'total_tax' => $request->total_tax, 
                'shipping_cost' => $request->shipping_cost,
                'additional_discount' => $request->additional_discount,
                'grand_total' => $request->grand_total,
                'status' => 'paid'
            ]);

            // =======================
            // 2. SIMPAN ITEM
            // =======================
            foreach ($request->items as $item) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $item['product_id'] ?? null,
                    'item_name' => $item['name'], // ✅ BENAR
                    'qty' => $item['qty'],
                    'unit_price' => $item['price'],
                    'tax_percent' => $item['taxRate'],
                    'discount_percent' => $item['discRate'],
                    'amount' => $item['amount'],
                ]);
            }

        });

        return response()->json(['message' => 'Transaksi berhasil disimpan']);
    }
}