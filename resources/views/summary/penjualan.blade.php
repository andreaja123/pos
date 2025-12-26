@extends('layouts.admin')

@section('title', 'Summary Penjualan & Keuntungan - Hanania POS')

@section('content')
    <section id="sales-summary" class="page-section active max-w-7xl mx-auto">

        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Summary Penjualan & Keuntungan
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm">
                    Laporan kinerja penjualan dan analisis keuntungan bisnis.
                </p>
            </div>
            <button
                class="flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-sm transition shadow-lg shadow-indigo-200 dark:shadow-none">
                <i class="ph-bold ph-download-simple text-lg"></i>
                Export Laporan
            </button>
        </div>

        <div
            class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none mb-8">
            <div class="flex items-center gap-2 mb-4">
                <div
                    class="w-8 h-8 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-lg flex items-center justify-center">
                    <i class="ph-fill ph-sliders-horizontal"></i>
                </div>
                <h3 class="font-display font-bold text-slate-800 dark:text-white">
                    Filter & Hitung Custom
                </h3>
            </div>

            <form action="#" class="grid grid-cols-1 md:grid-cols-4 gap-6 items-end">
                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                        Lokasi Bisnis
                    </label>
                    <div class="relative">
                        <select
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-slate-200 font-bold text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 appearance-none">
                            <option value="all">Semua Cabang</option>
                            <option value="jkt">Cabang Jakarta</option>
                            <option value="bdg">Cabang Bandung</option>
                            <option value="sby">Cabang Surabaya</option>
                        </select>
                        <i class="ph-bold ph-storefront absolute right-4 top-3.5 text-slate-400"></i>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                        Dari Tanggal
                    </label>
                    <div class="relative">
                        <input type="date"
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-slate-200 font-bold text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                        Sampai Tanggal
                    </label>
                    <div class="relative">
                        <input type="date" value="{{ date('Y-m-d') }}"
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-slate-200 font-bold text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>

                <button type="button"
                    class="w-full px-6 py-3 bg-slate-800 dark:bg-slate-600 hover:bg-slate-700 text-white rounded-xl font-bold text-sm transition flex items-center justify-center gap-2">
                    <i class="ph-bold ph-calculator text-lg"></i>
                    Hitung Data
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300 relative overflow-hidden">
                <div class="absolute -right-6 -top-6 w-32 h-32 bg-indigo-500/5 rounded-full blur-2xl pointer-events-none">
                </div>

                <div class="flex justify-between items-start mb-4 relative z-10">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">
                            Total Penjualan
                        </p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                            Rp 148.2 Jt
                        </h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-chart-line-up text-2xl"></i>
                    </div>
                </div>
                <p class="text-slate-400 text-xs font-medium flex items-center gap-1">
                    <i class="ph-bold ph-info text-indigo-500"></i>
                    Berdasarkan filter tanggal yang dipilih
                </p>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">
                            Penjualan Bulan Ini
                        </p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                            Rp 24.5 Jt
                        </h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-blue-50 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-calendar-check text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden">
                    <div class="bg-blue-500 h-1.5 rounded-full" style="width: 65%"></div>
                </div>
                <p class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                    <span
                        class="bg-emerald-100 dark:bg-emerald-500/20 px-1.5 py-0.5 rounded text-emerald-600 dark:text-emerald-400">+8.4%</span>
                    <span class="text-slate-400 font-medium ml-1">dibanding bulan lalu</span>
                </p>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">
                            Estimasi Keuntungan Bersih
                        </p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                            Rp 42.1 Jt
                        </h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-coins text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden">
                    <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 28%"></div>
                </div>
                <p class="text-slate-400 text-xs font-medium flex items-center gap-1">
                    <span class="text-slate-500 dark:text-slate-300 font-bold">~28.4%</span>
                    <span class="text-slate-400 font-medium ml-1">Margin Keuntungan</span>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div
                class="lg:col-span-3 bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                            Rincian Transaksi
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            Data transaksi berdasarkan filter di atas
                        </p>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-xl border border-slate-100 dark:border-slate-700">
                    <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                        <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                            <tr>
                                <th class="px-6 py-4 font-bold">Tanggal</th>
                                <th class="px-6 py-4 font-bold">Lokasi</th>
                                <th class="px-6 py-4 font-bold">Jml Transaksi</th>
                                <th class="px-6 py-4 font-bold">Omset</th>
                                <th class="px-6 py-4 font-bold text-right">Keuntungan (Est)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">20 Okt 2023</td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-slate-200">Cabang Jakarta</td>
                                <td class="px-6 py-4">42</td>
                                <td class="px-6 py-4 text-slate-800 dark:text-white font-bold">Rp 12.500.000</td>
                                <td class="px-6 py-4 text-emerald-600 dark:text-emerald-400 font-bold text-right">Rp
                                    3.200.000</td>
                            </tr>
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">19 Okt 2023</td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-slate-200">Cabang Jakarta</td>
                                <td class="px-6 py-4">38</td>
                                <td class="px-6 py-4 text-slate-800 dark:text-white font-bold">Rp 9.800.000</td>
                                <td class="px-6 py-4 text-emerald-600 dark:text-emerald-400 font-bold text-right">Rp
                                    2.450.000</td>
                            </tr>
                        </tbody>
                        <tfoot
                            class="bg-slate-50 dark:bg-slate-800 font-bold text-slate-800 dark:text-white border-t border-slate-200 dark:border-slate-600">
                            <tr>
                                <td class="px-6 py-4" colspan="3">Total Periode Ini</td>
                                <td class="px-6 py-4">Rp 22.300.000</td>
                                <td class="px-6 py-4 text-right text-emerald-600 dark:text-emerald-400">Rp 5.650.000</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </section>
@endsection
