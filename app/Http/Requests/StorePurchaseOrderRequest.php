<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'supplier_id' => 'required|exists:suppliers,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'reference_no' => 'required|unique:purchase_orders,reference_no' . ($this->purchase_order ? ',' . $this->purchase_order->id : ''),
            'order_date' => 'required|date',
            'due_date' => 'nullable|date|after_or_equal:order_date',

            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.qty' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.tax' => 'nullable|numeric|min:0',
            'items.*.discount' => 'nullable|numeric|min:0',

            'shipping_cost' => 'nullable|numeric|min:0',
            'update_stock' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'supplier_id.required' => 'Supplier wajib dipilih.',
            'supplier_id.exists' => 'Supplier tidak valid.',

            'warehouse_id.required' => 'Gudang tujuan wajib dipilih.',
            'warehouse_id.exists' => 'Gudang tidak ditemukan.',

            'reference_no.required' => 'Nomor referensi wajib diisi.',
            'reference_no.unique' => 'Nomor referensi sudah digunakan.',

            'order_date.required' => 'Tanggal order wajib diisi.',
            'order_date.date' => 'Format tanggal order tidak valid.',

            'items.required' => 'Minimal harus ada 1 barang.',
            'items.min' => 'Minimal harus ada 1 barang.',

            'items.*.product_name.required' => 'Nama produk tidak boleh kosong.',
            'items.*.qty.required' => 'Jumlah barang wajib diisi.',
            'items.*.qty.min' => 'Jumlah barang minimal 1.',
            'items.*.price.required' => 'Harga satuan wajib diisi.',
            'items.*.price.min' => 'Harga satuan tidak boleh negatif.',
        ];
    }
}
