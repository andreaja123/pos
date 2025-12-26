@extends('layouts.admin')

@section('title', 'Summary Produk - Hanania POS')

@section('content')
    <section id="summary-produk" class="page-section active max-w-7xl mx-auto pb-10">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Summary Produk</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400">Ringkasan performa penjualan dan inventaris produk</p>
            </div>
            <div class="flex gap-3">
                <button
                    class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 transition shadow-sm">
                    <i class="ph-bold ph-download-simple"></i>
                    Export PDF
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-indigo-600 rounded-3xl p-6 shadow-xl shadow-indigo-200/50 dark:shadow-none text-white relative overflow-hidden group">
                <div
                    class="absolute right-0 top-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -mr-10 -mt-10 group-hover:bg-white/20 transition duration-500">
                </div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-6">
                        <div class="p-3 bg-white/20 rounded-2xl backdrop-blur-sm">
                            <i class="ph-fill ph-chart-line-up text-2xl text-white"></i>
                        </div>
                        <span
                            class="px-2.5 py-1 bg-emerald-400/20 text-emerald-100 border border-emerald-400/30 rounded-lg text-xs font-bold flex items-center gap-1">
                            <i class="ph-bold ph-trend-up"></i> +24% YoY
                        </span>
                    </div>
                    <p class="text-indigo-100 text-sm font-bold mb-1">Grand Total Penjualan</p>
                    <h3 class="text-3xl font-display font-bold">Rp 1.245.000.000</h3>
                    <p class="text-xs text-indigo-200 mt-2 font-medium">Akumulasi seluruh waktu</p>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Total SKU Produk</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">1,842</h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-blue-50 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-package text-2xl"></i>
                    </div>
                </div>
                <div class="flex gap-4 mt-4">
                    <div class="flex-1 p-3 bg-slate-50 dark:bg-slate-700/50 rounded-xl">
                        <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold mb-1">Aktif</p>
                        <p class="text-lg font-bold text-slate-700 dark:text-slate-200">1,620</p>
                    </div>
                    <div class="flex-1 p-3 bg-slate-50 dark:bg-slate-700/50 rounded-xl">
                        <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold mb-1">Arsip</p>
                        <p class="text-lg font-bold text-slate-700 dark:text-slate-200">222</p>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Produk Masuk (Bulan Ini)</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">156 <span
                                class="text-sm text-slate-400 font-normal ml-1">Items</span></h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-calendar-plus text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden">
                    <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 82%"></div>
                </div>
                <p class="text-slate-500 text-xs font-medium">
                    Target bulan ini: <span class="font-bold text-slate-700 dark:text-slate-300">190 Items</span>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

            <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div
                        class="w-10 h-10 rounded-xl bg-orange-50 dark:bg-orange-500/10 text-orange-600 flex items-center justify-center">
                        <i class="ph-bold ph-faders text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">Kalkulasi Custom</h3>
                        <p class="text-xs text-slate-500">Filter penjualan produk spesifik</p>
                    </div>
                </div>

                <form action="#" class="space-y-4">
                    <div>
                        <label
                            class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 uppercase tracking-wide">Kelompokan
                            Berdasarkan</label>
                        <div class="grid grid-cols-2 gap-2 p-1 bg-slate-100 dark:bg-slate-800 rounded-xl">
                            <button type="button"
                                class="py-2 px-4 rounded-lg bg-white dark:bg-slate-700 shadow-sm text-slate-800 dark:text-white text-sm font-bold border border-slate-200 dark:border-slate-600">Kategori</button>
                            <button type="button"
                                class="py-2 px-4 rounded-lg text-slate-500 dark:text-slate-400 text-sm font-bold hover:text-slate-700">Lokasi</button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Pilih
                            Kategori/Lokasi</label>
                        <select
                            class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border-none text-slate-700 dark:text-slate-200 font-bold focus:ring-2 focus:ring-indigo-500">
                            <option value="">Semua Kategori</option>
                            <option value="pakaian_anak">Pakaian Anak</option>
                            <option value="sepatu">Sepatu</option>
                            <option value="aksesoris">Aksesoris</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Rentang Waktu</label>
                        <select
                            class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border-none text-slate-700 dark:text-slate-200 font-bold focus:ring-2 focus:ring-indigo-500">
                            <option value="this_month">Bulan Ini</option>
                            <option value="last_month">Bulan Lalu</option>
                            <option value="this_year">Tahun Ini</option>
                        </select>
                    </div>

                    <button
                        class="w-full py-3 mt-2 bg-slate-800 dark:bg-white text-white dark:text-slate-900 rounded-xl font-bold hover:bg-slate-900 dark:hover:bg-slate-200 transition">
                        Hitung Analisa
                    </button>
                </form>
            </div>

            <div
                class="lg:col-span-2 bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Hasil Analisa: <span class="text-indigo-600">Per Kategori</span>
                    </h3>
                    <span class="text-sm font-bold text-slate-400">Desember 2025</span>
                </div>

                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-bold text-slate-700 dark:text-slate-200 flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-purple-500"></span> Pakaian Anak
                            </span>
                            <span class="text-sm font-bold text-slate-800 dark:text-white">Rp 85.400.000</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-700 h-2.5 rounded-full overflow-hidden">
                            <div class="bg-purple-500 h-2.5 rounded-full" style="width: 70%"></div>
                        </div>
                        <div class="flex justify-end mt-1">
                            <p class="text-xs text-slate-400 font-medium">450 Item terjual</p>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-bold text-slate-700 dark:text-slate-200 flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-pink-500"></span> Aksesoris
                            </span>
                            <span class="text-sm font-bold text-slate-800 dark:text-white">Rp 24.100.000</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-700 h-2.5 rounded-full overflow-hidden">
                            <div class="bg-pink-500 h-2.5 rounded-full" style="width: 25%"></div>
                        </div>
                        <div class="flex justify-end mt-1">
                            <p class="text-xs text-slate-400 font-medium">120 Item terjual</p>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-bold text-slate-700 dark:text-slate-200 flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-orange-500"></span> Sepatu & Sandal
                            </span>
                            <span class="text-sm font-bold text-slate-800 dark:text-white">Rp 12.500.000</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-700 h-2.5 rounded-full overflow-hidden">
                            <div class="bg-orange-500 h-2.5 rounded-full" style="width: 15%"></div>
                        </div>
                        <div class="flex justify-end mt-1">
                            <p class="text-xs text-slate-400 font-medium">45 Item terjual</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100 dark:border-slate-700 grid grid-cols-2 gap-4">
                    <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800">
                        <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Top Performing</p>
                        <p class="font-bold text-indigo-600 dark:text-indigo-400">Pakaian Anak</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 dark:bg-slate-800">
                        <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Total Kalkulasi</p>
                        <p class="font-bold text-slate-800 dark:text-white">Rp 122.000.000</p>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Inventory & Performa Produk
                    </h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Detail stok dan total penjualan per item
                    </p>
                </div>
                <div class="flex gap-2">
                    <div class="relative">
                        <i class="ph-bold ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="text" placeholder="Cari produk..."
                            class="pl-10 pr-4 py-2 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white w-64">
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold">Produk</th>
                            <th class="px-6 py-4 font-bold">Kategori</th>
                            <th class="px-6 py-4 font-bold">Harga</th>
                            <th class="px-6 py-4 font-bold">Stok</th>
                            <th class="px-6 py-4 font-bold">Total Terjual</th>
                            <th class="px-6 py-4 font-bold text-right">Revenue</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?auto=format&fit=crop&q=80&w=100"
                                        class="w-10 h-10 rounded-lg object-cover bg-slate-100">
                                    <span class="font-bold text-slate-800 dark:text-slate-200">Kemeja Linen Putih</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">Pakaian Pria</td>
                            <td class="px-6 py-4">Rp 125.000</td>
                            <td class="px-6 py-4">
                                <span class="text-emerald-600 font-bold bg-emerald-100 px-2 py-1 rounded-md text-xs">45 in
                                    stock</span>
                            </td>
                            <td class="px-6 py-4 font-bold">124</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white text-right">Rp 15.500.000</td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&q=80&w=100"
                                        class="w-10 h-10 rounded-lg object-cover bg-slate-100">
                                    <span class="font-bold text-slate-800 dark:text-slate-200">Nike Air Max</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">Sepatu</td>
                            <td class="px-6 py-4">Rp 1.450.000</td>
                            <td class="px-6 py-4">
                                <span class="text-amber-600 font-bold bg-amber-100 px-2 py-1 rounded-md text-xs">8
                                    left</span>
                            </td>
                            <td class="px-6 py-4 font-bold">98</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white text-right">Rp 142.100.000</td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1576871337622-98d48d1cf531?auto=format&fit=crop&q=80&w=100"
                                        class="w-10 h-10 rounded-lg object-cover bg-slate-100">
                                    <span class="font-bold text-slate-800 dark:text-slate-200">Topi Bucket Hat</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">Aksesoris</td>
                            <td class="px-6 py-4">Rp 45.000</td>
                            <td class="px-6 py-4">
                                <span class="text-red-600 font-bold bg-red-100 px-2 py-1 rounded-md text-xs">Out of
                                    Stock</span>
                            </td>
                            <td class="px-6 py-4 font-bold">210</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white text-right">Rp 9.450.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-6 border-t border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <span class="text-xs font-bold text-slate-500">Menampilkan 1-3 dari 1,842 produk</span>
                <div class="flex gap-2">
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 hover:bg-slate-50 text-slate-500"><i
                            class="ph-bold ph-caret-left"></i></button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-indigo-600 text-white font-bold text-xs">1</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 hover:bg-slate-50 text-slate-500 text-xs font-bold">2</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 hover:bg-slate-50 text-slate-500"><i
                            class="ph-bold ph-caret-right"></i></button>
                </div>
            </div>
        </div>
    </section>
@endsection
