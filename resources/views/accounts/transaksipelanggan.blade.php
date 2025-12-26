@extends('layouts.admin')

@section('title', 'Transaksi Pelanggan - Hanania POS')

@section('content')
    <section id="customer-list" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Data Pelanggan
                </h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Kelola data pelanggan, riwayat transaksi, dan tagihan.
                </p>
            </div>

            <div class="flex gap-4">
                <div
                    class="px-4 py-2 bg-white dark:bg-darkCard rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm flex items-center gap-3">
                    <div
                        class="w-8 h-8 rounded-full bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 flex items-center justify-center">
                        <i class="ph-fill ph-users text-lg"></i>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Total Pelanggan</p>
                        <p class="font-bold text-slate-800 dark:text-white">1,240</p>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none overflow-hidden">

            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col lg:flex-row gap-4 justify-between items-start lg:items-center">

                <div class="flex flex-col md:flex-row gap-4 w-full lg:w-auto">
                    <div class="relative w-full md:w-64">
                        <i class="ph-bold ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="text" placeholder="Cari nama, email, atau no.hp..."
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white placeholder-slate-400 transition">
                    </div>

                    <button
                        class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition text-sm font-medium whitespace-nowrap">
                        <i class="ph-bold ph-warning-circle text-orange-500"></i>
                        Unpaid Pelanggan
                        <span
                            class="bg-orange-100 dark:bg-orange-500/20 text-orange-600 dark:text-orange-400 text-xs px-1.5 py-0.5 rounded ml-1 font-bold">12</span>
                    </button>
                </div>

                <div class="flex flex-wrap gap-2 w-full lg:w-auto justify-end">
                    <button
                        class="flex items-center gap-2 px-4 py-2.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 rounded-xl hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition text-sm font-bold border border-emerald-100 dark:border-emerald-500/20">
                        <i class="ph-fill ph-microsoft-excel-logo text-lg"></i>
                        <span class="hidden sm:inline">Export Excel</span>
                    </button>

                    <button
                        class="flex items-center gap-2 px-4 py-2.5 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition text-sm font-bold shadow-lg shadow-indigo-200 dark:shadow-none">
                        <i class="ph-bold ph-plus"></i>
                        Tambah Pelanggan
                    </button>
                </div>
            </div>

            <div class="px-6 py-3 bg-indigo-50 dark:bg-indigo-900/20 border-b border-indigo-100 dark:border-indigo-800 flex flex-wrap items-center gap-4 text-sm"
                id="bulk-actions">
                <span class="font-bold text-indigo-800 dark:text-indigo-200"><span id="selected-count">2</span>
                    Dipilih:</span>

                <button
                    class="flex items-center gap-1.5 px-3 py-1.5 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-600 rounded-lg hover:text-indigo-600 transition">
                    <i class="ph-bold ph-envelope-simple"></i> Kirim Email
                </button>

                <button
                    class="flex items-center gap-1.5 px-3 py-1.5 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-600 rounded-lg hover:text-indigo-600 transition">
                    <i class="ph-bold ph-chat-text"></i> Kirim SMS
                </button>

                <div class="w-px h-6 bg-indigo-200 dark:bg-indigo-700 mx-1"></div>

                <button
                    class="flex items-center gap-1.5 px-3 py-1.5 bg-white dark:bg-slate-800 text-red-600 border border-slate-200 dark:border-slate-600 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/30 transition">
                    <i class="ph-bold ph-trash"></i> Hapus
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display border-b border-slate-100 dark:border-slate-700">
                        <tr>
                            <th class="px-6 py-4 w-10">
                                <input type="checkbox"
                                    class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 rounded-md bg-slate-100 dark:bg-slate-700 dark:border-slate-600">
                            </th>
                            <th class="px-6 py-4 font-bold">No</th>
                            <th class="px-6 py-4 font-bold">Nama Pelanggan</th>
                            <th class="px-6 py-4 font-bold">Kontak</th>
                            <th class="px-6 py-4 font-bold">Alamat</th>
                            <th class="px-6 py-4 font-bold text-center">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="group hover:bg-slate-50 dark:hover:bg-slate-700/50 transition duration-200">
                            <td class="px-6 py-4">
                                <input type="checkbox"
                                    class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 rounded-md bg-slate-100 dark:bg-slate-700 dark:border-slate-600">
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                #CUST-001
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300 flex items-center justify-center font-bold text-sm ring-2 ring-white dark:ring-slate-800">
                                        BS
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-800 dark:text-slate-200">Budi Santoso</h4>
                                        <p class="text-xs text-slate-400">Member: Gold</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                        <i class="ph-fill ph-envelope text-slate-400"></i>
                                        <span>budi.s@gmail.com</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-slate-500">
                                        <i class="ph-fill ph-phone text-slate-400"></i>
                                        <span>0812-3456-7890</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 max-w-xs truncate text-slate-500">
                                Jl. Melati Indah No. 45, Jakarta Selatan
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div
                                    class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button title="Setting"
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 rounded-lg transition">
                                        <i class="ph-bold ph-gear text-lg"></i>
                                    </button>
                                    <button title="Edit"
                                        class="p-2 text-slate-400 hover:text-orange-500 hover:bg-orange-50 dark:hover:bg-orange-500/20 rounded-lg transition">
                                        <i class="ph-bold ph-pencil-simple text-lg"></i>
                                    </button>
                                    <button title="Delete"
                                        class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-500/20 rounded-lg transition">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr
                            class="group hover:bg-slate-50 dark:hover:bg-slate-700/50 transition duration-200 bg-orange-50/30 dark:bg-orange-900/5">
                            <td class="px-6 py-4">
                                <input type="checkbox" checked
                                    class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 rounded-md bg-slate-100 dark:bg-slate-700 dark:border-slate-600">
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                #CUST-002
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-pink-100 dark:bg-pink-900/50 text-pink-600 dark:text-pink-300 flex items-center justify-center font-bold text-sm ring-2 ring-white dark:ring-slate-800">
                                        RM
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-800 dark:text-slate-200">Rina Melati</h4>
                                        <p class="text-xs text-slate-400">Member: Silver</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                        <i class="ph-fill ph-envelope text-slate-400"></i>
                                        <span>rina.melati@yahoo.com</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-slate-500">
                                        <i class="ph-fill ph-phone text-slate-400"></i>
                                        <span>0813-9999-8888</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 max-w-xs truncate text-slate-500">
                                Apartemen Green View, Tower B
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-3 py-1 bg-orange-100 dark:bg-orange-500/20 text-orange-700 dark:text-orange-400 rounded-full text-xs font-bold border border-orange-200 dark:border-orange-500/30 flex items-center justify-center gap-1">
                                    <i class="ph-bold ph-warning-circle"></i> Unpaid
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div
                                    class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition">
                                        <i class="ph-bold ph-gear text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition">
                                        <i class="ph-bold ph-pencil-simple text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition">
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
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">1-10</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">1,240</span> data
                </p>

                <div class="flex gap-2">
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 dark:bg-slate-700 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-600 transition disabled:opacity-50">
                        <i class="ph-bold ph-caret-left"></i>
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-200 dark:shadow-none font-bold text-sm">
                        1
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 transition text-sm font-medium">
                        2
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 transition text-sm font-medium">
                        3
                    </button>
                    <span class="w-10 h-10 flex items-center justify-center text-slate-400">...</span>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 transition text-sm font-medium">
                        12
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 dark:bg-slate-700 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-600 transition">
                        <i class="ph-bold ph-caret-right"></i>
                    </button>
                </div>
            </div>

        </div>
    </section>
@endsection
