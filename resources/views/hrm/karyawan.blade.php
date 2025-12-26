@extends('layouts.admin')

@section('title', 'Karyawan - Hanania POS')

@section('content')
    <section id="karyawan" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Manajemen Karyawan
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Kelola data staf, akses, dan status operasional.
                </p>
            </div>

            <div class="flex gap-3 w-full md:w-auto">
                <button
                    class="flex-1 md:flex-none items-center justify-center gap-2 px-5 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold text-sm rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition shadow-sm">
                    <i class="ph-bold ph-microsoft-excel-logo text-lg text-emerald-600"></i>
                    Export Excel
                </button>

                <button
                    class="flex-1 md:flex-none items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 text-white font-bold text-sm rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200/50 dark:shadow-none">
                    <i class="ph-bold ph-plus text-lg"></i>
                    Tambah Baru
                </button>
            </div>
        </div>

        <div class="bg-white dark:bg-darkCard p-4 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm mb-6">
            <div class="relative max-w-md w-full">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="ph-bold ph-magnifying-glass text-slate-400 text-lg"></i>
                </div>
                <input type="text"
                    class="w-full pl-11 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm text-slate-700 dark:text-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition placeholder-slate-400"
                    placeholder="Cari nama karyawan atau role...">
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display uppercase tracking-wider text-xs">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">Nama Karyawan</th>
                            <th class="px-6 py-4 font-bold">Role</th>
                            <th class="px-6 py-4 font-bold">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">01</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300 flex items-center justify-center font-bold text-sm">
                                        AN
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-white">Andi Nugraha</p>
                                        <p class="text-xs text-slate-400">andi@hananiapos.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="ph-duotone ph-crown text-amber-500 text-lg"></i>
                                    <span class="font-medium text-slate-700 dark:text-slate-300">Manager Toko</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30 flex w-fit items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-2">
                                    <button
                                        class="p-2 hover:bg-blue-50 dark:hover:bg-blue-900/30 text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 rounded-lg transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 hover:bg-amber-50 dark:hover:bg-amber-900/30 text-slate-400 hover:text-amber-600 dark:hover:text-amber-400 rounded-lg transition"
                                        title="Disable Akun">
                                        <i class="ph-bold ph-prohibit text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 hover:bg-red-50 dark:hover:bg-red-900/30 text-slate-400 hover:text-red-600 dark:hover:text-red-400 rounded-lg transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">02</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&q=80&w=100"
                                        alt="Siti Aminah"
                                        class="w-10 h-10 rounded-full object-cover border border-slate-200 dark:border-slate-600">
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-white">Siti Aminah</p>
                                        <p class="text-xs text-slate-400">siti.am@hananiapos.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="ph-duotone ph-calculator text-blue-500 text-lg"></i>
                                    <span class="font-medium text-slate-700 dark:text-slate-300">Kasir</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30 flex w-fit items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-2">
                                    <button
                                        class="p-2 hover:bg-blue-50 dark:hover:bg-blue-900/30 text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 rounded-lg transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 hover:bg-amber-50 dark:hover:bg-amber-900/30 text-slate-400 hover:text-amber-600 dark:hover:text-amber-400 rounded-lg transition"
                                        title="Disable Akun">
                                        <i class="ph-bold ph-prohibit text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 hover:bg-red-50 dark:hover:bg-red-900/30 text-slate-400 hover:text-red-600 dark:hover:text-red-400 rounded-lg transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition opacity-75">
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">03</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-600 text-slate-500 dark:text-slate-300 flex items-center justify-center font-bold text-sm">
                                        BS
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-600 dark:text-slate-300">Budi Santoso</p>
                                        <p class="text-xs text-slate-400">budi.s@hananiapos.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="ph-duotone ph-package text-slate-500 text-lg"></i>
                                    <span class="font-medium text-slate-700 dark:text-slate-300">Staff Gudang</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-slate-100 dark:bg-slate-600/20 text-slate-500 dark:text-slate-400 rounded-full text-xs font-bold border border-slate-200 dark:border-slate-600 flex w-fit items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                    Non-Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-2">
                                    <button
                                        class="p-2 hover:bg-blue-50 dark:hover:bg-blue-900/30 text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 rounded-lg transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400 rounded-lg transition"
                                        title="Enable Akun">
                                        <i class="ph-bold ph-check-circle text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 hover:bg-red-50 dark:hover:bg-red-900/30 text-slate-400 hover:text-red-600 dark:hover:text-red-400 rounded-lg transition"
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
                class="px-6 py-4 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400 text-center md:text-left">
                    Menampilkan <span class="font-bold text-slate-700 dark:text-white">1-3</span> dari <span
                        class="font-bold text-slate-700 dark:text-white">12</span> data karyawan
                </p>

                <div class="flex items-center gap-2">
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 disabled:opacity-50 transition">
                        <i class="ph-bold ph-caret-left"></i>
                    </button>

                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-indigo-600 text-white text-sm font-bold shadow-md shadow-indigo-200 dark:shadow-none transition">
                        1
                    </button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 text-sm font-bold transition">
                        2
                    </button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 text-sm font-bold transition">
                        3
                    </button>

                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        <i class="ph-bold ph-caret-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
