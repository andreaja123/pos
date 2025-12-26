@extends('layouts.admin')

@section('title', 'Laporan Akun - Hanania POS')

@section('content')
    <section id="laporan-akun" class="page-section active max-w-7xl mx-auto">

        <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Laporan Akun
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                    Kelola dan ekspor data transaksi pelanggan & supplier.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

            <div
                class="bg-white dark:bg-darkCard p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-indigo-50 dark:bg-indigo-500/10 rounded-full blur-3xl group-hover:bg-indigo-100 dark:group-hover:bg-indigo-500/20 transition duration-500">
                </div>

                <div class="relative z-10">
                    <div class="flex items-center gap-4 mb-6">
                        <div
                            class="w-14 h-14 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-2xl flex items-center justify-center shadow-sm">
                            <i class="ph-fill ph-users text-3xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-display font-bold text-slate-800 dark:text-white">
                                Ekspor Pelanggan
                            </h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                Unduh riwayat transaksi per pelanggan
                            </p>
                        </div>
                    </div>

                    <form action="#" method="POST" class="space-y-4">
                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 uppercase tracking-wider">
                                Cari Pelanggan
                            </label>
                            <div class="relative">
                                <i
                                    class="ph-bold ph-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                                <input type="text" placeholder="Ketik nama pelanggan..."
                                    class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-white text-sm rounded-xl pl-11 pr-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition placeholder:text-slate-400">
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 uppercase tracking-wider">
                                Periode Laporan
                            </label>
                            <input type="date"
                                class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-white text-sm rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 outline-none transition">
                        </div>

                        <div class="grid grid-cols-2 gap-3 pt-2">
                            <button type="button"
                                class="flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 text-sm font-medium transition group/btn active:bg-slate-100">
                                <i class="ph-fill ph-file-pdf text-red-500 text-lg"></i> PDF
                            </button>
                            <button type="button"
                                class="flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-indigo-200 dark:border-indigo-500/30 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-700 dark:text-indigo-400 text-sm font-bold ring-1 ring-indigo-500/20 transition">
                                <i class="ph-fill ph-file-xls text-green-600 text-lg"></i> Excel
                            </button>
                        </div>

                        <button type="button"
                            class="w-full mt-2 bg-slate-900 dark:bg-indigo-600 hover:bg-slate-800 dark:hover:bg-indigo-500 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-slate-200 dark:shadow-indigo-900/20 transition transform active:scale-[0.98] flex items-center justify-center gap-2">
                            <i class="ph-bold ph-download-simple"></i>
                            Ekspor Data Pelanggan
                        </button>
                    </form>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-orange-50 dark:bg-orange-500/10 rounded-full blur-3xl group-hover:bg-orange-100 dark:group-hover:bg-orange-500/20 transition duration-500">
                </div>

                <div class="relative z-10">
                    <div class="flex items-center gap-4 mb-6">
                        <div
                            class="w-14 h-14 bg-orange-50 dark:bg-orange-500/20 text-orange-600 dark:text-orange-400 rounded-2xl flex items-center justify-center shadow-sm">
                            <i class="ph-fill ph-truck text-3xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-display font-bold text-slate-800 dark:text-white">
                                Ekspor Supplier
                            </h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                Unduh data pembelian ke supplier
                            </p>
                        </div>
                    </div>

                    <form action="#" method="POST" class="space-y-4">
                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 uppercase tracking-wider">
                                Cari Supplier
                            </label>
                            <div class="relative">
                                <i
                                    class="ph-bold ph-storefront absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                                <select
                                    class="w-full appearance-none bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-white text-sm rounded-xl pl-11 pr-10 py-3 focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none transition cursor-pointer">
                                    <option value="" disabled selected>Pilih Supplier...</option>
                                    <option value="1">PT. Sumber Makmur</option>
                                    <option value="2">CV. Textile Jaya</option>
                                    <option value="3">Gudang Kain Abadi</option>
                                </select>
                                <i
                                    class="ph-bold ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 uppercase tracking-wider">
                                Periode Laporan
                            </label>
                            <input type="date"
                                class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-white text-sm rounded-xl px-4 py-3 focus:ring-2 focus:ring-orange-500 outline-none transition">
                        </div>

                        <div class="grid grid-cols-2 gap-3 pt-2">
                            <button type="button"
                                class="flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 text-sm font-medium transition">
                                <i class="ph-fill ph-file-pdf text-red-500 text-lg"></i> PDF
                            </button>
                            <button type="button"
                                class="flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-orange-200 dark:border-orange-500/30 bg-orange-50 dark:bg-orange-500/10 text-orange-700 dark:text-orange-400 text-sm font-bold ring-1 ring-orange-500/20 transition">
                                <i class="ph-fill ph-file-xls text-green-600 text-lg"></i> Excel
                            </button>
                        </div>

                        <button type="button"
                            class="w-full mt-2 bg-slate-900 dark:bg-orange-600 hover:bg-slate-800 dark:hover:bg-orange-500 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-slate-200 dark:shadow-orange-900/20 transition transform active:scale-[0.98] flex items-center justify-center gap-2">
                            <i class="ph-bold ph-download-simple"></i>
                            Ekspor Data Supplier
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <div>
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Riwayat Ekspor
                    </h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        File yang baru saja diunduh
                    </p>
                </div>
                <button class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition">
                    <i class="ph-bold ph-arrows-clockwise text-xl"></i>
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 font-bold">Jenis Laporan</th>
                            <th class="px-6 py-4 font-bold">Target</th>
                            <th class="px-6 py-4 font-bold">Format</th>
                            <th class="px-6 py-4 font-bold text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                16 Des 2023, 10:45
                            </td>
                            <td class="px-6 py-4">
                                <span class="flex items-center gap-2 font-bold text-slate-800 dark:text-slate-200">
                                    <i class="ph-fill ph-users text-indigo-500"></i> Pelanggan
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                Budi Santoso
                            </td>
                            <td class="px-6 py-4">
                                <div
                                    class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-green-50 dark:bg-green-500/10 text-green-700 dark:text-green-400 text-xs font-bold border border-green-100 dark:border-green-500/20">
                                    <i class="ph-fill ph-file-xls"></i> Excel
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-emerald-500 font-bold text-xs flex items-center justify-end gap-1">
                                    <i class="ph-bold ph-check-circle"></i> Selesai
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                16 Des 2023, 09:20
                            </td>
                            <td class="px-6 py-4">
                                <span class="flex items-center gap-2 font-bold text-slate-800 dark:text-slate-200">
                                    <i class="ph-fill ph-truck text-orange-500"></i> Supplier
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                CV. Textile Jaya
                            </td>
                            <td class="px-6 py-4">
                                <div
                                    class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-red-50 dark:bg-red-500/10 text-red-700 dark:text-red-400 text-xs font-bold border border-red-100 dark:border-red-500/20">
                                    <i class="ph-fill ph-file-pdf"></i> PDF
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-emerald-500 font-bold text-xs flex items-center justify-end gap-1">
                                    <i class="ph-bold ph-check-circle"></i> Selesai
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
