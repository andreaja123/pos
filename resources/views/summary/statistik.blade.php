@extends('layouts.admin')

@section('title', 'Statistik - Hanania POS')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <section id="statistics" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Laporan Statistik
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                    Analisis performa bisnis dalam 12 bulan terakhir.
                </p>
            </div>
            <div class="flex gap-3">
                <button
                    class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-xl text-slate-600 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition shadow-sm">
                    <i class="ph-bold ph-calendar-blank text-lg"></i>
                    <span>Tahun Ini</span>
                </button>
                <button
                    class="flex items-center gap-2 px-4 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 dark:shadow-none">
                    <i class="ph-bold ph-download-simple text-lg"></i>
                    <span>Export PDF</span>
                </button>
            </div>
        </div>

        <div
            class="w-full bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none mb-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Arus Kas & Penjualan
                    </h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Perbandingan Pemasukan, Pengeluaran, dan Penjualan Bersih (12 Bulan)
                    </p>
                </div>
                <div class="hidden sm:flex gap-4">
                    <div class="flex items-center gap-2 text-xs font-bold text-slate-600 dark:text-slate-400">
                        <span class="w-3 h-3 rounded-full bg-emerald-500"></span> Pemasukan
                    </div>
                    <div class="flex items-center gap-2 text-xs font-bold text-slate-600 dark:text-slate-400">
                        <span class="w-3 h-3 rounded-full bg-red-500"></span> Pengeluaran
                    </div>
                    <div class="flex items-center gap-2 text-xs font-bold text-slate-600 dark:text-slate-400">
                        <span class="w-3 h-3 rounded-full bg-indigo-500"></span> Penjualan
                    </div>
                </div>
            </div>
            <div id="financeChart" class="w-full h-[350px]"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                            Tren Faktur
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Total transaksi berhasil</p>
                    </div>
                    <div class="p-2 bg-orange-50 dark:bg-orange-500/20 text-orange-600 rounded-xl">
                        <i class="ph-fill ph-receipt text-xl"></i>
                    </div>
                </div>
                <div id="invoiceChart" class="w-full h-[250px]"></div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                            Produk Terjual
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Volume item keluar gudang</p>
                    </div>
                    <div class="p-2 bg-blue-50 dark:bg-blue-500/20 text-blue-600 rounded-xl">
                        <i class="ph-fill ph-package text-xl"></i>
                    </div>
                </div>
                <div id="productsChart" class="w-full h-[250px]"></div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Rincian Statistik Bulanan
                    </h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Data lengkap sepanjang masa
                    </p>
                </div>
                <div class="relative">
                    <i class="ph-bold ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" placeholder="Cari bulan..."
                        class="pl-10 pr-4 py-2 bg-slate-50 dark:bg-slate-700 border-none rounded-xl text-sm font-medium text-slate-600 dark:text-slate-200 focus:ring-2 focus:ring-indigo-500 w-full sm:w-64">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold">Bulan</th>
                            <th class="px-6 py-4 font-bold text-emerald-600 dark:text-emerald-400">Pemasukan</th>
                            <th class="px-6 py-4 font-bold text-red-500 dark:text-red-400">Pengeluaran</th>
                            <th class="px-6 py-4 font-bold text-indigo-600 dark:text-indigo-400">Penjualan (Net)</th>
                            <th class="px-6 py-4 font-bold text-center">Faktur</th>
                            <th class="px-6 py-4 font-bold text-center">Produk Terjual</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                Desember 2024
                            </td>
                            <td class="px-6 py-4 font-mono text-emerald-600 font-bold">Rp 45.200.000</td>
                            <td class="px-6 py-4 font-mono text-red-500 font-medium">Rp 12.500.000</td>
                            <td class="px-6 py-4 font-mono text-slate-700 dark:text-slate-300 font-bold">Rp 32.700.000</td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="bg-slate-100 dark:bg-slate-700 px-2 py-1 rounded-lg text-xs font-bold">142</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 px-2 py-1 rounded-lg text-xs font-bold">389</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                November 2024
                            </td>
                            <td class="px-6 py-4 font-mono text-emerald-600 font-bold">Rp 38.100.000</td>
                            <td class="px-6 py-4 font-mono text-red-500 font-medium">Rp 10.200.000</td>
                            <td class="px-6 py-4 font-mono text-slate-700 dark:text-slate-300 font-bold">Rp 27.900.000</td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="bg-slate-100 dark:bg-slate-700 px-2 py-1 rounded-lg text-xs font-bold">120</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 px-2 py-1 rounded-lg text-xs font-bold">310</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                Oktober 2024
                            </td>
                            <td class="px-6 py-4 font-mono text-emerald-600 font-bold">Rp 41.500.000</td>
                            <td class="px-6 py-4 font-mono text-red-500 font-medium">Rp 15.000.000</td>
                            <td class="px-6 py-4 font-mono text-slate-700 dark:text-slate-300 font-bold">Rp 26.500.000</td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="bg-slate-100 dark:bg-slate-700 px-2 py-1 rounded-lg text-xs font-bold">135</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 px-2 py-1 rounded-lg text-xs font-bold">345</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-100 dark:border-slate-700 flex justify-center">
                <button class="text-sm font-bold text-indigo-600 hover:underline">Lihat Lebih Banyak</button>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Shared Options for styling consistency
            const commonOptions = {
                chart: {
                    fontFamily: 'Plus Jakarta Sans, sans-serif',
                    toolbar: {
                        show: false
                    }
                },
                grid: {
                    borderColor: '#f1f5f9',
                    strokeDashArray: 4
                }, // matches slate-200
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    theme: 'dark'
                }
            };

            // 1. Grafik Keuangan (Mixed Chart: Bar & Line)
            var optionsFinance = {
                ...commonOptions,
                series: [{
                    name: 'Pemasukan',
                    type: 'column',
                    data: [45, 52, 38, 24, 33, 26, 21, 20, 36, 41, 38, 45] // Data dalam Juta
                }, {
                    name: 'Pengeluaran',
                    type: 'column',
                    data: [12, 15, 10, 8, 12, 10, 9, 8, 12, 15, 10, 12]
                }, {
                    name: 'Penjualan Bersih',
                    type: 'line',
                    data: [33, 37, 28, 16, 21, 16, 12, 12, 24, 26, 28, 33]
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    stacked: false,
                    parentHeightOffset: 0
                },
                stroke: {
                    width: [0, 0, 4],
                    curve: 'smooth'
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                        borderRadius: 4
                    }
                },
                fill: {
                    opacity: [0.85, 0.85, 1],
                    gradient: {
                        inverseColors: false,
                        shade: 'light',
                        type: "vertical",
                        opacityFrom: 0.85,
                        opacityTo: 0.55,
                        stops: [0, 100, 100, 100]
                    }
                },
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                colors: ['#10b981', '#ef4444', '#6366f1'], // Emerald, Red, Indigo
                yaxis: {
                    title: {
                        text: 'Juta Rupiah'
                    }
                },
                legend: {
                    show: false
                } // Kita sudah buat custom legend di HTML
            };
            new ApexCharts(document.querySelector("#financeChart"), optionsFinance).render();

            // 2. Grafik Trend Faktur (Area Chart)
            var optionsInvoice = {
                ...commonOptions,
                series: [{
                    name: 'Total Faktur',
                    data: [120, 132, 101, 134, 90, 150, 140, 120, 132, 101, 134, 142]
                }],
                chart: {
                    type: 'area',
                    height: 250,
                    sparkline: {
                        enabled: false
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        opacityTo: 0.3
                    }
                },
                colors: ['#f97316'], // Orange
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov',
                        'Des'
                    ],
                    labels: {
                        show: false
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                yaxis: {
                    show: false
                },
                grid: {
                    show: false
                }
            };
            new ApexCharts(document.querySelector("#invoiceChart"), optionsInvoice).render();

            // 3. Grafik Produk Terjual (Bar Chart)
            var optionsProduct = {
                ...commonOptions,
                series: [{
                    name: 'Produk Terjual',
                    data: [310, 400, 250, 380, 200, 450, 410, 310, 400, 250, 310, 389]
                }],
                chart: {
                    type: 'bar',
                    height: 250
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal: false,
                        columnWidth: '60%'
                    }
                },
                colors: ['#3b82f6'], // Blue
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov',
                        'Des'
                    ],
                    labels: {
                        style: {
                            fontSize: '10px'
                        }
                    }
                },
            };
            new ApexCharts(document.querySelector("#productsChart"), optionsProduct).render();
        });
    </script>
@endsection
