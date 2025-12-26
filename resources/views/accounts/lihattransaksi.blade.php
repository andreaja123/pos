@extends('layouts.admin')

@section('title', 'Riwayat Transaksi - Hanania POS')

@section('content')
    <section id="transactions" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Riwayat Transaksi
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Kelola dan pantau seluruh arus kas masuk dan keluar.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20 font-bold text-sm rounded-xl hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition duration-300">
                    <i class="ph-bold ph-microsoft-excel-logo text-lg"></i>
                    <span>Export Excel</span>
                </button>

                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white font-bold text-sm rounded-xl shadow-lg shadow-indigo-200/50 dark:shadow-none hover:bg-indigo-700 hover:-translate-y-0.5 transition duration-300">
                    <i class="ph-bold ph-plus text-lg"></i>
                    <span>Tambah Transaksi</span>
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none overflow-hidden">

            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">

                <div class="relative w-full md:w-72">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="ph-bold ph-magnifying-glass text-slate-400"></i>
                    </div>
                    <input type="text"
                        class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 dark:border-slate-600 rounded-xl leading-5 bg-slate-50 dark:bg-slate-700/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-200"
                        placeholder="Cari No. Akun, Customer...">
                </div>

                <div class="flex items-center gap-2 w-full md:w-auto">
                    <button
                        class="flex-1 md:flex-none flex items-center justify-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-600 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-600 transition">
                        <i class="ph-bold ph-funnel"></i>
                        <span>Filter</span>
                    </button>
                    <button
                        class="flex-1 md:flex-none flex items-center justify-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-600 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-600 transition">
                        <i class="ph-bold ph-calendar-blank"></i>
                        <span>Bulan Ini</span>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display uppercase tracking-wider text-xs">
                        <tr>
                            <th class="px-6 py-4 font-bold rounded-tl-xl">Tanggal</th>
                            <th class="px-6 py-4 font-bold">No. Akun</th>
                            <th class="px-6 py-4 font-bold">Customer</th>
                            <th class="px-6 py-4 font-bold">Metode</th>
                            <th class="px-6 py-4 font-bold text-emerald-600 dark:text-emerald-400">Debet</th>
                            <th class="px-6 py-4 font-bold text-red-500 dark:text-red-400">Kredit</th>
                            <th class="px-6 py-4 font-bold text-right rounded-tr-xl">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-medium text-slate-700 dark:text-slate-200">16 Des 2025</span>
                                <div class="text-xs text-slate-400">14:30 WIB</div>
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                #ACC-2025-001
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300 flex items-center justify-center font-bold text-xs">
                                        BS
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800 dark:text-slate-200">Budi Santoso</div>
                                        <div class="text-xs text-slate-400">Regular Member</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-lg text-xs font-bold border border-slate-200 dark:border-slate-600 inline-flex items-center gap-1">
                                    <i class="ph-bold ph-qr-code"></i> QRIS
                                </span>
                            </td>
                            <td class="px-6 py-4 font-bold text-emerald-600 dark:text-emerald-400 whitespace-nowrap">
                                Rp 450.000
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-300 dark:text-slate-600 whitespace-nowrap">
                                -
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 rounded-lg transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-slate-800 hover:bg-slate-100 dark:hover:text-white dark:hover:bg-slate-600 rounded-lg transition"
                                        title="Cetak Invoice">
                                        <i class="ph-bold ph-printer text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/20 rounded-lg transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-medium text-slate-700 dark:text-slate-200">16 Des 2025</span>
                                <div class="text-xs text-slate-400">10:15 WIB</div>
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                #ACC-2025-002
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-orange-100 dark:bg-orange-900/50 text-orange-600 dark:text-orange-300 flex items-center justify-center font-bold text-xs">
                                        UM
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800 dark:text-slate-200">Umum</div>
                                        <div class="text-xs text-slate-400">Non-Member</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-lg text-xs font-bold border border-slate-200 dark:border-slate-600 inline-flex items-center gap-1">
                                    <i class="ph-bold ph-money"></i> Tunai
                                </span>
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-300 dark:text-slate-600 whitespace-nowrap">
                                -
                            </td>
                            <td class="px-6 py-4 font-bold text-red-500 dark:text-red-400 whitespace-nowrap">
                                Rp 150.000
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 rounded-lg transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-slate-800 hover:bg-slate-100 dark:hover:text-white dark:hover:bg-slate-600 rounded-lg transition"
                                        title="Cetak Invoice">
                                        <i class="ph-bold ph-printer text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/20 rounded-lg transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-medium text-slate-700 dark:text-slate-200">15 Des 2025</span>
                                <div class="text-xs text-slate-400">18:45 WIB</div>
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                #ACC-2025-003
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-pink-100 dark:bg-pink-900/50 text-pink-600 dark:text-pink-300 flex items-center justify-center font-bold text-xs">
                                        RM
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800 dark:text-slate-200">Rina Melati</div>
                                        <div class="text-xs text-slate-400">VIP Member</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-lg text-xs font-bold border border-slate-200 dark:border-slate-600 inline-flex items-center gap-1">
                                    <i class="ph-bold ph-bank"></i> Transfer
                                </span>
                            </td>
                            <td class="px-6 py-4 font-bold text-emerald-600 dark:text-emerald-400 whitespace-nowrap">
                                Rp 1.250.000
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-300 dark:text-slate-600 whitespace-nowrap">
                                -
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 rounded-lg transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-slate-800 hover:bg-slate-100 dark:hover:text-white dark:hover:bg-slate-600 rounded-lg transition"
                                        title="Cetak Invoice">
                                        <i class="ph-bold ph-printer text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/20 rounded-lg transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div
                class="px-6 py-4 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4 bg-slate-50/50 dark:bg-slate-800/50">
                <div class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-700 dark:text-slate-200">1-10</span> dari <span
                        class="font-bold text-slate-700 dark:text-slate-200">142</span> transaksi
                </div>

                <div class="flex items-center gap-1">
                    <button
                        class="p-2 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-white dark:hover:bg-slate-700 hover:text-indigo-600 transition disabled:opacity-50"
                        disabled>
                        <i class="ph-bold ph-caret-left"></i>
                    </button>

                    <button
                        class="px-3.5 py-2 rounded-lg bg-indigo-600 text-white font-bold text-sm shadow-md shadow-indigo-200/50 dark:shadow-none">1</button>
                    <button
                        class="px-3.5 py-2 rounded-lg border border-transparent text-slate-600 dark:text-slate-400 font-bold text-sm hover:bg-white dark:hover:bg-slate-700 hover:border-slate-200 dark:hover:border-slate-600 transition">2</button>
                    <button
                        class="px-3.5 py-2 rounded-lg border border-transparent text-slate-600 dark:text-slate-400 font-bold text-sm hover:bg-white dark:hover:bg-slate-700 hover:border-slate-200 dark:hover:border-slate-600 transition">3</button>
                    <span class="px-2 text-slate-400">...</span>
                    <button
                        class="px-3.5 py-2 rounded-lg border border-transparent text-slate-600 dark:text-slate-400 font-bold text-sm hover:bg-white dark:hover:bg-slate-700 hover:border-slate-200 dark:hover:border-slate-600 transition">12</button>

                    <button
                        class="p-2 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-white dark:hover:bg-slate-700 hover:text-indigo-600 transition">
                        <i class="ph-bold ph-caret-right"></i>
                    </button>
                </div>
            </div>

        </div>
    </section>
@endsection
