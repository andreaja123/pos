@extends('layouts.admin')

@section('title', 'Neraca Keuangan - Hanania POS')

@section('content')
    <section id="neraca-keuangan" class="page-section active max-w-7xl mx-auto space-y-8">

        <div class="flex flex-col md:flex-row justify-between items-end md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Neraca Keuangan</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">Laporan posisi keuangan per {{ date('d F Y') }}</p>
            </div>
            <div class="flex gap-3">
                <button
                    class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 rounded-xl text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition shadow-sm">
                    <i class="ph-bold ph-printer"></i> Print
                </button>
                <button
                    class="flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 dark:shadow-none">
                    <i class="ph-bold ph-download-simple"></i> Export PDF
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

            @include('components.balance-table', [
                'title' => 'Assets Accounts',
                'icon' => 'ph-buildings',
                'color' => 'text-emerald-600',
                'bg_icon' => 'bg-emerald-50 dark:bg-emerald-500/20',
                'total' => 'Rp 150.000.000',
                'rows' => [
                    ['no' => 1, 'name' => 'Kas Besar', 'code' => '100-001', 'balance' => 'Rp 50.000.000'],
                    ['no' => 2, 'name' => 'Bank BCA', 'code' => '100-002', 'balance' => 'Rp 75.000.000'],
                    ['no' => 3, 'name' => 'Persediaan Barang', 'code' => '100-003', 'balance' => 'Rp 25.000.000'],
                ],
            ])

            @include('components.balance-table', [
                'title' => 'Liabilities Accounts',
                'icon' => 'ph-file-text',
                'color' => 'text-red-600',
                'bg_icon' => 'bg-red-50 dark:bg-red-500/20',
                'total' => 'Rp 30.000.000',
                'rows' => [
                    ['no' => 1, 'name' => 'Hutang Dagang', 'code' => '200-001', 'balance' => 'Rp 20.000.000'],
                    ['no' => 2, 'name' => 'Hutang Gaji', 'code' => '200-002', 'balance' => 'Rp 10.000.000'],
                ],
            ])

            @include('components.balance-table', [
                'title' => 'Equity Accounts',
                'icon' => 'ph-scales',
                'color' => 'text-blue-600',
                'bg_icon' => 'bg-blue-50 dark:bg-blue-500/20',
                'total' => 'Rp 120.000.000',
                'rows' => [
                    ['no' => 1, 'name' => 'Modal Disetor', 'code' => '300-001', 'balance' => 'Rp 100.000.000'],
                    ['no' => 2, 'name' => 'Laba Ditahan', 'code' => '300-002', 'balance' => 'Rp 20.000.000'],
                ],
            ])

            @include('components.balance-table', [
                'title' => 'Income Accounts',
                'icon' => 'ph-trend-up',
                'color' => 'text-emerald-600',
                'bg_icon' => 'bg-emerald-50 dark:bg-emerald-500/20',
                'total' => 'Rp 85.000.000',
                'rows' => [
                    ['no' => 1, 'name' => 'Penjualan Retail', 'code' => '400-001', 'balance' => 'Rp 80.000.000'],
                    ['no' => 2, 'name' => 'Pendapatan Lain', 'code' => '400-002', 'balance' => 'Rp 5.000.000'],
                ],
            ])

            @include('components.balance-table', [
                'title' => 'Expenditure Accounts',
                'icon' => 'ph-trend-down',
                'color' => 'text-orange-600',
                'bg_icon' => 'bg-orange-50 dark:bg-orange-500/20',
                'total' => 'Rp 15.000.000',
                'rows' => [
                    ['no' => 1, 'name' => 'Biaya Listrik & Air', 'code' => '500-001', 'balance' => 'Rp 2.500.000'],
                    ['no' => 2, 'name' => 'Gaji Karyawan', 'code' => '500-002', 'balance' => 'Rp 12.500.000'],
                ],
            ])

            @include('components.balance-table', [
                'title' => 'Basic Accounts',
                'icon' => 'ph-wallet',
                'color' => 'text-purple-600',
                'bg_icon' => 'bg-purple-50 dark:bg-purple-500/20',
                'total' => 'Rp 0',
                'rows' => [['no' => 1, 'name' => 'Opening Balance', 'code' => '000-000', 'balance' => 'Rp 0']],
            ])

        </div>

        <div class="bg-slate-800 dark:bg-darkCard rounded-3xl p-6 md:p-8 text-white shadow-xl">
            <div
                class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 border-b border-slate-700 pb-6">
                <div>
                    <h3 class="text-xl font-display font-bold">Ringkasan Keseimbangan</h3>
                    <p class="text-slate-400 text-sm mt-1">Total konsolidasi seluruh akun</p>
                </div>
                <div class="mt-4 md:mt-0 px-4 py-2 bg-slate-700/50 rounded-xl border border-slate-600">
                    <span class="text-xs text-slate-400 uppercase tracking-wider font-bold">Net Balance</span>
                    <div class="text-2xl font-mono font-bold text-emerald-400">Rp 245.000.000</div>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <div class="p-4 rounded-2xl bg-slate-700/30 border border-slate-700">
                    <p class="text-xs text-slate-400 font-bold mb-1">Basic</p>
                    <p class="font-mono font-bold text-sm md:text-base">Rp 0</p>
                </div>
                <div class="p-4 rounded-2xl bg-slate-700/30 border border-slate-700">
                    <p class="text-xs text-emerald-400 font-bold mb-1">Assets</p>
                    <p class="font-mono font-bold text-sm md:text-base">Rp 150.0 Jt</p>
                </div>
                <div class="p-4 rounded-2xl bg-slate-700/30 border border-slate-700">
                    <p class="text-xs text-red-400 font-bold mb-1">Liabilities</p>
                    <p class="font-mono font-bold text-sm md:text-base">Rp 30.0 Jt</p>
                </div>
                <div class="p-4 rounded-2xl bg-slate-700/30 border border-slate-700">
                    <p class="text-xs text-blue-400 font-bold mb-1">Equity</p>
                    <p class="font-mono font-bold text-sm md:text-base">Rp 120.0 Jt</p>
                </div>
                <div class="p-4 rounded-2xl bg-slate-700/30 border border-slate-700">
                    <p class="text-xs text-emerald-400 font-bold mb-1">Income</p>
                    <p class="font-mono font-bold text-sm md:text-base">Rp 85.0 Jt</p>
                </div>
                <div class="p-4 rounded-2xl bg-slate-700/30 border border-slate-700">
                    <p class="text-xs text-orange-400 font-bold mb-1">Expenses</p>
                    <p class="font-mono font-bold text-sm md:text-base">Rp 15.0 Jt</p>
                </div>
            </div>
        </div>
    </section>

    <?php
    // DISCLAIMER: Block PHP ini hanya simulasi untuk merender HTML di atas agar terlihat rapi
    // tanpa membuat file component terpisah saat anda copy paste.
    // Hapus block ini jika anda sudah membuat file component blade terpisah.
    ?>
