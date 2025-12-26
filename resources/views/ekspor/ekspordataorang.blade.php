@extends('layouts.admin')

@section('title', 'Ekspor Data - Hanania POS')

@section('content')
    <section id="export-page" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Ekspor Data Orang
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Unduh data pelanggan dan supplier dalam format Excel atau PDF.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

            <div
                class="bg-white dark:bg-darkCard p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex items-center gap-4 mb-6">
                    <div
                        class="w-14 h-14 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-users-three text-3xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-display font-bold text-slate-800 dark:text-white">
                            Data Pelanggan
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            Ekspor database customer
                        </p>
                    </div>
                </div>

                <form action="#" method="POST"> @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 ml-1">
                                Filter Pelanggan (Opsional)
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <i class="ph-bold ph-magnifying-glass"></i>
                                </span>
                                <input type="text" placeholder="Cari nama pelanggan..."
                                    class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition text-sm font-medium">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 ml-1">
                                Format File
                            </label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="cursor-pointer">
                                    <input type="radio" name="format_pelanggan" value="excel" class="peer sr-only"
                                        checked>
                                    <div
                                        class="flex items-center justify-center gap-2 p-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700/30 text-slate-500 peer-checked:bg-emerald-50 peer-checked:border-emerald-500 peer-checked:text-emerald-600 transition">
                                        <i class="ph-fill ph-microsoft-excel-logo text-lg"></i>
                                        <span class="text-sm font-bold">Excel</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="format_pelanggan" value="pdf" class="peer sr-only">
                                    <div
                                        class="flex items-center justify-center gap-2 p-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700/30 text-slate-500 peer-checked:bg-red-50 peer-checked:border-red-500 peer-checked:text-red-600 transition">
                                        <i class="ph-fill ph-file-pdf text-lg"></i>
                                        <span class="text-sm font-bold">PDF</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full mt-2 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-lg shadow-indigo-200 dark:shadow-none flex items-center justify-center gap-2 transition-all active:scale-95">
                            <i class="ph-bold ph-download-simple"></i>
                            Ekspor Data Pelanggan
                        </button>
                    </div>
                </form>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex items-center gap-4 mb-6">
                    <div
                        class="w-14 h-14 bg-orange-50 dark:bg-orange-500/20 text-orange-600 dark:text-orange-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-warehouse text-3xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-display font-bold text-slate-800 dark:text-white">
                            Data Supplier
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            Ekspor database pemasok
                        </p>
                    </div>
                </div>

                <form action="#" method="POST"> @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 ml-1">
                                Filter Supplier (Opsional)
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <i class="ph-bold ph-magnifying-glass"></i>
                                </span>
                                <input type="text" placeholder="Cari nama supplier..."
                                    class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-white focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition text-sm font-medium">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 ml-1">
                                Format File
                            </label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="cursor-pointer">
                                    <input type="radio" name="format_supplier" value="excel" class="peer sr-only"
                                        checked>
                                    <div
                                        class="flex items-center justify-center gap-2 p-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700/30 text-slate-500 peer-checked:bg-emerald-50 peer-checked:border-emerald-500 peer-checked:text-emerald-600 transition">
                                        <i class="ph-fill ph-microsoft-excel-logo text-lg"></i>
                                        <span class="text-sm font-bold">Excel</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="format_supplier" value="pdf" class="peer sr-only">
                                    <div
                                        class="flex items-center justify-center gap-2 p-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700/30 text-slate-500 peer-checked:bg-red-50 peer-checked:border-red-500 peer-checked:text-red-600 transition">
                                        <i class="ph-fill ph-file-pdf text-lg"></i>
                                        <span class="text-sm font-bold">PDF</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full mt-2 py-3.5 bg-orange-500 hover:bg-orange-600 text-white rounded-xl font-bold shadow-lg shadow-orange-200 dark:shadow-none flex items-center justify-center gap-2 transition-all active:scale-95">
                            <i class="ph-bold ph-download-simple"></i>
                            Ekspor Data Supplier
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-700">
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                    Riwayat Ekspor Terakhir
                </h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 font-bold">Jenis Data</th>
                            <th class="px-6 py-4 font-bold">Diekspor Oleh</th>
                            <th class="px-6 py-4 font-bold">Format</th>
                            <th class="px-6 py-4 font-bold text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                16 Des 2024, 10:30
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                Pelanggan (Semua)
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-6 h-6 rounded-full bg-slate-200 flex items-center justify-center text-xs font-bold">
                                        AD</div>
                                    <span>Admin</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="flex items-center gap-1 text-emerald-600 dark:text-emerald-400 font-bold text-xs">
                                    <i class="ph-fill ph-microsoft-excel-logo text-lg"></i> Excel
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span
                                    class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30">
                                    Selesai
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                15 Des 2024, 14:20
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                Supplier (Sumbawa)
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-6 h-6 rounded-full bg-slate-200 flex items-center justify-center text-xs font-bold">
                                        AD</div>
                                    <span>Admin</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="flex items-center gap-1 text-red-600 dark:text-red-400 font-bold text-xs">
                                    <i class="ph-fill ph-file-pdf text-lg"></i> PDF
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span
                                    class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30">
                                    Selesai
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
