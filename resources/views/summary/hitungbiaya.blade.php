@extends('layouts.admin')

@section('title', 'Hitung Biaya - Hanania POS')

@section('content')
    <section id="profit-calculator" class="page-section active max-w-7xl mx-auto">

        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Hitung Biaya & Keuntungan
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm">
                    Analisis pengeluaran dan estimasi margin keuntungan.
                </p>
            </div>
            <div class="flex gap-3">
                <button
                    class="px-4 py-2 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 rounded-xl font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition shadow-sm">
                    <i class="ph-bold ph-download-simple mr-1"></i> Export Laporan
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none relative overflow-hidden group">
                <div class="flex justify-between items-start mb-4 relative z-10">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">
                            Total Pengeluaran (Bulan Ini)
                        </p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                            Rp 8.250.000
                        </h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-red-50 dark:bg-red-500/20 text-red-600 dark:text-red-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-trend-down text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden relative z-10">
                    <div class="bg-red-500 h-1.5 rounded-full" style="width: 35%"></div>
                </div>
                <p class="text-slate-400 text-xs font-medium flex items-center gap-1 relative z-10">
                    <i class="ph-bold ph-info text-slate-400"></i>
                    <span>Termasuk operasional & HPP</span>
                </p>
            </div>

            <div
                class="md:col-span-2 bg-gradient-to-r from-indigo-600 to-purple-600 p-6 rounded-3xl shadow-lg text-white flex flex-col justify-center relative overflow-hidden">
                <i
                    class="ph-fill ph-chart-pie-slice absolute -right-6 -bottom-6 text-9xl text-white opacity-10 rotate-12"></i>

                <div class="relative z-10">
                    <h3 class="text-xl font-display font-bold mb-2">Monitor Keuangan</h3>
                    <p class="text-indigo-100 text-sm mb-4 max-w-lg">
                        Gunakan kalkulator di bawah ini untuk melihat detail pengeluaran berdasarkan akun spesifik atau
                        rentang waktu tertentu.
                    </p>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-700">
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white flex items-center gap-2">
                    <i class="ph-fill ph-calculator text-indigo-500"></i>
                    Kalkulator Custom Pengeluaran
                </h3>
            </div>

            <div class="p-6 md:p-8">
                <form action="#" method="GET" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                        <div class="space-y-2">
                            <label for="account" class="text-sm font-bold text-slate-600 dark:text-slate-300">
                                Pilih Akun / Kategori
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ph-bold ph-wallet text-slate-400"></i>
                                </div>
                                <select id="account" name="account"
                                    class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-800 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none cursor-pointer">
                                    <option value="all">Semua Akun</option>
                                    <option value="kas">Kas Tunai</option>
                                    <option value="bank">Bank Transfer</option>
                                    <option value="gopay">E-Wallet (GoPay/OVO)</option>
                                    <option value="operasional">Biaya Operasional</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="ph-bold ph-caret-down text-slate-400"></i>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="start_date" class="text-sm font-bold text-slate-600 dark:text-slate-300">
                                Dari Tanggal
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ph-bold ph-calendar text-slate-400"></i>
                                </div>
                                <input type="date" id="start_date" name="start_date"
                                    class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-800 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="end_date" class="text-sm font-bold text-slate-600 dark:text-slate-300">
                                Sampai Saat Ini / Tanggal
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ph-bold ph-calendar-check text-slate-400"></i>
                                </div>
                                <input type="date" id="end_date" name="end_date" value="{{ date('Y-m-d') }}"
                                    class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-800 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                            </div>
                        </div>

                    </div>

                    <div class="flex justify-end pt-4 border-t border-slate-100 dark:border-slate-700/50">
                        <button type="submit"
                            class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-indigo-200 dark:shadow-none transition transform active:scale-95">
                            <i class="ph-bold ph-calculator text-lg"></i>
                            Hitung Sekarang
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-indigo-50 dark:bg-slate-800/50 p-6 md:p-8 border-t border-indigo-100 dark:border-slate-700">
                <h4 class="text-sm font-bold text-slate-500 dark:text-slate-400 mb-4 uppercase tracking-wider">Hasil
                    Perhitungan</h4>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div
                        class="bg-white dark:bg-darkCard p-5 rounded-2xl border border-slate-200 dark:border-slate-600 flex items-center gap-4">
                        <div
                            class="w-12 h-12 rounded-full bg-red-100 dark:bg-red-500/20 flex items-center justify-center text-red-600 dark:text-red-400">
                            <i class="ph-fill ph-money text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-medium">Total Pengeluaran (Periode Ini)</p>
                            <p class="text-2xl font-bold font-display text-slate-800 dark:text-white">Rp 0</p>
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-darkCard p-5 rounded-2xl border border-slate-200 dark:border-slate-600 flex items-center gap-4">
                        <div
                            class="w-12 h-12 rounded-full bg-emerald-100 dark:bg-emerald-500/20 flex items-center justify-center text-emerald-600 dark:text-emerald-400">
                            <i class="ph-fill ph-coins text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-medium">Estimasi Laba Bersih (Opsional)</p>
                            <p class="text-2xl font-bold font-display text-slate-800 dark:text-white">-</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
