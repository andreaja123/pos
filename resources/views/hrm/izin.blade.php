@extends('layouts.admin')

@section('title', 'Kelola Izin - Hanania POS')

@section('content')
    <section class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Kelola Izin
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Atur hak akses role dan perizinan pengguna sistem.
                </p>
            </div>

            <div class="flex flex-wrap gap-3 w-full md:w-auto">
                <button
                    class="flex-1 md:flex-none items-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 text-sm font-bold rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition shadow-sm">
                    <i class="ph-bold ph-microsoft-excel-logo text-lg text-green-600"></i>
                    <span>Ekspor Excel</span>
                </button>

                <button
                    class="flex-1 md:flex-none flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl shadow-lg shadow-indigo-500/30 transition hover:-translate-y-0.5">
                    <i class="ph-bold ph-plus text-lg"></i>
                    <span>Tambah Izin</span>
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-xl shadow-slate-200/50 dark:shadow-none overflow-hidden">

            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row justify-between gap-4 items-center">
                <div class="relative w-full sm:w-72">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="ph-bold ph-magnifying-glass text-slate-400 text-lg"></i>
                    </div>
                    <input type="text"
                        class="block w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition"
                        placeholder="Cari judul izin...">
                </div>

                <div
                    class="text-xs font-medium text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-600">
                    Total: <span class="text-slate-800 dark:text-white font-bold">12 Data</span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display border-b border-slate-100 dark:border-slate-700">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16 text-center">No</th>
                            <th class="px-6 py-4 font-bold">Judul Izin</th>
                            <th class="px-6 py-4 font-bold">Ditambahkan</th>
                            <th class="px-6 py-4 font-bold text-center w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/30 transition group">
                            <td class="px-6 py-4 text-center font-mono text-slate-400">1</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-purple-50 dark:bg-purple-500/10 text-purple-600 dark:text-purple-400 flex items-center justify-center border border-purple-100 dark:border-purple-500/20">
                                        <i class="ph-fill ph-shield-star text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-800 dark:text-white">Super Admin</h4>
                                        <p class="text-xs text-slate-500">Akses penuh ke seluruh sistem</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="flex items-center gap-1.5 text-slate-500">
                                    <i class="ph-regular ph-calendar-blank"></i>
                                    12 Okt 2023
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 transition tooltip-trigger"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-500/20 transition"
                                        title="Disable/Nonaktifkan">
                                        <i class="ph-bold ph-prohibit text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/20 transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/30 transition group">
                            <td class="px-6 py-4 text-center font-mono text-slate-400">2</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 flex items-center justify-center border border-blue-100 dark:border-blue-500/20">
                                        <i class="ph-fill ph-cash-register text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-800 dark:text-white">Kasir (Cashier)</h4>
                                        <p class="text-xs text-slate-500">Akses transaksi dan riwayat penjualan</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="flex items-center gap-1.5 text-slate-500">
                                    <i class="ph-regular ph-calendar-blank"></i>
                                    15 Nov 2023
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 transition">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-500/20 transition">
                                        <i class="ph-bold ph-prohibit text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/20 transition">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr
                            class="bg-slate-50/50 dark:bg-slate-800/30 hover:bg-slate-50 dark:hover:bg-slate-700/30 transition group">
                            <td class="px-6 py-4 text-center font-mono text-slate-400">3</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 flex items-center justify-center border border-slate-200 dark:border-slate-600">
                                        <i class="ph-fill ph-warehouse text-xl"></i>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <h4
                                                class="font-bold text-slate-500 dark:text-slate-400 line-through decoration-slate-400">
                                                Inventory Staff</h4>
                                            <span
                                                class="px-1.5 py-0.5 rounded text-[10px] font-bold bg-slate-200 text-slate-500 uppercase">Disabled</span>
                                        </div>
                                        <p class="text-xs text-slate-400">Akses stok barang masuk/keluar</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="flex items-center gap-1.5 text-slate-500">
                                    <i class="ph-regular ph-calendar-blank"></i>
                                    02 Jan 2024
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 transition">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 dark:hover:bg-emerald-500/20 transition"
                                        title="Enable">
                                        <i class="ph-bold ph-check-circle text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/20 transition">
                                        <i class="ph-bold ph-trash text-lg"></i>
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
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">1</span> sampai <span
                        class="font-bold text-slate-800 dark:text-white">3</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">12</span> data
                </p>

                <div class="flex items-center gap-1">
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 disabled:opacity-50 transition">
                        <i class="ph-bold ph-caret-left"></i>
                    </button>

                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-indigo-600 text-white font-bold text-sm shadow-md shadow-indigo-500/30">1</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition font-medium text-sm">2</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition font-medium text-sm">3</button>

                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        <i class="ph-bold ph-caret-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