@endsection

{{-- 
    -------------------------------------------------------------------------
    SARAN IMPLEMENTASI COMPONENT (resources/views/components/balance-table.blade.php)
    -------------------------------------------------------------------------
--}}
{{--
<div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none flex flex-col h-full">
    <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 {{ $bg_icon }} {{ $color }} rounded-xl flex items-center justify-center">
                <i class="ph-fill {{ $icon }} text-xl"></i>
            </div>
            <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                {{ $title }}
            </h3>
        </div>
    </div>

    <div class="overflow-x-auto flex-grow">
        <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
            <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3 font-bold w-16">No</th>
                    <th class="px-6 py-3 font-bold">Nama Akun</th>
                    <th class="px-6 py-3 font-bold">Kode</th>
                    <th class="px-6 py-3 font-bold text-right">Keseimbangan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                @foreach ($rows as $row)
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                    <td class="px-6 py-3 text-slate-400">{{ $row['no'] }}</td>
                    <td class="px-6 py-3 font-bold text-slate-700 dark:text-slate-200">{{ $row['name'] }}</td>
                    <td class="px-6 py-3 font-mono text-xs text-slate-500">{{ $row['code'] }}</td>
                    <td class="px-6 py-3 font-mono font-bold text-slate-800 dark:text-white text-right">{{ $row['balance'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="p-4 bg-slate-50/50 dark:bg-slate-800/50 border-t border-slate-100 dark:border-slate-700 rounded-b-3xl">
        <div class="flex justify-between items-center px-2">
            <span class="text-sm font-bold text-slate-500 dark:text-slate-400">Total Keseluruhan</span>
            <span class="text-lg font-mono font-bold {{ $color }}">{{ $total }}</span>
        </div>
    </div>
</div>
--}}
