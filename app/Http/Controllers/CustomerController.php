<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $perPage = $request->query('per_page', 10);

        $query = Customer::query();

        if ($q) {
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%")
                    ->orWhere('phone', 'like', "%{$q}%")
                    ->orWhere('company', 'like', "%{$q}%");
            });
        }

        $customers = $query->orderBy('created_at', 'desc')->paginate($perPage)->withQueryString();

        return view('pelanggan.kelolapelanggan', compact('customers', 'q'));
    }

    public function create()
    {
        return view('pelanggan.pelangganbaru');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customers' => 'required|array|min:1',

            'customers.*.name' => 'required|string|max:100',
            'customers.*.company' => 'nullable|string|max:100',
            'customers.*.phone' => 'required|string|max:20',
            'customers.*.email' => 'nullable|email',

            'customers.*.billing_address' => 'nullable|string',
            'customers.*.billing_city' => 'nullable|string|max:50',
            'customers.*.billing_state' => 'nullable|string|max:50',
            'customers.*.billing_country' => 'required|string|max:5',
            'customers.*.billing_postcode' => 'nullable|string|max:10',

            'customers.*.shipping_name' => 'nullable|string|max:100',
            'customers.*.shipping_phone' => 'nullable|string|max:20',
            'customers.*.shipping_email' => 'nullable|email',
            'customers.*.shipping_address' => 'nullable|string',
            'customers.*.shipping_city' => 'nullable|string|max:50',
            'customers.*.shipping_state' => 'nullable|string|max:50',
            'customers.*.shipping_country' => 'nullable|string|max:5',
            'customers.*.shipping_postcode' => 'nullable|string|max:10',
        ]);


        foreach ($validated['customers'] as $customer) {
            Customer::create($customer);
        }

        return redirect()
            ->route('customers.index')
            ->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit(Customer $customer)
    {
        return view('pelanggan.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'company' => 'nullable|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',

            'billing_address' => 'nullable|string',
            'billing_city' => 'nullable|string|max:50',
            'billing_state' => 'nullable|string|max:50',
            'billing_country' => 'required|string|max:5',
            'billing_postcode' => 'nullable|string|max:10',

            'shipping_name' => 'nullable|string|max:100',
            'shipping_phone' => 'nullable|string|max:20',
            'shipping_email' => 'nullable|email',
            'shipping_address' => 'nullable|string',
            'shipping_city' => 'nullable|string|max:50',
            'shipping_state' => 'nullable|string|max:50',
            'shipping_country' => 'nullable|string|max:5',
            'shipping_postcode' => 'nullable|string|max:10',
        ]);

        $customer->update($validated);

        return redirect()->route('customers.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
