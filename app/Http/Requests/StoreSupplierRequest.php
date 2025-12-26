<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // sesuaikan jika pakai permission
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'company'     => 'required|string|max:255',
            'tax_id'      => 'nullable|string|max:50',
            'email'       => 'required|email|unique:suppliers,email,' . $this->route('supplier')->id ?? 'NULL',
            'phone'       => 'required|string|max:30',
            'address'     => 'nullable|string',
            'city'        => 'nullable|string|max:100',
            'region'      => 'nullable|string|max:100',
            'country'     => 'nullable|string|max:5',
            'postal_code' => 'nullable|string|max:20',
        ];
    }
}