@extends('layouts.admin')

@section('title', 'Summary Keuntungan - Hanania POS')

@section('content')
    <section id="profit-summary" class="page-section active max-w-7xl mx-auto">

        <div class="mb-8 flex flex-col md:flex-row justify-between items-end md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Summary Keuntungan
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                    Analisis profitabilitas dan performa bisnis Anda.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <span
                    class="text-xs font-bold text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-800 px-3 py-1.5 rounded-full border border-slate-200 dark:border-slate-700 shadow-sm">
                    <i class="ph-fill ph-calendar-blank mr-1"></i> {{ date('d M Y') }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div
                class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-3xl p-1 shadow-lg shadow-emerald-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300 relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition duration-500">
                    <i class="ph-fill ph-coins text-9xl text-white"></i>
                </div>

                <div class="bg-white dark:bg-darkCard h-full rounded-[1.3rem] p-6 relative z-10">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1 uppercase tracking-wider">
                                Grand Total Keuntungan
                            </p>
                            <h3 class="text-4xl font-display font-bold text-emerald-600 dark:text-emerald-400">
                                Rp 845.2 Jt
                            </h3>
                        </div>
                        <div
                            class="w-14 h-14 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center shadow-sm">
                            <i class="ph-fill ph-wallet text-3xl"></i>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mt-4">
                        <span
                            class="bg-emerald-100 dark:bg-emerald-500/20 px-2 py-1 rounded-lg text-emerald-700 dark:text-emerald-300 text-xs font-bold">
                            All Time
                        </span>
                        <p class="text-slate-400 text-xs">Akumulasi bersih sejak awal operasi</p>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1 uppercase tracking-wider">
                            Keuntungan Bulan Ini
                        </p>
                        <h3 class="text-4xl font-display font-bold text-slate-800 dark:text-white">
                            Rp 42.8 Jt
                        </h3>
                    </div>
                    <div
                        class="w-14 h-14 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-chart-line-up text-3xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-2 rounded-full mb-4 overflow-hidden">
                    <div class="bg-indigo-500 h-2 rounded-full animate-pulse" style="width: 68%"></div>
                </div>
                <div class="flex justify-between items-center text-xs">
                    <p class="text-emerald-500 font-bold flex items-center gap-1">
                        <i class="ph-bold ph-trend-up"></i>
                        <span>+8.4%</span>
                        <span class="text-slate-400 font-medium ml-1">vs bulan lalu</span>
                    </p>
                    <span class="text-slate-400">Target: Rp 60 Jt</span>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none mb-8 overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50">
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white flex items-center gap-2">
                    <i class="ph-duotone ph-faders text-indigo-500"></i>
                    Kalkulator Keuntungan Kustom
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Filter keuntungan berdasarkan lokasi cabang dan rentang waktu spesifik.
                </p>
            </div>

            <div class="p-6 md:p-8">
                <form action="#" class="grid grid-cols-1 md:grid-cols-12 gap-6 items-end">

                    <div class="md:col-span-4">
                        <label
                            class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 uppercase tracking-wide">
                            Lokasi Bisnis / Cabang
                        </label>
                        <div class="relative">
                            <select
                                class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-slate-200 text-sm font-bold focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition appearance-none cursor-pointer">
                                <option value="all">Semua Cabang</option>
                                <option value="jkt">Jakarta Pusat</option>
                                <option value="bdg">Bandung</option>
                                <option value="sby">Surabaya</option>
                            </select>
                            <i class="ph-bold ph-storefront absolute left-3.5 top-3.5 text-slate-400 text-lg"></i>
                            <i class="ph-bold ph-caret-down absolute right-3.5 top-3.5 text-slate-400"></i>
                        </div>
                    </div>

                    <div class="md:col-span-3">
                        <label
                            class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 uppercase tracking-wide">
                            Dari Tanggal
                        </label>
                        <div class="relative">
                            <input type="date"
                                class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-slate-200 text-sm font-bold focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition uppercase">
                            <i class="ph-bold ph-calendar absolute left-3.5 top-3.5 text-slate-400 text-lg"></i>
                        </div>
                    </div>

                    <div class="md:col-span-3">
                        <label
                            class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 uppercase tracking-wide">
                            Sampai Tanggal
                        </label>
                        <div class="relative">
                            <input type="date"
                                class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-slate-200 text-sm font-bold focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition uppercase">
                            <i class="ph-bold ph-calendar-check absolute left-3.5 top-3.5 text-slate-400 text-lg"></i>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <button type="button"
                            class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 dark:shadow-none hover:-translate-y-0.5 transition duration-200 flex items-center justify-center gap-2">
                            <i class="ph-bold ph-calculator"></i>
                            Hitung
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div
                class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6 lg:col-span-1">
                <h4 class="font-display font-bold text-slate-800 dark:text-white mb-6">Rincian Kalkulasi</h4>

                <div class="space-y-4">
                    <div
                        class="flex justify-between items-center pb-4 border-b border-dashed border-slate-200 dark:border-slate-700">
                        <span class="text-slate-500 dark:text-slate-400 text-sm">Pendapatan Kotor</span>
                        <span class="font-bold text-slate-800 dark:text-white">Rp 150.000.000</span>
                    </div>
                    <div
                        class="flex justify-between items-center pb-4 border-b border-dashed border-slate-200 dark:border-slate-700">
                        <span class="text-slate-500 dark:text-slate-400 text-sm">HPP (COGS)</span>
                        <span class="font-bold text-red-500">- Rp 85.000.000</span>
                    </div>
                    <div
                        class="flex justify-between items-center pb-4 border-b border-dashed border-slate-200 dark:border-slate-700">
                        <span class="text-slate-500 dark:text-slate-400 text-sm">Pengeluaran Ops</span>
                        <span class="font-bold text-red-500">- Rp 15.000.000</span>
                    </div>

                    <div class="pt-2">
                        <div
                            class="p-4 bg-emerald-50 dark:bg-emerald-500/10 rounded-2xl border border-emerald-100 dark:border-emerald-500/20">
                            <p class="text-emerald-600 dark:text-emerald-400 text-xs font-bold uppercase mb-1">Keuntungan
                                Bersih (Net)</p>
                            <h3 class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">Rp 50.000.000</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm lg:col-span-2 overflow-hidden">
                <div class="p-6 border-b border-slate-100 dark:border-slate-700">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Riwayat Transaksi Periode Ini
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                        <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                            <tr>
                                <th class="px-6 py-4 font-bold">Tanggal</th>
                                <th class="px-6 py-4 font-bold">Total Sales</th>
                                <th class="px-6 py-4 font-bold">HPP</th>
                                <th class="px-6 py-4 font-bold text-right">Profit</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">16 Dec 2023</td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp 5.200.000</td>
                                <td class="px-6 py-4 text-slate-500">Rp 3.100.000</td>
                                <td class="px-6 py-4 text-right font-bold text-emerald-600 dark:text-emerald-400">+ Rp
                                    2.100.000</td>
                            </tr>
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">15 Dec 2023</td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp 4.800.000</td>
                                <td class="px-6 py-4 text-slate-500">Rp 2.900.000</td>
                                <td class="px-6 py-4 text-right font-bold text-emerald-600 dark:text-emerald-400">+ Rp
                                    1.900.000</td>
                            </tr>
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">14 Dec 2023</td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp 6.150.000</td>
                                <td class="px-6 py-4 text-slate-500">Rp 3.500.000</td>
                                <td class="px-6 py-4 text-right font-bold text-emerald-600 dark:text-emerald-400">+ Rp
                                    2.650.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </section>
@endsection
