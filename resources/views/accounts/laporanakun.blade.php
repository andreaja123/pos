@extends('layouts.admin')

@section('title', 'Laporan Akun - Hanania POS')

@section('content')
    <section id="laporan-akun" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Laporan Akun
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Export dan monitoring mutasi keuangan akun.
                </p>
            </div>
            <div class="flex gap-3">
                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-xl text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition shadow-sm">
                    <i class="ph-bold ph-printer text-lg"></i>
                    <span class="hidden md:inline">Print</span>
                </button>
                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 dark:shadow-none">
                    <i class="ph-bold ph-file-xls text-lg"></i>
                    <span>Export Excel</span>
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none mb-8">
            <form action="" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Pilih Akun
                        </label>
                        <div class="relative">
                            <select
                                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-white font-medium focus:outline-none focus:ring-2 focus:ring-indigo-500 transition appearance-none cursor-pointer">
                                <option value="all">Semua Akun</option>
                                <option value="bca">Bank BCA</option>
                                <option value="cash">Kas Tunai</option>
                                <option value="mandiri">Bank Mandiri</option>
                            </select>
                            <i
                                class="ph-bold ph-caret-down absolute right-4 top-3.5 text-slate-400 pointer-events-none"></i>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Tipe Transaksi
                        </label>
                        <div class="relative">
                            <select
                                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-white font-medium focus:outline-none focus:ring-2 focus:ring-indigo-500 transition appearance-none cursor-pointer">
                                <option value="all">Semua (Debit & Kredit)</option>
                                <option value="in">Pemasukan (Debit)</option>
                                <option value="out">Pengeluaran (Kredit)</option>
                            </select>
                            <i
                                class="ph-bold ph-caret-down absolute right-4 top-3.5 text-slate-400 pointer-events-none"></i>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Dari Tanggal
                        </label>
                        <div class="relative">
                            <input type="date"
                                class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-white font-medium focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                                value="{{ date('Y-m-01') }}">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Sampai Tanggal
                        </label>
                        <div class="relative">
                            <input type="date"
                                class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-white font-medium focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                                value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end border-t border-slate-100 dark:border-slate-700 pt-5">
                    <button type="submit"
                        class="px-8 py-3 bg-slate-800 dark:bg-indigo-600 text-white rounded-xl font-bold shadow-lg hover:shadow-xl hover:-translate-y-1 transition duration-300 flex items-center gap-2">
                        <i class="ph-bold ph-funnel"></i>
                        Tampilkan Laporan
                    </button>
                </div>
            </form>
        </div>

        <div class="animate-fade-in-up">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div
                    class="bg-blue-50 dark:bg-blue-500/10 p-4 rounded-2xl border border-blue-100 dark:border-blue-500/20 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-blue-500 uppercase">Saldo Awal</p>
                        <p class="text-xl font-display font-bold text-slate-800 dark:text-white mt-1">Rp 120.000.000</p>
                    </div>
                    <i class="ph-duotone ph-wallet text-3xl text-blue-400"></i>
                </div>
                <div
                    class="bg-emerald-50 dark:bg-emerald-500/10 p-4 rounded-2xl border border-emerald-100 dark:border-emerald-500/20 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-emerald-500 uppercase">Total Pemasukan</p>
                        <p class="text-xl font-display font-bold text-slate-800 dark:text-white mt-1">Rp 45.500.000</p>
                    </div>
                    <i class="ph-duotone ph-arrow-circle-down-left text-3xl text-emerald-400"></i>
                </div>
                <div
                    class="bg-rose-50 dark:bg-rose-500/10 p-4 rounded-2xl border border-rose-100 dark:border-rose-500/20 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-rose-500 uppercase">Total Pengeluaran</p>
                        <p class="text-xl font-display font-bold text-slate-800 dark:text-white mt-1">Rp 12.250.000</p>
                    </div>
                    <i class="ph-duotone ph-arrow-circle-up-right text-3xl text-rose-400"></i>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                        <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                            <tr>
                                <th class="px-6 py-4 font-bold">Tanggal</th>
                                <th class="px-6 py-4 font-bold">No. Ref</th>
                                <th class="px-6 py-4 font-bold">Keterangan</th>
                                <th class="px-6 py-4 font-bold">Akun</th>
                                <th class="px-6 py-4 font-bold text-emerald-600 dark:text-emerald-400 text-right">Debit
                                    (Masuk)</th>
                                <th class="px-6 py-4 font-bold text-rose-600 dark:text-rose-400 text-right">Kredit (Keluar)
                                </th>
                                <th class="px-6 py-4 font-bold text-right">Saldo Akhir</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                    16 Des 2025
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded text-xs font-mono font-bold">
                                        #TRX-001
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-medium text-slate-800 dark:text-slate-200">
                                    Penjualan Harian POS
                                </td>
                                <td class="px-6 py-4 text-xs">
                                    <span class="flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                                        Kas Tunai
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-emerald-600 dark:text-emerald-400">
                                    Rp 2.500.000
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-slate-400">
                                    -
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-slate-800 dark:text-white">
                                    Rp 122.500.000
                                </td>
                            </tr>

                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                    16 Des 2025
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded text-xs font-mono font-bold">
                                        #EXP-099
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-medium text-slate-800 dark:text-slate-200">
                                    Pembelian Stok Barang
                                </td>
                                <td class="px-6 py-4 text-xs">
                                    <span class="flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-indigo-500"></div>
                                        Bank BCA
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-slate-400">
                                    -
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-rose-600 dark:text-rose-400">
                                    Rp 5.000.000
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-slate-800 dark:text-white">
                                    Rp 117.500.000
                                </td>
                            </tr>

                        </tbody>
                        <tfoot class="bg-slate-50 dark:bg-slate-700/30 border-t border-slate-200 dark:border-slate-600">
                            <tr>
                                <td colspan="4"
                                    class="px-6 py-4 font-bold text-slate-600 dark:text-slate-300 text-right uppercase text-xs tracking-wider">
                                    Total Periode Ini
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-emerald-600 dark:text-emerald-400 text-base">
                                    Rp 2.500.000
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-rose-600 dark:text-rose-400 text-base">
                                    Rp 5.000.000
                                </td>
                                <td class="px-6 py-4"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="mt-6 flex justify-between items-center">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">1-10</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">54</span> data
                </p>
                <div class="flex gap-2">
                    <button
                        class="px-4 py-2 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-bold text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition">Prev</button>
                    <button
                        class="px-4 py-2 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-bold text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition">Next</button>
                </div>
            </div>

        </div>
    </section>
@endsection
