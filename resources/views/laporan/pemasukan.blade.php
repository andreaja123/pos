@extends('layouts.admin')
@section('title', 'Laporan Pemasukan - Hanania POS')

@section('content')
    <section id="pemasukan" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Laporan Pemasukan</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm">Analisa aliran dana masuk periode ini</p>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-1.5 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm flex flex-wrap gap-2">
                <div class="flex bg-slate-100 dark:bg-slate-700 rounded-xl p-1">
                    <button
                        class="px-3 py-1.5 text-xs font-bold rounded-lg bg-white dark:bg-slate-600 shadow-sm text-slate-800 dark:text-white transition">
                        Minggu Ini
                    </button>
                    <button
                        class="px-3 py-1.5 text-xs font-bold rounded-lg text-slate-500 dark:text-slate-400 hover:text-slate-800 dark:hover:text-white transition">
                        Bulan Ini
                    </button>
                    <button
                        class="px-3 py-1.5 text-xs font-bold rounded-lg text-slate-500 dark:text-slate-400 hover:text-slate-800 dark:hover:text-white transition">
                        Tahun Ini
                    </button>
                </div>

                <div class="flex items-center gap-2 px-3 py-1.5 border-l border-slate-100 dark:border-slate-700/50">
                    <div class="relative group">
                        <i
                            class="ph-bold ph-calendar-blank absolute left-0 top-1/2 -translate-y-1/2 text-slate-400 group-hover:text-indigo-500 transition"></i>
                        <input type="text" placeholder="Start Date"
                            class="pl-6 w-24 bg-transparent border-none text-xs font-bold text-slate-600 dark:text-slate-300 focus:ring-0 cursor-pointer placeholder-slate-400"
                            value="01 Des 2025">
                    </div>
                    <span class="text-slate-300">-</span>
                    <div class="relative group">
                        <input type="text" placeholder="End Date"
                            class="w-24 bg-transparent border-none text-xs font-bold text-slate-600 dark:text-slate-300 focus:ring-0 cursor-pointer text-right placeholder-slate-400"
                            value="16 Des 2025">
                    </div>
                </div>

                <button
                    class="w-8 h-8 flex items-center justify-center bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 dark:shadow-none">
                    <i class="ph-bold ph-magnifying-glass"></i>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-indigo-600 p-6 rounded-3xl shadow-xl shadow-indigo-200/50 dark:shadow-none relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-6 opacity-10 group-hover:scale-110 transition duration-500">
                    <i class="ph-fill ph-trend-up text-8xl text-white"></i>
                </div>
                <div class="relative z-10">
                    <p class="text-indigo-100 text-sm font-medium mb-1">Total Pemasukan</p>
                    <h3 class="text-3xl font-display font-bold text-white mb-4">Rp 48.250.000</h3>
                    <div class="flex items-center gap-2">
                        <span class="bg-white/20 text-white px-2 py-1 rounded-lg text-xs font-bold backdrop-blur-sm">
                            <i class="ph-bold ph-arrow-up"></i> 12.5%
                        </span>
                        <span class="text-indigo-100 text-xs">vs periode lalu</span>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Rata-rata Harian</p>
                        <h3 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Rp 3.200.000</h3>
                    </div>
                    <div
                        class="w-10 h-10 bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-xl flex items-center justify-center">
                        <i class="ph-fill ph-chart-bar text-xl"></i>
                    </div>
                </div>
                <p class="text-slate-400 text-xs mt-4">
                    <span class="text-emerald-500 font-bold">Stabil</span> dalam 7 hari terakhir
                </p>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Estimasi Laba Bersih</p>
                        <h3 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Rp 15.400.000</h3>
                    </div>
                    <div
                        class="w-10 h-10 bg-blue-50 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded-xl flex items-center justify-center">
                        <i class="ph-fill ph-wallet text-xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-2 overflow-hidden">
                    <div class="bg-blue-500 h-1.5 rounded-full" style="width: 32%"></div>
                </div>
                <p class="text-slate-400 text-xs">Margin keuntungan <span
                        class="text-slate-600 dark:text-slate-200 font-bold">32%</span></p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <div
                class="lg:col-span-2 bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">Grafik Pertumbuhan</h3>
                    <button class="text-slate-400 hover:text-indigo-600 transition">
                        <i class="ph-bold ph-download-simple text-xl"></i>
                    </button>
                </div>
                <div id="revenueChart" class="w-full h-[300px]"></div>
            </div>

            <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6">
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-6">Sumber Pemasukan</h3>
                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 flex items-center justify-center">
                                <i class="ph-fill ph-storefront text-lg"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800 dark:text-white">Penjualan Toko</p>
                                <p class="text-xs text-slate-500">Offline / POS</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-bold text-slate-800 dark:text-white">Rp 28.5jt</p>
                            <p class="text-xs text-emerald-500 font-bold">60%</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-xl bg-pink-50 dark:bg-pink-500/20 text-pink-600 dark:text-pink-400 flex items-center justify-center">
                                <i class="ph-fill ph-globe text-lg"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800 dark:text-white">Marketplace</p>
                                <p class="text-xs text-slate-500">Shopee/Tokopedia</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-bold text-slate-800 dark:text-white">Rp 15.2jt</p>
                            <p class="text-xs text-emerald-500 font-bold">30%</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-xl bg-orange-50 dark:bg-orange-500/20 text-orange-600 dark:text-orange-400 flex items-center justify-center">
                                <i class="ph-fill ph-hand-coins text-lg"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800 dark:text-white">Lainnya</p>
                                <p class="text-xs text-slate-500">Jasa/Service</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-bold text-slate-800 dark:text-white">Rp 4.5jt</p>
                            <p class="text-xs text-slate-400 font-bold">10%</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8 pt-6 border-t border-slate-100 dark:border-slate-700">
                    <button
                        class="w-full py-3 rounded-xl bg-slate-50 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-100 dark:hover:bg-slate-600 transition">
                        Download Laporan PDF
                    </button>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between md:items-center gap-4">
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                    Rincian Transaksi Masuk
                </h3>
                <div class="flex gap-2">
                    <input type="text" placeholder="Cari ref/nama..."
                        class="px-4 py-2 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white">
                    <button
                        class="px-4 py-2 bg-white dark:bg-slate-600 border border-slate-200 dark:border-slate-500 text-slate-600 dark:text-slate-200 rounded-xl text-sm font-bold hover:bg-slate-50 transition">
                        Filter
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 font-bold">Referensi</th>
                            <th class="px-6 py-4 font-bold">Keterangan</th>
                            <th class="px-6 py-4 font-bold">Metode</th>
                            <th class="px-6 py-4 font-bold text-right">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">16 Des 2025, 14:30</td>
                            <td class="px-6 py-4 font-mono text-xs">#INV-2025-001</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Penjualan Paket Bundling</td>
                            <td class="px-6 py-4"><span
                                    class="px-2 py-1 rounded bg-slate-100 dark:bg-slate-700 text-xs font-bold text-slate-500">QRIS</span>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-emerald-600 dark:text-emerald-400">+ Rp 450.000
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">16 Des 2025, 13:15</td>
                            <td class="px-6 py-4 font-mono text-xs">#INV-2025-002</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Kemeja Linen (2pcs)</td>
                            <td class="px-6 py-4"><span
                                    class="px-2 py-1 rounded bg-slate-100 dark:bg-slate-700 text-xs font-bold text-slate-500">Tunai</span>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-emerald-600 dark:text-emerald-400">+ Rp 300.000
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">16 Des 2025, 10:00</td>
                            <td class="px-6 py-4 font-mono text-xs">#SRV-2025-88</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Jasa Bungkus Kado</td>
                            <td class="px-6 py-4"><span
                                    class="px-2 py-1 rounded bg-slate-100 dark:bg-slate-700 text-xs font-bold text-slate-500">Tunai</span>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-emerald-600 dark:text-emerald-400">+ Rp 25.000
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-100 dark:border-slate-700 flex justify-center">
                <button class="text-sm text-indigo-600 dark:text-indigo-400 font-bold hover:underline">Muat Lebih
                    Banyak</button>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                series: [{
                    name: 'Pemasukan',
                    data: [3100000, 4000000, 2800000, 5100000, 4200000, 6900000,
                        8500000] // Data dummy per hari
                }],
                chart: {
                    type: 'area',
                    height: 300,
                    fontFamily: 'inherit',
                    toolbar: {
                        show: false
                    },
                    animations: {
                        enabled: true
                    }
                },
                colors: ['#6366f1'], // Indigo-500
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.4,
                        opacityTo: 0.05,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                xaxis: {
                    categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: '#94a3b8',
                            fontSize: '12px'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#94a3b8'
                        },
                        formatter: function(value) {
                            return "Rp " + (value / 1000000).toFixed(1) + "Jt";
                        }
                    }
                },
                grid: {
                    borderColor: '#f1f5f9', // slate-100
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }
                },
                tooltip: {
                    theme: 'light',
                    y: {
                        formatter: function(val) {
                            return "Rp " + val.toLocaleString('id-ID');
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#revenueChart"), options);
            chart.render();
        });
    </script>
@endsection
