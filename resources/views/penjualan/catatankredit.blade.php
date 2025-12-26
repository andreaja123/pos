@extends('layouts.admin')

@section('title', 'Catatan Kredit - Hanania POS')

@section('content')
    <section class="page-section active max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Catatan Kredit</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">Kelola pengembalian dan kredit pelanggan</p>
            </div>
            <div class="flex gap-3">
                <button
                    class="px-4 py-2 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 rounded-xl font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 flex items-center gap-2 transition shadow-sm">
                    <i class="ph-bold ph-microsoft-excel-logo text-green-600 text-lg"></i>
                    Export Excel
                </button>
                <a href="/penjualan/create-catatankredit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-indigo-700 flex items-center gap-2 transition shadow-lg shadow-indigo-200 dark:shadow-none">
                    <i class="ph-bold ph-plus"></i>
                    Tambah Catatan
                </a>
            </div>
        </div>

        <div class="bg-white dark:bg-darkCard p-5 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm mb-6">
            <form action="" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <div class="col-span-1 md:col-span-2 relative">
                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Cari Transaksi</label>
                    <div class="relative">
                        <i class="ph-bold ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="text" placeholder="Cari No Order atau Pelanggan..."
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white transition">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Dari Tanggal</label>
                    <input type="date"
                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-600 dark:text-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                </div>
                <div class="flex gap-2">
                    <div class="w-full">
                        <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Sampai
                            Tanggal</label>
                        <input type="date"
                            class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-600 dark:text-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                    </div>
                    <button type="submit"
                        class="mb-[1px] px-4 py-2.5 bg-slate-800 dark:bg-slate-700 text-white rounded-xl hover:bg-slate-700 transition">
                        <i class="ph-bold ph-funnel"></i>
                    </button>
                </div>
            </form>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display border-b border-slate-100 dark:border-slate-700">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">Order #</th>
                            <th class="px-6 py-4 font-bold">Pelanggan</th>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 font-bold">Jumlah Bayar</th>
                            <th class="px-6 py-4 font-bold text-center">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-medium">1</td>
                            <td class="px-6 py-4 font-mono text-indigo-600 dark:text-indigo-400 font-bold">#CN-2025-001</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-purple-100 dark:bg-purple-900/50 text-purple-600 dark:text-purple-300 flex items-center justify-center font-bold text-xs">
                                        BS
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-slate-200">Budi Santoso</p>
                                        <p class="text-xs text-slate-400">08123456789</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">16 Des 2025</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp 450.000</td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30">
                                    Selesai
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="w-8 h-8 rounded-lg bg-slate-50 dark:bg-slate-700 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 transition flex items-center justify-center">
                                        <i class="ph-bold ph-pencil-simple"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded-lg bg-slate-50 dark:bg-slate-700 text-slate-500 hover:text-red-600 hover:bg-red-50 transition flex items-center justify-center">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-medium">2</td>
                            <td class="px-6 py-4 font-mono text-indigo-600 dark:text-indigo-400 font-bold">#CN-2025-002</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-orange-100 dark:bg-orange-900/50 text-orange-600 dark:text-orange-300 flex items-center justify-center font-bold text-xs">
                                        AN
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-slate-200">Andi Nugroho</p>
                                        <p class="text-xs text-slate-400">General Customer</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">15 Des 2025</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp 1.200.000</td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-3 py-1 bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400 rounded-full text-xs font-bold border border-amber-200 dark:border-amber-500/30">
                                    Pending
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="w-8 h-8 rounded-lg bg-slate-50 dark:bg-slate-700 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 transition flex items-center justify-center">
                                        <i class="ph-bold ph-pencil-simple"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded-lg bg-slate-50 dark:bg-slate-700 text-slate-500 hover:text-red-600 hover:bg-red-50 transition flex items-center justify-center">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div
                class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-xs text-slate-500 dark:text-slate-400">Menampilkan 1-10 dari 142 data</p>
                <div class="flex gap-2">
                    <button
                        class="px-3 py-1 text-xs font-bold text-slate-500 bg-slate-50 rounded-lg hover:bg-slate-100 disabled:opacity-50">Prev</button>
                    <button
                        class="px-3 py-1 text-xs font-bold text-white bg-indigo-600 rounded-lg shadow shadow-indigo-200">1</button>
                    <button
                        class="px-3 py-1 text-xs font-bold text-slate-500 bg-slate-50 rounded-lg hover:bg-slate-100">2</button>
                    <button
                        class="px-3 py-1 text-xs font-bold text-slate-500 bg-slate-50 rounded-lg hover:bg-slate-100">Next</button>
                </div>
            </div>
        </div>
    </section>
@endsection
