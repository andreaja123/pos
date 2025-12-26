<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VoucherController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');

        $baseQuery = Voucher::query()
            ->when($q, fn($qB) => $qB->where('name', 'like', "%{$q}%")->orWhere('code', 'like', "%{$q}%"));

        $vouchers = (clone $baseQuery)->orderBy('created_at', 'desc')->paginate(15);

        // Aggregate stats
        $totalVouchers = Voucher::count();
        $activeCount = Voucher::where('active', true)
            ->where(function ($q2) {
                $q2->whereNull('valid_until')->orWhere('valid_until', '>', now()->toDateString());
            })->count();
        $usedCount = Voucher::sum('used_count');
        $expiredCount = Voucher::whereNotNull('valid_until')->where('valid_until', '<=', now()->toDateString())->count();
        $totalQuota = Voucher::sum('quantity');

        $activePercent = $totalVouchers ? intval(floor($activeCount / $totalVouchers * 100)) : 0;
        $usedPercent = $totalQuota ? intval(floor($usedCount / $totalQuota * 100)) : 0;
        $expiredPercent = $totalVouchers ? intval(floor($expiredCount / $totalVouchers * 100)) : 0;

        return view('voucher.kelolavoucher', compact('vouchers', 'q', 'totalVouchers', 'activeCount', 'usedCount', 'expiredCount', 'activePercent', 'usedPercent', 'expiredPercent'));
    }

    public function create()
    {
        $customers = Customer::orderBy('name')->limit(500)->get();
        return view('voucher.buatvoucher', compact('customers'));
    }

    public function store(Request $request)
    {
        $rules = [
            'coupon_name' => 'required|string|max:100',
            'coupon_value' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'valid_until' => 'required|date|after:today',
            'link_account' => 'sometimes|in:1',
            'account_id' => 'nullable|exists:customers,id',
        ];

        $data = $request->validate($rules);

        // If coupon_name is used as code, generate a slug-style code and ensure uniqueness
        $baseCode = strtoupper(Str::slug($data['coupon_name'], '_')) ?: strtoupper(Str::random(8));
        $code = $baseCode;
        $i = 0;
        while (Voucher::where('code', $code)->exists()) {
            $i++;
            $code = $baseCode . '_' . $i;
            if ($i > 1000) {
                $code = $baseCode . '_' . strtoupper(Str::random(4));
                break;
            }
        }

        $voucher = Voucher::create([
            'code' => $code,
            'name' => $data['coupon_name'],
            'value' => $data['coupon_value'],
            'value_type' => 'fixed',
            'quantity' => $data['quantity'],
            'used_count' => 0,
            'valid_until' => $data['valid_until'],
            'account_id' => $request->has('link_account') ? $data['account_id'] : null,
            'active' => true,
        ]);

        return redirect()->route('vouchers.index')->with('success', "Voucher {$voucher->code} berhasil dibuat.");
    }

    public function edit(Voucher $voucher)
    {
        $customers = Customer::orderBy('name')->limit(500)->get();
        return view('voucher.editvoucher', compact('voucher', 'customers'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        $rules = [
            'coupon_name' => 'required|string|max:100',
            'coupon_value' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'valid_until' => 'required|date|after:today',
            'link_account' => 'sometimes|in:1',
            'account_id' => 'nullable|exists:customers,id',
        ];

        $data = $request->validate($rules);

        // Regenerate code from name, ensure uniqueness excluding this voucher
        $baseCode = strtoupper(Str::slug($data['coupon_name'], '_')) ?: strtoupper(Str::random(8));
        $code = $baseCode;
        $i = 0;
        while (Voucher::where('code', $code)->where('id', '!=', $voucher->id)->exists()) {
            $i++;
            $code = $baseCode . '_' . $i;
            if ($i > 1000) {
                $code = $baseCode . '_' . strtoupper(Str::random(4));
                break;
            }
        }

        $voucher->update([
            'code' => $code,
            'name' => $data['coupon_name'],
            'value' => $data['coupon_value'],
            'quantity' => $data['quantity'],
            'valid_until' => $data['valid_until'],
            'account_id' => $request->has('link_account') ? $data['account_id'] : null,
        ]);

        return redirect()->route('vouchers.index')->with('success', "Voucher {$voucher->code} berhasil diperbarui.");
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('vouchers.index')->with('success', 'Voucher dihapus.');
    }
}
