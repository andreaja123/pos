@extends('layouts.admin')

@section('title', 'Laporan Akun Supplier - Hanania POS')

@section('content')
    <section id="laporan-supplier" class="page-section active max-w-7xl mx-auto space-y-6">

        <div class="flex flex-col md:flex-row justify-between items-end md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Laporan Akun Supplier
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                    Kelola dan export riwayat transaksi dengan pemasok
                </p>
            </div>
            <div class="flex gap-3">
                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-red-600 dark:text-red-400 rounded-xl font-bold text-sm shadow-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                    <i class="ph-bold ph-file-pdf text-lg"></i>
                    Export PDF
                </button>
                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-emerald-500 text-white rounded-xl font-bold text-sm shadow-lg shadow-emerald-500/30 hover:bg-emerald-600 transition">
                    <i class="ph-bold ph-file-xls text-lg"></i>
                    Export Excel
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
            <form action="" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-5 items-end">

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Supplier
                        </label>
                        <div class="relative">
                            <i class="ph-bold ph-storefront absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <select
                                class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-semibold text-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 transition appearance-none">
                                <option value="">Semua Supplier</option>
                                <option value="1">PT. Sandang Makmur</option>
                                <option value="2">CV. Tekstil Jaya</option>
                                <option value="3">Gudang Kain Solo</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Tipe Laporan
                        </label>
                        <div class="relative">
                            <i class="ph-bold ph-tag absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <select
                                class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-semibold text-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 transition appearance-none">
                                <option value="all">Semua Transaksi</option>
                                <option value="purchase">Pembelian Stok</option>
                                <option value="debt">Hutang / Kredit</option>
                                <option value="return">Retur Barang</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Dari Tanggal
                        </label>
                        <div class="relative">
                            <input type="date"
                                class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-semibold text-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Sampai (Saat Ini)
                        </label>
                        <div class="relative">
                            <input type="date"
                                class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-semibold text-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                        </div>
                    </div>

                    <button type="button"
                        class="w-full py-2.5 bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-indigo-700 shadow-lg shadow-indigo-500/30 transition flex justify-center items-center gap-2">
                        <i class="ph-bold ph-funnel"></i>
                        Tampilkan
                    </button>

                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div
                class="bg-white dark:bg-darkCard p-5 rounded-3xl border border-slate-100 dark:border-slate-700 flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-blue-50 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded-2xl flex items-center justify-center">
                    <i class="ph-fill ph-shopping-cart text-2xl"></i>
                </div>
                <div>
                    <p class="text-slate-500 text-xs font-bold">Total Pembelian</p>
                    <h4 class="text-xl font-display font-bold text-slate-800 dark:text-white">Rp 45.200.000</h4>
                </div>
            </div>
            <div
                class="bg-white dark:bg-darkCard p-5 rounded-3xl border border-slate-100 dark:border-slate-700 flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-red-50 dark:bg-red-500/20 text-red-600 dark:text-red-400 rounded-2xl flex items-center justify-center">
                    <i class="ph-fill ph-warning-circle text-2xl"></i>
                </div>
                <div>
                    <p class="text-slate-500 text-xs font-bold">Sisa Hutang</p>
                    <h4 class="text-xl font-display font-bold text-slate-800 dark:text-white">Rp 5.000.000</h4>
                </div>
            </div>
            <div
                class="bg-white dark:bg-darkCard p-5 rounded-3xl border border-slate-100 dark:border-slate-700 flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center">
                    <i class="ph-fill ph-check-circle text-2xl"></i>
                </div>
                <div>
                    <p class="text-slate-500 text-xs font-bold">Sudah Lunas</p>
                    <h4 class="text-xl font-display font-bold text-slate-800 dark:text-white">12 Transaksi</h4>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <div>
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Rincian Transaksi
                    </h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Menampilkan data berdasarkan filter di atas
                    </p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 font-bold">No. Ref</th>
                            <th class="px-6 py-4 font-bold">Supplier</th>
                            <th class="px-6 py-4 font-bold">Tipe</th>
                            <th class="px-6 py-4 font-bold">Nominal</th>
                            <th class="px-6 py-4 font-bold">Status Pembayaran</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                16 Des 2025
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                #SUP-0012
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                PT. Sandang Makmur
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                                    Pembelian Stok
                                </div>
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                Rp 12.500.000
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30">
                                    Lunas
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition"
                                    title="Lihat Detail">
                                    <i class="ph-bold ph-eye text-xl"></i>
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                14 Des 2025
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                #SUP-0011
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                Gudang Kain Solo
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                                    Pembelian Stok
                                </div>
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                Rp 5.000.000
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400 rounded-full text-xs font-bold border border-amber-200 dark:border-amber-500/30">
                                    Belum Lunas
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition"
                                    title="Lihat Detail">
                                    <i class="ph-bold ph-eye text-xl"></i>
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                10 Des 2025
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                #RET-005
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                PT. Sandang Makmur
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-orange-500"></div>
                                    Retur Barang
                                </div>
                            </td>
                            <td class="px-6 py-4 font-bold text-red-500">
                                - Rp 450.000
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-full text-xs font-bold border border-slate-200 dark:border-slate-600">
                                    Selesai
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition"
                                    title="Lihat Detail">
                                    <i class="ph-bold ph-eye text-xl"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="p-6 border-t border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <span class="text-xs font-bold text-slate-500 dark:text-slate-400">
                    Menampilkan 1-3 dari 48 data
                </span>
                <div class="flex gap-2">
                    <button
                        class="w-8 h-8 rounded-lg border border-slate-200 dark:border-slate-600 flex items-center justify-center text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        <i class="ph-bold ph-caret-left"></i>
                    </button>
                    <button
                        class="w-8 h-8 rounded-lg bg-indigo-600 text-white flex items-center justify-center font-bold text-xs shadow-lg shadow-indigo-500/30">
                        1
                    </button>
                    <button
                        class="w-8 h-8 rounded-lg border border-slate-200 dark:border-slate-600 flex items-center justify-center text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        2
                    </button>
                    <button
                        class="w-8 h-8 rounded-lg border border-slate-200 dark:border-slate-600 flex items-center justify-center text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        <i class="ph-bold ph-caret-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
