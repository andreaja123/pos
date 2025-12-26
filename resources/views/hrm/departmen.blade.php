@extends('layouts.admin')

@section('title', 'Departemen - Hanania POS')

@section('content')
    <section id="department" class="page-section active max-w-7xl mx-auto space-y-6">

        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Manajemen Departemen
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Kelola struktur divisi dan departemen perusahaan.
                </p>
            </div>

            <div
                class="flex items-center gap-4 bg-white dark:bg-darkCard px-5 py-3 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm">
                <div
                    class="w-10 h-10 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-xl flex items-center justify-center">
                    <i class="ph-fill ph-buildings text-xl"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 font-bold">Total Departemen</p>
                    <p class="text-lg font-bold text-slate-800 dark:text-white">12</p>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none overflow-hidden">

            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">

                <div class="relative w-full md:w-96 group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i
                            class="ph-bold ph-magnifying-glass text-slate-400 group-focus-within:text-indigo-500 transition-colors"></i>
                    </div>
                    <input type="text"
                        class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 dark:border-slate-600 rounded-xl leading-5 bg-slate-50 dark:bg-slate-700/50 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:bg-white dark:focus:bg-slate-700 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition duration-200 sm:text-sm"
                        placeholder="Cari nama departemen...">
                </div>

                <div class="flex items-center gap-3 w-full md:w-auto">
                    <button
                        class="flex items-center justify-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-600 hover:text-emerald-600 dark:hover:text-emerald-400 transition duration-200 font-bold text-sm w-full md:w-auto group">
                        <i
                            class="ph-fill ph-microsoft-excel-logo text-lg text-slate-400 group-hover:text-emerald-500 transition"></i>
                        <span>Ekspor Excel</span>
                    </button>

                    <button
                        class="flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-lg shadow-indigo-200/50 dark:shadow-none transition duration-200 font-bold text-sm w-full md:w-auto">
                        <i class="ph-bold ph-plus text-lg"></i>
                        <span>Tambah Baru</span>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16 text-center">No</th>
                            <th class="px-6 py-4 font-bold">Nama Departemen</th>
                            <th class="px-6 py-4 font-bold">Jumlah Staff</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition duration-150">
                            <td class="px-6 py-4 text-center font-mono text-slate-500 dark:text-slate-400">1</td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-slate-800 dark:text-slate-200 text-base">Human Resources</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="flex -space-x-2">
                                        <div
                                            class="w-8 h-8 rounded-full border-2 border-white dark:border-slate-700 bg-slate-200 dark:bg-slate-600 flex items-center justify-center text-xs font-bold text-slate-500">
                                            4
                                        </div>
                                    </div>
                                    <span class="text-xs text-slate-400">Orang</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-amber-50 dark:bg-amber-500/10 text-amber-600 hover:bg-amber-100 dark:hover:bg-amber-500/20 transition duration-200"
                                        title="Edit">
                                        <i class="ph-bold ph-pencil-simple"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-red-50 dark:bg-red-500/10 text-red-600 hover:bg-red-100 dark:hover:bg-red-500/20 transition duration-200"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition duration-150">
                            <td class="px-6 py-4 text-center font-mono text-slate-500 dark:text-slate-400">2</td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-slate-800 dark:text-slate-200 text-base">Marketing &
                                    Sales</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-8 h-8 rounded-full border-2 border-white dark:border-slate-700 bg-slate-200 dark:bg-slate-600 flex items-center justify-center text-xs font-bold text-slate-500">
                                        12
                                    </div>
                                    <span class="text-xs text-slate-400">Orang</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-amber-50 dark:bg-amber-500/10 text-amber-600 hover:bg-amber-100 dark:hover:bg-amber-500/20 transition duration-200">
                                        <i class="ph-bold ph-pencil-simple"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-red-50 dark:bg-red-500/10 text-red-600 hover:bg-red-100 dark:hover:bg-red-500/20 transition duration-200">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition duration-150">
                            <td class="px-6 py-4 text-center font-mono text-slate-500 dark:text-slate-400">3</td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-slate-800 dark:text-slate-200 text-base">IT & Development</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-8 h-8 rounded-full border-2 border-white dark:border-slate-700 bg-slate-200 dark:bg-slate-600 flex items-center justify-center text-xs font-bold text-slate-500">
                                        8
                                    </div>
                                    <span class="text-xs text-slate-400">Orang</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-amber-50 dark:bg-amber-500/10 text-amber-600 hover:bg-amber-100 dark:hover:bg-amber-500/20 transition duration-200">
                                        <i class="ph-bold ph-pencil-simple"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-red-50 dark:bg-red-500/10 text-red-600 hover:bg-red-100 dark:hover:bg-red-500/20 transition duration-200">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hidden">
                            <td colspan="4" class="px-6 py-12 text-center text-slate-400">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="ph-duotone ph-folder-dashed text-4xl mb-2 text-slate-300"></i>
                                    <p>Belum ada data departemen.</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div
                class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">1</span> sampai <span
                        class="font-bold text-slate-800 dark:text-white">3</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">12</span> data
                </p>

                <div class="flex items-center gap-2">
                    <button
                        class="w-9 h-9 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="ph-bold ph-caret-left"></i>
                    </button>

                    <button
                        class="w-9 h-9 flex items-center justify-center rounded-lg bg-indigo-600 text-white shadow-md shadow-indigo-200/50 dark:shadow-none font-bold text-sm">
                        1
                    </button>
                    <button
                        class="w-9 h-9 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700 transition font-bold text-sm">
                        2
                    </button>
                    <button
                        class="w-9 h-9 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700 transition font-bold text-sm">
                        3
                    </button>

                    <button
                        class="w-9 h-9 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        <i class="ph-bold ph-caret-right"></i>
                    </button>
                </div>
            </div>

        </div>
    </section>
@endsection
