@extends('layouts.admin')

@section('title', 'Biaya - Hanania POS')

@section('content')
    <section id="biaya" class="page-section active max-w-7xl mx-auto space-y-6">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Manajemen Biaya
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm">
                    Kelola pengeluaran dan arus kas operasional
                </p>
            </div>

            <div class="flex gap-4">
                <div
                    class="bg-white dark:bg-darkCard px-4 py-2 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm flex items-center gap-3">
                    <div
                        class="w-8 h-8 rounded-full bg-red-50 dark:bg-red-500/20 text-red-500 flex items-center justify-center">
                        <i class="ph-bold ph-trend-down"></i>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-400 uppercase font-bold tracking-wider">Total Bulan Ini</p>
                        <p class="text-sm font-bold text-slate-800 dark:text-white">Rp 8.450.000</p>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none overflow-hidden">

            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col lg:flex-row gap-4 justify-between items-center">
                <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                    <div class="relative w-full sm:w-64">
                        <i class="ph-bold ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="text" placeholder="Cari biaya, akun, atau customer..."
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border-none rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 placeholder-slate-400 focus:ring-2 focus:ring-indigo-500/50 outline-none transition">
                    </div>
                    <button
                        class="px-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 text-slate-600 dark:text-slate-300 rounded-xl text-sm font-bold hover:bg-slate-100 dark:hover:bg-slate-600 transition flex items-center gap-2 justify-center">
                        <i class="ph-bold ph-calendar-blank"></i>
                        <span>Desember 2025</span>
                    </button>
                </div>

                <div class="flex gap-3 w-full lg:w-auto">
                    <button
                        class="flex-1 lg:flex-none px-4 py-2.5 border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 rounded-xl text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition flex items-center gap-2 justify-center">
                        <i class="ph-bold ph-microsoft-excel-logo text-green-600"></i>
                        <span>Export Excel</span>
                    </button>
                    <button
                        class="flex-1 lg:flex-none px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-bold shadow-lg shadow-indigo-200 dark:shadow-none transition flex items-center gap-2 justify-center">
                        <i class="ph-bold ph-plus"></i>
                        <span>Biaya Baru</span>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Tanggal</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Account (CoA)</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Customer/Vendor</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap text-right">Debet</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap text-right">Kredit</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap text-center">Metode</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition cursor-pointer group">
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400 whitespace-nowrap">
                                16 Des 2025 <br>
                                <span class="text-xs text-slate-400">14:30</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-orange-100 dark:bg-orange-900/50 text-orange-600 dark:text-orange-400 flex items-center justify-center">
                                        <i class="ph-bold ph-lightning"></i>
                                    </div>
                                    <span class="font-bold text-slate-800 dark:text-slate-200">Biaya Listrik</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                PLN Persero
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-slate-800 dark:text-white">
                                Rp 1.250.000
                            </td>
                            <td class="px-6 py-4 text-right font-medium text-slate-400">
                                -
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-2.5 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-lg text-xs font-bold border border-slate-200 dark:border-slate-600">
                                    Transfer BCA
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition"
                                        title="Edit">
                                        <i class="ph-bold ph-pencil-simple"></i>
                                    </button>
                                    <button class="p-2 text-slate-400 hover:text-red-500 transition" title="Hapus">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition cursor-pointer group">
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400 whitespace-nowrap">
                                15 Des 2025 <br>
                                <span class="text-xs text-slate-400">09:15</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 flex items-center justify-center">
                                        <i class="ph-bold ph-package"></i>
                                    </div>
                                    <span class="font-bold text-slate-800 dark:text-slate-200">Pembelian Stok</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                CV. Maju Tekstil
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-slate-800 dark:text-white">
                                Rp 5.000.000
                            </td>
                            <td class="px-6 py-4 text-right font-medium text-slate-400">
                                -
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-2.5 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-lg text-xs font-bold border border-slate-200 dark:border-slate-600">
                                    Tunai
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                                        <i class="ph-bold ph-pencil-simple"></i>
                                    </button>
                                    <button class="p-2 text-slate-400 hover:text-red-500 transition">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition cursor-pointer group">
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400 whitespace-nowrap">
                                14 Des 2025 <br>
                                <span class="text-xs text-slate-400">11:00</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 dark:text-emerald-400 flex items-center justify-center">
                                        <i class="ph-bold ph-arrow-u-left-up"></i>
                                    </div>
                                    <span class="font-bold text-slate-800 dark:text-slate-200">Retur Pembelian</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                CV. Maju Tekstil
                            </td>
                            <td class="px-6 py-4 text-right font-medium text-slate-400">
                                -
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-emerald-600 dark:text-emerald-400">
                                Rp 500.000
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-2.5 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-lg text-xs font-bold border border-slate-200 dark:border-slate-600">
                                    Deposit
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                                        <i class="ph-bold ph-pencil-simple"></i>
                                    </button>
                                    <button class="p-2 text-slate-400 hover:text-red-500 transition">
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
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">1-10</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">124</span> data
                </p>
                <div class="flex gap-2">
                    <button
                        class="px-3 py-2 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700 disabled:opacity-50 transition">
                        <i class="ph-bold ph-caret-left"></i>
                    </button>
                    <button
                        class="px-3 py-2 rounded-xl bg-indigo-600 text-white font-bold text-sm shadow-md shadow-indigo-200 dark:shadow-none">1</button>
                    <button
                        class="px-3 py-2 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition">2</button>
                    <button
                        class="px-3 py-2 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition">3</button>
                    <button
                        class="px-3 py-2 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        <i class="ph-bold ph-caret-right"></i>
                    </button>
                </div>
            </div>

        </div>
    </section>
@endsection
