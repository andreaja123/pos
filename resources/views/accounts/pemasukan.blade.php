@extends('layouts.admin')

@section('title', 'Pemasukan - Hanania POS')

@section('content')
    <section id="pemasukan" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Data Pemasukan
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Kelola dan monitoring arus kas masuk
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition shadow-sm font-bold text-sm">
                    <i class="ph-bold ph-microsoft-excel-logo text-emerald-600 text-lg"></i>
                    <span>Ekspor Excel</span>
                </button>

                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200/50 dark:shadow-none font-bold text-sm">
                    <i class="ph-bold ph-plus"></i>
                    <span>Transaksi Baru</span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="relative">
                <i class="ph-bold ph-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                <input type="text" placeholder="Cari customer, no ref..."
                    class="w-full pl-11 pr-4 py-3 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:border-indigo-500 dark:text-white shadow-sm transition">
            </div>

            <div class="relative">
                <i class="ph-bold ph-calendar-blank absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                <input type="date"
                    class="w-full pl-11 pr-4 py-3 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:border-indigo-500 dark:text-white text-slate-500 shadow-sm transition">
            </div>

            <div class="relative">
                <i class="ph-bold ph-funnel absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                <select
                    class="w-full pl-11 pr-4 py-3 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:border-indigo-500 dark:text-white text-slate-500 shadow-sm appearance-none cursor-pointer transition">
                    <option value="">Semua Metode Pembayaran</option>
                    <option value="cash">Tunai (Cash)</option>
                    <option value="transfer">Transfer Bank</option>
                    <option value="qris">QRIS</option>
                </select>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display border-b border-slate-100 dark:border-slate-700">
                        <tr>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Tanggal</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Customer</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Account</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Metode</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap text-right">Debet</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap text-right">Kredit</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-700 dark:text-slate-200">16 Des 2025</span>
                                    <span class="text-xs text-slate-400">14:30 WIB</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300 flex items-center justify-center font-bold text-xs">
                                        JL
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-white">Jenny Lee</p>
                                        <p class="text-xs text-slate-400">Member Gold</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2.5 py-1 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-xs font-bold border border-slate-200 dark:border-slate-600">
                                    Penjualan Toko
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="flex items-center gap-1.5">
                                    <i class="ph-fill ph-credit-card text-purple-500"></i>
                                    <span>Transfer BCA</span>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-mono text-slate-400">
                                -
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-bold text-emerald-600 dark:text-emerald-400">
                                Rp 1.250.000
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-900/30 transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-slate-700 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-700 transition"
                                        title="Cetak Invoice">
                                        <i class="ph-bold ph-printer text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-700 dark:text-slate-200">16 Des 2025</span>
                                    <span class="text-xs text-slate-400">11:15 WIB</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-orange-100 dark:bg-orange-900/50 text-orange-600 dark:text-orange-300 flex items-center justify-center font-bold text-xs">
                                        umum
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-white">Pelanggan Umum</p>
                                        <p class="text-xs text-slate-400">Non-Member</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2.5 py-1 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-xs font-bold border border-slate-200 dark:border-slate-600">
                                    Jasa Service
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="flex items-center gap-1.5">
                                    <i class="ph-fill ph-money text-emerald-500"></i>
                                    <span>Tunai</span>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-mono text-slate-400">
                                -
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-bold text-emerald-600 dark:text-emerald-400">
                                Rp 150.000
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-900/30 transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-slate-700 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-700 transition"
                                        title="Cetak Invoice">
                                        <i class="ph-bold ph-printer text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-700 dark:text-slate-200">15 Des 2025</span>
                                    <span class="text-xs text-slate-400">09:00 WIB</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-300 flex items-center justify-center font-bold text-xs">
                                        PT
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-white">PT. Makmur Jaya</p>
                                        <p class="text-xs text-slate-400">Corporate</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2.5 py-1 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-xs font-bold border border-slate-200 dark:border-slate-600">
                                    Pesanan Grosir
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="flex items-center gap-1.5">
                                    <i class="ph-fill ph-qr-code text-blue-500"></i>
                                    <span>QRIS</span>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-mono text-slate-400">
                                -
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-bold text-emerald-600 dark:text-emerald-400">
                                Rp 5.000.000
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-900/30 transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-slate-700 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-700 transition"
                                        title="Cetak Invoice">
                                        <i class="ph-bold ph-printer text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>

                    <tfoot class="bg-slate-50 dark:bg-slate-700/50 border-t border-slate-100 dark:border-slate-700">
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-right font-bold text-slate-600 dark:text-slate-300">
                                Total Halaman Ini:</td>
                            <td class="px-6 py-4 text-right font-mono font-bold text-slate-800 dark:text-white">Rp
                                6.400.000</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div
                class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">1-10</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">128</span> data
                </p>

                <div class="flex items-center gap-2">
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 dark:border-slate-700 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition disabled:opacity-50">
                        <i class="ph-bold ph-caret-left"></i>
                    </button>

                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-indigo-600 text-white font-bold shadow-md shadow-indigo-200/50 dark:shadow-none transition">
                        1
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        2
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        3
                    </button>

                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl border border-slate-200 dark:border-slate-700 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        <i class="ph-bold ph-caret-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
