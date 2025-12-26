@extends('layouts.admin')

@section('title', 'Hitung Keuntungan - Hanania POS')

@section('content')
    <section id="profit-calculator" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Analisa Keuntungan
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm">
                    Pantau arus kas dan hitung profitabilitas bisnis Anda.
                </p>
            </div>
            <div class="flex gap-3">
                <button
                    class="px-4 py-2 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 rounded-xl text-sm font-bold hover:bg-slate-50 transition flex items-center gap-2">
                    <i class="ph-bold ph-download-simple"></i> Export Laporan
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div
                class="bg-gradient-to-br from-indigo-500 to-purple-600 p-6 rounded-3xl shadow-lg shadow-indigo-200/50 dark:shadow-none text-white relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16 blur-2xl group-hover:scale-110 transition duration-700">
                </div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-6">
                        <div class="p-3 bg-white/20 rounded-2xl backdrop-blur-sm">
                            <i class="ph-fill ph-vault text-2xl text-white"></i>
                        </div>
                        <span class="bg-white/20 px-2 py-1 rounded-lg text-xs font-medium backdrop-blur-sm">
                            Seumur Hidup
                        </span>
                    </div>
                    <p class="text-indigo-100 text-sm font-medium mb-1">Total Pemasukan</p>
                    <h3 class="text-3xl md:text-4xl font-display font-bold">
                        Rp 842.500.000
                    </h3>
                    <div class="mt-4 flex items-center gap-2 text-indigo-100 text-xs">
                        <i class="ph-bold ph-trend-up"></i>
                        <span>Akumulasi dari semua akun</span>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">
                            Pemasukan Bulan Ini
                        </p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                            Rp 24.500.000
                        </h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-calendar-check text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden">
                    <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 65%"></div>
                </div>
                <p class="text-slate-500 text-xs flex items-center gap-1">
                    Target: <span class="font-bold text-slate-700 dark:text-slate-300">Rp 35.000.000</span>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div
                class="lg:col-span-1 bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6 h-fit">
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-6 flex items-center gap-2">
                    <i class="ph-duotone ph-faders text-indigo-500"></i> Filter Keuntungan
                </h3>

                <form action="#" method="GET" class="space-y-5">
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Sumber Akun
                        </label>
                        <div class="relative">
                            <select
                                class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-white text-sm rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block p-3 appearance-none font-medium">
                                <option value="all">Semua Akun</option>
                                <option value="cash">Kas Tunai</option>
                                <option value="bca">Bank BCA</option>
                                <option value="mandiri">Bank Mandiri</option>
                                <option value="qris">QRIS / E-Wallet</option>
                            </select>
                            <div
                                class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-500">
                                <i class="ph-bold ph-caret-down"></i>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                Dari
                            </label>
                            <input type="date"
                                class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-white text-sm rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block p-3 font-medium">
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                Sampai
                            </label>
                            <input type="date" value="{{ date('Y-m-d') }}"
                                class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-white text-sm rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block p-3 font-medium">
                        </div>
                    </div>

                    <hr class="border-slate-100 dark:border-slate-700 my-4">

                    <button type="button"
                        class="w-full py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 dark:shadow-none transition duration-200 flex items-center justify-center gap-2">
                        <i class="ph-bold ph-calculator"></i> Hitung Sekarang
                    </button>
                </form>
            </div>

            <div
                class="lg:col-span-2 bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 dark:border-slate-700">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Laporan Laba Rugi
                    </h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                        Periode: <span class="font-bold text-indigo-500">01 Des 2023 - 16 Des 2023</span>
                    </p>
                </div>

                <div class="p-6">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between bg-slate-50 dark:bg-slate-800/50 p-6 rounded-2xl mb-8 border border-slate-100 dark:border-slate-700">
                        <div class="mb-4 md:mb-0">
                            <p class="text-sm font-bold text-slate-500 dark:text-slate-400 mb-1">Laba Bersih (Net Profit)
                            </p>
                            <h2 class="text-4xl font-display font-bold text-emerald-500">
                                + Rp 12.450.000
                            </h2>
                        </div>
                        <div class="text-right">
                            <div
                                class="inline-flex items-center gap-2 px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-sm font-bold">
                                <i class="ph-bold ph-chart-line-up"></i> 32% Margin
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div
                            class="flex justify-between items-center p-4 hover:bg-slate-50 dark:hover:bg-slate-800/50 rounded-xl transition cursor-default">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-600 flex items-center justify-center">
                                    <i class="ph-bold ph-arrow-down-left"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-700 dark:text-slate-200">Total Omset / Penjualan</h4>
                                    <p class="text-xs text-slate-400">Pemasukan kotor</p>
                                </div>
                            </div>
                            <span class="font-bold text-slate-800 dark:text-white">Rp 24.500.000</span>
                        </div>

                        <div
                            class="flex justify-between items-center p-4 hover:bg-slate-50 dark:hover:bg-slate-800/50 rounded-xl transition cursor-default group">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-orange-50 dark:bg-orange-900/30 text-orange-600 flex items-center justify-center">
                                    <i class="ph-bold ph-package"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-700 dark:text-slate-200">HPP (Modal Produk)</h4>
                                    <p class="text-xs text-slate-400">Harga pokok penjualan</p>
                                </div>
                            </div>
                            <span class="font-bold text-red-500">- Rp 9.050.000</span>
                        </div>

                        <div
                            class="flex justify-between items-center p-4 hover:bg-slate-50 dark:hover:bg-slate-800/50 rounded-xl transition cursor-default">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-red-50 dark:bg-red-900/30 text-red-600 flex items-center justify-center">
                                    <i class="ph-bold ph-arrow-up-right"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-700 dark:text-slate-200">Biaya Operasional</h4>
                                    <p class="text-xs text-slate-400">Gaji, Listrik, Sewa, dll</p>
                                </div>
                            </div>
                            <span class="font-bold text-red-500">- Rp 3.000.000</span>
                        </div>
                    </div>

                    <div class="mt-8">
                        <div class="flex justify-between text-xs font-bold text-slate-500 mb-2">
                            <span>Biaya (49%)</span>
                            <span>Profit (51%)</span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden flex">
                            <div class="h-full bg-red-400" style="width: 37%"></div>
                            <div class="h-full bg-orange-400" style="width: 12%"></div>
                            <div class="h-full bg-emerald-500" style="width: 51%"></div>
                        </div>
                        <div class="flex gap-4 mt-3 justify-center">
                            <div class="flex items-center gap-1.5">
                                <div class="w-2 h-2 rounded-full bg-red-400"></div>
                                <span class="text-xs text-slate-500 font-medium">HPP</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <div class="w-2 h-2 rounded-full bg-orange-400"></div>
                                <span class="text-xs text-slate-500 font-medium">Ops</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                                <span class="text-xs text-slate-500 font-medium">Net Profit</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
