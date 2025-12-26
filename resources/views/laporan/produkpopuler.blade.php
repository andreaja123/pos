@extends('layouts.admin')
@section('title', 'Produk Populer - Hanania POS')

@section('content')
    <section id="produk-populer" class="page-section active max-w-7xl mx-auto">

        <div class="mb-8 flex flex-col md:flex-row gap-6 md:items-end justify-between">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white mb-1">
                    Analisa Produk Populer
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm">
                    Laporan performa penjualan produk berdasarkan periode waktu.
                </p>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-2 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm flex flex-wrap gap-2">
                <div class="flex items-center gap-2 px-2">
                    <div class="relative group">
                        <i class="ph-bold ph-calendar-blank absolute left-3 top-2.5 text-slate-400"></i>
                        <input type="date"
                            class="pl-9 pr-3 py-2 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-bold text-slate-600 dark:text-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition w-36">
                    </div>
                    <span class="text-slate-400 text-sm font-bold">-</span>
                    <div class="relative group">
                        <i class="ph-bold ph-calendar-blank absolute left-3 top-2.5 text-slate-400"></i>
                        <input type="date"
                            class="pl-9 pr-3 py-2 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-bold text-slate-600 dark:text-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition w-36">
                    </div>
                </div>

                <div class="w-px h-8 bg-slate-100 dark:bg-slate-700 mx-1 hidden md:block"></div>

                <div class="flex gap-1">
                    <button
                        class="px-4 py-2 text-sm font-bold rounded-xl text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        Minggu Ini
                    </button>
                    <button
                        class="px-4 py-2 text-sm font-bold rounded-xl bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 border border-indigo-100 dark:border-indigo-500/30 transition">
                        Bulan Ini
                    </button>
                    <button
                        class="px-4 py-2 text-sm font-bold rounded-xl text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        Tahun Ini
                    </button>
                </div>

                <button
                    class="ml-2 px-4 py-2 bg-indigo-600 text-white text-sm font-bold rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-200/50 dark:shadow-none transition flex items-center gap-2">
                    <i class="ph-bold ph-funnel"></i> Filter
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

            <div
                class="lg:col-span-2 bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                            Grafik Penjualan
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            Top 5 Kategori Produk Terlaris
                        </p>
                    </div>
                    <button class="text-slate-400 hover:text-indigo-500 transition">
                        <i class="ph-bold ph-download-simple text-xl"></i>
                    </button>
                </div>

                <div id="popularChart" class="w-full h-[320px]"></div>
            </div>

            <div class="flex flex-col gap-6">
                <div
                    class="flex-1 bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-3xl p-6 text-white shadow-xl shadow-indigo-200/50 dark:shadow-none relative overflow-hidden group">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <i
                            class="ph-fill ph-trophy text-9xl transform rotate-12 group-hover:scale-110 transition duration-500"></i>
                    </div>
                    <div class="relative z-10">
                        <span
                            class="bg-white/20 backdrop-blur-md px-3 py-1 rounded-lg text-xs font-bold border border-white/10 mb-4 inline-block">
                            👑 Paling Populer #1
                        </span>
                        <h4 class="text-2xl font-display font-bold mb-1">Kemeja Linen Putih</h4>
                        <p class="text-indigo-100 text-sm mb-6">Kategori: Pakaian Pria</p>

                        <div class="flex items-end gap-2">
                            <h3 class="text-4xl font-bold">1,240</h3>
                            <span class="text-indigo-200 font-medium mb-1">pcs terjual</span>
                        </div>
                        <div class="mt-4 pt-4 border-t border-white/10 flex justify-between items-center">
                            <span class="text-sm font-medium text-indigo-100">Total Pendapatan</span>
                            <span class="font-bold">Rp 186.000.000</span>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Total Produk Terjual</p>
                        <h3 class="text-2xl font-bold text-slate-800 dark:text-white">4,892 <span
                                class="text-sm text-slate-400 font-normal">items</span></h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-trend-up text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                    Detail Performa Produk
                </h3>
                <div class="flex gap-2">
                    <input type="text" placeholder="Cari nama produk..."
                        class="px-4 py-2 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <button
                        class="px-4 py-2 bg-slate-50 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-sm font-bold rounded-xl hover:bg-slate-100 dark:hover:bg-slate-600 transition">
                        <i class="ph-bold ph-export"></i> Export
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold">Peringkat</th>
                            <th class="px-6 py-4 font-bold">Nama Produk</th>
                            <th class="px-6 py-4 font-bold">Harga Satuan</th>
                            <th class="px-6 py-4 font-bold">Terjual</th>
                            <th class="px-6 py-4 font-bold">Total Pendapatan</th>
                            <th class="px-6 py-4 font-bold">Tren</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xs">
                                    #1</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?auto=format&fit=crop&q=80&w=100"
                                        class="w-10 h-10 rounded-lg object-cover bg-slate-100" />
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-white">Kemeja Linen Putih</p>
                                        <p class="text-xs text-slate-500">SKU: KLP-001</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-600 dark:text-slate-300">Rp 150.000</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">1,240</td>
                            <td class="px-6 py-4 font-bold text-indigo-600 dark:text-indigo-400">Rp 186.000.000</td>
                            <td class="px-6 py-4">
                                <span class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                                    <i class="ph-bold ph-trend-up"></i> +12%
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-slate-400 hover:text-indigo-500"><i
                                        class="ph-bold ph-eye text-lg"></i></button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 flex items-center justify-center font-bold text-xs">
                                    #2</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&q=80&w=100"
                                        class="w-10 h-10 rounded-lg object-cover bg-slate-100" />
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-white">Nike Air Max</p>
                                        <p class="text-xs text-slate-500">SKU: NAM-99</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-600 dark:text-slate-300">Rp 2.450.000</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">850</td>
                            <td class="px-6 py-4 font-bold text-indigo-600 dark:text-indigo-400">Rp 2.082.500.000</td>
                            <td class="px-6 py-4">
                                <span class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                                    <i class="ph-bold ph-trend-up"></i> +5.4%
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-slate-400 hover:text-indigo-500"><i
                                        class="ph-bold ph-eye text-lg"></i></button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 flex items-center justify-center font-bold text-xs">
                                    #3</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1576871337622-98d48d1cf531?auto=format&fit=crop&q=80&w=100"
                                        class="w-10 h-10 rounded-lg object-cover bg-slate-100" />
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-white">Jaket Denim Vtg</p>
                                        <p class="text-xs text-slate-500">SKU: JDV-221</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-600 dark:text-slate-300">Rp 450.000</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">543</td>
                            <td class="px-6 py-4 font-bold text-indigo-600 dark:text-indigo-400">Rp 244.350.000</td>
                            <td class="px-6 py-4">
                                <span class="text-red-500 text-xs font-bold flex items-center gap-1">
                                    <i class="ph-bold ph-trend-down"></i> -2.1%
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-slate-400 hover:text-indigo-500"><i
                                        class="ph-bold ph-eye text-lg"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-100 dark:border-slate-700 flex justify-end gap-2">
                <button
                    class="px-3 py-1 text-sm rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700">Prev</button>
                <button class="px-3 py-1 text-sm rounded-lg bg-indigo-600 text-white">1</button>
                <button
                    class="px-3 py-1 text-sm rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700">2</button>
                <button
                    class="px-3 py-1 text-sm rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700">Next</button>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chart Options
            var options = {
                series: [{
                    name: 'Penjualan',
                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                }, {
                    name: 'Pendapatan (Juta)',
                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
                }],
                chart: {
                    type: 'bar',
                    height: 320,
                    fontFamily: 'inherit',
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        borderRadius: 8,
                        borderRadiusApplication: 'end',
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                },
                yaxis: {
                    show: false
                },
                fill: {
                    opacity: 1
                },
                colors: ['#6366f1', '#a5b4fc'], // Indigo-500 & Indigo-300
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val
                        }
                    }
                },
                grid: {
                    borderColor: '#f1f5f9',
                    strokeDashArray: 4,
                },
                theme: {
                    mode: 'light' // Change to 'dark' via JS logic if needed based on html class
                }
            };

            var chart = new ApexCharts(document.querySelector("#popularChart"), options);
            chart.render();
        });
    </script>
@endpush
