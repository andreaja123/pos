@extends('layouts.admin')
@section('title', 'Laporan Kategori Produk - Hanania POS')

@section('content')
    <section id="kategori-produk" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-6 mb-8">
            <div>
                <h1 class="text-2xl font-display font-bold text-slate-800 dark:text-white mb-1">
                    Analisa Kategori
                </h1>
                <p class="text-slate-500 dark:text-slate-400 text-sm">
                    Pantau performa penjualan berdasarkan kelompok produk.
                </p>
            </div>

            <div
                class="w-full lg:w-auto bg-white dark:bg-darkCard p-1.5 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm flex flex-col md:flex-row gap-2">
                <div
                    class="flex items-center bg-slate-50 dark:bg-slate-700/50 rounded-xl px-3 py-2 border border-slate-200 dark:border-slate-600">
                    <i class="ph-bold ph-calendar-blank text-slate-400 mr-2"></i>
                    <input type="date"
                        class="bg-transparent text-xs font-bold text-slate-600 dark:text-slate-300 outline-none w-24">
                    <span class="text-slate-400 mx-2">-</span>
                    <input type="date"
                        class="bg-transparent text-xs font-bold text-slate-600 dark:text-slate-300 outline-none w-24">
                </div>

                <div class="flex bg-slate-100 dark:bg-slate-700 rounded-xl p-1">
                    <button
                        class="px-4 py-1.5 rounded-lg text-xs font-bold text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-white transition">Minggu</button>
                    <button
                        class="px-4 py-1.5 rounded-lg bg-white dark:bg-slate-600 shadow-sm text-xs font-bold text-indigo-600 dark:text-indigo-400 transition">Bulan</button>
                    <button
                        class="px-4 py-1.5 rounded-lg text-xs font-bold text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-white transition">Tahun</button>
                </div>

                <button
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-xl transition flex items-center justify-center gap-2">
                    <i class="ph-bold ph-funnel"></i> Filter
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-gradient-to-br from-indigo-500 to-purple-600 p-6 rounded-3xl shadow-lg text-white relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16 group-hover:scale-110 transition duration-500">
                </div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-2 bg-white/20 rounded-xl backdrop-blur-sm">
                            <i class="ph-fill ph-trophy text-2xl text-yellow-300"></i>
                        </div>
                        <span class="bg-white/20 px-2 py-1 rounded text-xs font-bold backdrop-blur-sm">Terlaris</span>
                    </div>
                    <p class="text-indigo-100 text-sm font-medium mb-1">Top Kategori</p>
                    <h3 class="text-3xl font-display font-bold mb-2">Pakaian Pria</h3>
                    <p class="text-xs text-indigo-100 flex items-center gap-1">
                        <i class="ph-bold ph-trend-up"></i>
                        <span>Menyumbang 45% dari total omset</span>
                    </p>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Total Kategori Aktif</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">12</h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-tag text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden">
                    <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 100%"></div>
                </div>
                <p class="text-slate-400 text-xs font-medium">
                    2 Kategori baru ditambahkan bulan ini
                </p>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Stok Menipis</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">3 <span
                                class="text-sm font-normal text-slate-400">Kategori</span></h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-red-50 dark:bg-red-500/20 text-red-600 dark:text-red-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-warning-circle text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden">
                    <div class="bg-red-500 h-1.5 rounded-full" style="width: 30%"></div>
                </div>
                <p class="text-red-500 text-xs font-bold flex items-center gap-1">
                    <span>Aksesoris, Topi, Kaos Kaki</span>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <div
                class="lg:col-span-2 bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Grafik Penjualan per Kategori
                    </h3>
                    <div class="flex items-center gap-2">
                        <span class="flex items-center gap-1 text-xs font-bold text-slate-500">
                            <span class="w-2 h-2 rounded-full bg-indigo-500"></span> Pakaian
                        </span>
                        <span class="flex items-center gap-1 text-xs font-bold text-slate-500">
                            <span class="w-2 h-2 rounded-full bg-orange-400"></span> Sepatu
                        </span>
                    </div>
                </div>

                <div
                    class="h-64 flex items-end justify-between gap-2 px-2 pb-4 border-b border-slate-100 dark:border-slate-700 relative">
                    <div class="absolute inset-0 flex flex-col justify-between pointer-events-none pb-8">
                        <div class="w-full h-px bg-slate-50 dark:bg-slate-700/50"></div>
                        <div class="w-full h-px bg-slate-50 dark:bg-slate-700/50"></div>
                        <div class="w-full h-px bg-slate-50 dark:bg-slate-700/50"></div>
                        <div class="w-full h-px bg-slate-50 dark:bg-slate-700/50"></div>
                    </div>

                    <div class="flex flex-col items-center gap-2 group cursor-pointer w-full z-10">
                        <div class="w-full max-w-[40px] bg-indigo-500 rounded-t-lg hover:opacity-80 transition-all relative group-hover:-translate-y-1"
                            style="height: 85%">
                            <div
                                class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition">
                                Rp 12Jt</div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400">Pria</span>
                    </div>
                    <div class="flex flex-col items-center gap-2 group cursor-pointer w-full z-10">
                        <div class="w-full max-w-[40px] bg-indigo-300 dark:bg-indigo-500/50 rounded-t-lg hover:opacity-80 transition-all relative group-hover:-translate-y-1"
                            style="height: 65%"></div>
                        <span class="text-[10px] font-bold text-slate-400">Wanita</span>
                    </div>
                    <div class="flex flex-col items-center gap-2 group cursor-pointer w-full z-10">
                        <div class="w-full max-w-[40px] bg-orange-400 rounded-t-lg hover:opacity-80 transition-all relative group-hover:-translate-y-1"
                            style="height: 45%"></div>
                        <span class="text-[10px] font-bold text-slate-400">Sepatu</span>
                    </div>
                    <div class="flex flex-col items-center gap-2 group cursor-pointer w-full z-10">
                        <div class="w-full max-w-[40px] bg-indigo-200 dark:bg-indigo-500/30 rounded-t-lg hover:opacity-80 transition-all relative group-hover:-translate-y-1"
                            style="height: 30%"></div>
                        <span class="text-[10px] font-bold text-slate-400">Anak</span>
                    </div>
                    <div class="flex flex-col items-center gap-2 group cursor-pointer w-full z-10">
                        <div class="w-full max-w-[40px] bg-emerald-400 rounded-t-lg hover:opacity-80 transition-all relative group-hover:-translate-y-1"
                            style="height: 55%"></div>
                        <span class="text-[10px] font-bold text-slate-400">Aksesoris</span>
                    </div>
                    <div class="flex flex-col items-center gap-2 group cursor-pointer w-full z-10">
                        <div class="w-full max-w-[40px] bg-slate-300 dark:bg-slate-600 rounded-t-lg hover:opacity-80 transition-all relative group-hover:-translate-y-1"
                            style="height: 20%"></div>
                        <span class="text-[10px] font-bold text-slate-400">Lainnya</span>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6 flex flex-col h-full">
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-4">
                    Tren Pertumbuhan
                </h3>
                <div class="space-y-4 flex-1 overflow-y-auto pr-2 custom-scrollbar">
                    <div
                        class="flex items-center gap-3 p-3 rounded-2xl hover:bg-slate-50 dark:hover:bg-slate-700/50 transition border border-transparent hover:border-slate-100 dark:hover:border-slate-600">
                        <div
                            class="w-10 h-10 rounded-xl bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 flex items-center justify-center">
                            <i class="ph-fill ph-shirt-folded text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-slate-800 dark:text-white text-sm">Pakaian Pria</h4>
                            <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mt-1.5">
                                <div class="bg-indigo-500 h-1.5 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-emerald-500 text-xs font-bold">+12%</p>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-3 p-3 rounded-2xl hover:bg-slate-50 dark:hover:bg-slate-700/50 transition border border-transparent hover:border-slate-100 dark:hover:border-slate-600">
                        <div
                            class="w-10 h-10 rounded-xl bg-orange-100 dark:bg-orange-900/50 text-orange-600 flex items-center justify-center">
                            <i class="ph-fill ph-sneaker text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-slate-800 dark:text-white text-sm">Sepatu</h4>
                            <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mt-1.5">
                                <div class="bg-orange-500 h-1.5 rounded-full" style="width: 45%"></div>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-emerald-500 text-xs font-bold">+8%</p>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-3 p-3 rounded-2xl hover:bg-slate-50 dark:hover:bg-slate-700/50 transition border border-transparent hover:border-slate-100 dark:hover:border-slate-600">
                        <div
                            class="w-10 h-10 rounded-xl bg-pink-100 dark:bg-pink-900/50 text-pink-600 flex items-center justify-center">
                            <i class="ph-fill ph-watch text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-slate-800 dark:text-white text-sm">Aksesoris</h4>
                            <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mt-1.5">
                                <div class="bg-pink-500 h-1.5 rounded-full" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-red-500 text-xs font-bold">-2%</p>
                        </div>
                    </div>
                </div>
                <button
                    class="w-full mt-4 py-2 text-xs font-bold text-slate-500 hover:text-indigo-600 transition border-t border-slate-100 dark:border-slate-700 pt-4">
                    Lihat Semua Tren <i class="ph-bold ph-arrow-right ml-1"></i>
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <div>
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Rincian Per Kategori
                    </h3>
                </div>
                <button
                    class="px-4 py-2 border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 text-xs font-bold rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition flex items-center gap-2">
                    <i class="ph-bold ph-download-simple"></i> Export CSV
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4 font-bold">Nama Kategori</th>
                            <th class="px-6 py-4 font-bold">Item Terjual</th>
                            <th class="px-6 py-4 font-bold">Total Omset</th>
                            <th class="px-6 py-4 font-bold">Sisa Stok</th>
                            <th class="px-6 py-4 font-bold">Persentase</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition cursor-pointer">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 flex items-center justify-center">
                                        <i class="ph-bold ph-shirt-folded"></i>
                                    </div>
                                    <span class="font-bold text-slate-800 dark:text-slate-200">Pakaian Pria</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium">1,240</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp 245.000.000</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-bold">Aman
                                    (850)</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-bold text-slate-600 dark:text-slate-300">45%</span>
                                    <div class="w-20 bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-indigo-500 h-1.5 rounded-full" style="width: 45%"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition cursor-pointer">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-orange-100 dark:bg-orange-900/50 text-orange-600 flex items-center justify-center">
                                        <i class="ph-bold ph-sneaker"></i>
                                    </div>
                                    <span class="font-bold text-slate-800 dark:text-slate-200">Sepatu</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium">856</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp 180.500.000</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-emerald-100 text-emerald-700 rounded text-xs font-bold">Aman
                                    (420)</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-bold text-slate-600 dark:text-slate-300">32%</span>
                                    <div class="w-20 bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-orange-500 h-1.5 rounded-full" style="width: 32%"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition cursor-pointer">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-red-100 dark:bg-red-900/50 text-red-600 flex items-center justify-center">
                                        <i class="ph-bold ph-baseball-cap"></i>
                                    </div>
                                    <span class="font-bold text-slate-800 dark:text-slate-200">Topi</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium">124</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp 12.400.000</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs font-bold">Tipis (12)</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-bold text-slate-600 dark:text-slate-300">5%</span>
                                    <div class="w-20 bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-red-500 h-1.5 rounded-full" style="width: 5%"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-100 dark:border-slate-700 flex justify-center">
                <button class="text-xs font-bold text-indigo-600 hover:underline">Muat Lebih Banyak</button>
            </div>
        </div>

    </section>
@endsection
