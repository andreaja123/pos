<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePurchaseOrderRequest;

class PurchaseOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = PurchaseOrder::with(['supplier'])
            ->latest('order_date');

        // 🔍 SEARCH
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('reference_no', 'like', '%' . $request->search . '%')
                    ->orWhereHas('supplier', function ($s) use ($request) {
                        $s->where('name', 'like', '%' . $request->search . '%');
                    });
            });
        }

        // 📅 FILTER DATE
        if ($request->filled('from_date')) {
            $query->whereDate('order_date', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('order_date', '<=', $request->to_date);
        }

        $orders = $query->paginate(10)->withQueryString();

        return view('persediaan.kelolapesananbaru', compact('orders'));
    }
    public function create()
    {
        return view('persediaan.pesananbaru', [
            'suppliers' => Supplier::orderBy('name')->get(),
            'warehouses' => Warehouse::all(),
            'products' => Product::all(),
        ]);
    }


    public function store(StorePurchaseOrderRequest $request)
    {

        DB::transaction(function () use ($request) {

            $subtotal = 0;
            $totalTax = 0;
            $totalDiscount = 0;

            foreach ($request->items as $item) {
                $lineSubtotal = $item['qty'] * $item['price'];
                $tax = ($item['tax'] ?? 0) / 100 * $lineSubtotal;
                $discount = ($item['discount'] ?? 0) / 100 * $lineSubtotal;

                $subtotal += $lineSubtotal;
                $totalTax += $tax;
                $totalDiscount += $discount;
            }

            $order = PurchaseOrder::create([
                'supplier_id' => $request->supplier_id,
                'warehouse_id' => $request->warehouse_id,
                'reference_no' => $request->reference_no,
                'order_date' => $request->order_date,
                'due_date' => $request->due_date,
                'note' => $request->note,
                'subtotal' => $subtotal,
                'total_tax' => $totalTax,
                'total_discount' => $totalDiscount,
                'shipping_cost' => $request->shipping_cost ?? 0,
                'grand_total' => $subtotal + $totalTax - $totalDiscount + ($request->shipping_cost ?? 0),
                'update_stock' => $request->boolean('update_stock'),
                'status' => 'completed',
            ]);

            foreach ($request->items as $item) {
                $lineSubtotal = $item['qty'] * $item['price'];
                $tax = ($item['tax'] ?? 0) / 100 * $lineSubtotal;
                $productName = Product::find($item['product_id'])->name ?? 'Produk Tidak Diketahui';

                $order->items()->create([
                    'product_id' => $item['product_id'] ?? null,
                    'product_name' => $productName,
                    'description' => $item['description'] ?? null,
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'tax_percent' => $item['tax_percent'] ?? 0,
                    'tax_amount' => $tax,
                    'discount' => $item['discount'] ?? 0,
                    'subtotal' => $lineSubtotal + $tax - ($item['discount'] ?? 0),
                ]);

                // 🚚 Update stok (jika diaktifkan)
                if ($request->boolean('update_stock') && !empty($item['product_id'])) {
                    ProductStock::updateOrCreate(
                        [
                            'product_id' => $item['product_id'],
                            'warehouse_id' => $request->warehouse_id,
                        ],
                        [
                            'quantity' => DB::raw('quantity + ' . $item['qty']),
                        ]
                    );
                }
            }
        });

        return redirect()
            ->route('purchase-orders.index')
            ->with('success', 'Pesanan pembelian berhasil dibuat.');
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->load(['supplier', 'warehouse', 'items.product']);
        $discount = $purchaseOrder->total_discount / 100 * $purchaseOrder->subtotal;
        $tax = $purchaseOrder->total_tax / 100 * $purchaseOrder->subtotal;
        return view('persediaan.detailpesanan', compact('purchaseOrder', 'discount', 'tax'));
    }

    public function edit(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->load('items');
        return view('persediaan.editpesanan', [
            'purchaseOrder' => $purchaseOrder,
            'suppliers' => Supplier::orderBy('name')->get(),
            'warehouses' => Warehouse::all(),
            'products' => Product::all(),
        ]);
    }

    public function update(StorePurchaseOrderRequest $request, PurchaseOrder $purchaseOrder)
    {
        DB::transaction(function () use ($request, $purchaseOrder) {

            // Hapus item lama
            $purchaseOrder->items()->delete();

            $subtotal = 0;
            $totalTax = 0;
            $totalDiscount = 0;

            foreach ($request->items as $item) {
                $lineSubtotal = $item['qty'] * $item['price'];
                $tax = ($item['tax'] ?? 0) / 100 * $lineSubtotal;
                $discount = ($item['discount'] ?? 0) / 100 * $lineSubtotal;

                $subtotal += $lineSubtotal;
                $totalTax += $tax;
                $totalDiscount += $discount;
            }

            // Perbarui data pesanan
            $purchaseOrder->update([
                'supplier_id' => $request->supplier_id,
                'warehouse_id' => $request->warehouse_id,
                'reference_no' => $request->reference_no,
                'order_date' => $request->order_date,
                'due_date' => $request->due_date,
                'note' => $request->note,
                'subtotal' => $subtotal,
                'total_tax' => $totalTax,
                'total_discount' => $totalDiscount,
                'shipping_cost' => $request->shipping_cost ?? 0,
                'grand_total' => $subtotal + $totalTax - $totalDiscount + ($request->shipping_cost ?? 0),
                'update_stock' => $request->boolean('update_stock'),
            ]);

            // Tambah item baru
            foreach ($request->items as $item) {
                $lineSubtotal = $item['qty'] * $item['price'];
                $tax = ($item['tax'] ?? 0) / 100 * $lineSubtotal;
                $productName = Product::find($item['product_id'])->name ?? 'Produk Tidak Diketahui';

                $purchaseOrder->items()->create([
                    'product_id' => $item['product_id'] ?? null,
                    'product_name' => $productName,
                    'description' => $item['description'] ?? null,
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'tax_percent' => $item['tax'] ?? 0,
                    'tax_amount' => $tax,
                    'discount' => $item['discount'] ?? 0,
                    'subtotal' => $lineSubtotal + $tax - ($item['discount'] ?? 0),
                ]);
            }
        });
        return redirect()
            ->route('purchase-orders.index')
            ->with('success', 'Pesanan pembelian berhasil diperbarui.');
    }

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->delete();

        return redirect()
            ->route('purchase-orders.index')
            ->with('success', 'Pesanan berhasil dihapus');
    }
}