@extends('layouts.admin')
@section('title', 'Laporan Keuntungan - Hanania POS')

@section('content')
    <section id="profit-report" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Laporan Keuntungan
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Pantau margin keuntungan bersih bisnis Anda
                </p>
            </div>

            <div
                class="w-full md:w-auto flex flex-col sm:flex-row gap-3 bg-white dark:bg-darkCard p-2 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm">
                <div class="flex bg-slate-100 dark:bg-slate-700 rounded-xl p-1">
                    <button
                        class="px-3 py-1.5 text-xs font-bold rounded-lg bg-white dark:bg-slate-600 text-slate-800 dark:text-white shadow-sm transition">
                        Minggu Ini
                    </button>
                    <button
                        class="px-3 py-1.5 text-xs font-bold rounded-lg text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 transition">
                        Bulan Ini
                    </button>
                    <button
                        class="px-3 py-1.5 text-xs font-bold rounded-lg text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 transition">
                        Tahun Ini
                    </button>
                </div>

                <div class="flex items-center gap-2 border-l border-slate-100 dark:border-slate-700 pl-0 sm:pl-3">
                    <input type="date"
                        class="bg-transparent border-none text-xs font-bold text-slate-600 dark:text-slate-300 focus:ring-0 p-0"
                        placeholder="Start Date">
                    <span class="text-slate-300">-</span>
                    <input type="date"
                        class="bg-transparent border-none text-xs font-bold text-slate-600 dark:text-slate-300 focus:ring-0 p-0"
                        placeholder="End Date">
                    <button
                        class="w-8 h-8 flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg transition ml-2">
                        <i class="ph-bold ph-magnifying-glass"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Total Omset</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">Rp 85.2 Jt</h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-blue-50 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-money text-2xl"></i>
                    </div>
                </div>
                <p class="text-slate-400 text-xs font-medium">Pendapatan kotor sebelum HPP</p>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Total Pengeluaran (HPP)</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">Rp 52.8 Jt</h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-rose-50 dark:bg-rose-500/20 text-rose-600 dark:text-rose-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-trend-down text-2xl"></i>
                    </div>
                </div>
                <p class="text-slate-400 text-xs font-medium">Modal barang & operasional</p>
            </div>

            <div
                class="bg-gradient-to-br from-emerald-500 to-teal-600 p-6 rounded-3xl shadow-lg shadow-emerald-200/50 dark:shadow-none text-white relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:scale-110 transition duration-500">
                    <i class="ph-fill ph-coins text-9xl"></i>
                </div>
                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-emerald-100 text-sm font-bold mb-1">Keuntungan Bersih</p>
                            <h3 class="text-3xl font-display font-bold text-white">Rp 32.4 Jt</h3>
                        </div>
                        <div
                            class="w-12 h-12 bg-white/20 text-white rounded-2xl flex items-center justify-center backdrop-blur-sm">
                            <i class="ph-fill ph-wallet text-2xl"></i>
                        </div>
                    </div>
                    <div class="inline-flex items-center gap-1 bg-white/20 px-2 py-1 rounded-lg backdrop-blur-md">
                        <i class="ph-bold ph-arrow-up-right text-white text-xs"></i>
                        <span class="text-xs font-bold text-white">+24% Margin</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <div
                class="lg:col-span-2 bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Analisis Grafik Keuntungan
                    </h3>
                    <button class="text-slate-400 hover:text-indigo-500 transition">
                        <i class="ph-bold ph-download-simple text-xl"></i>
                    </button>
                </div>

                <div
                    class="relative w-full h-80 bg-slate-50 dark:bg-slate-700/30 rounded-2xl flex items-center justify-center border border-dashed border-slate-200 dark:border-slate-600">
                    <div id="profitChart" class="w-full h-full"></div>

                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center text-slate-400 pointer-events-none opacity-50">
                        <i class="ph-duotone ph-chart-line-up text-4xl mb-2"></i>
                        <span class="text-xs">Area Grafik (Chart.js / ApexChart)</span>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6">
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-6">
                    Sumber Keuntungan
                </h3>
                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-bold text-slate-600 dark:text-slate-300">Penjualan Retail</span>
                            <span class="text-sm font-bold text-emerald-500">Rp 18.5 Jt</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-700 h-2 rounded-full overflow-hidden">
                            <div class="bg-emerald-500 h-2 rounded-full" style="width: 65%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-bold text-slate-600 dark:text-slate-300">Pesanan Grosir</span>
                            <span class="text-sm font-bold text-blue-500">Rp 10.2 Jt</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-700 h-2 rounded-full overflow-hidden">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: 40%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-bold text-slate-600 dark:text-slate-300">Marketplace</span>
                            <span class="text-sm font-bold text-orange-500">Rp 3.7 Jt</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-700 h-2 rounded-full overflow-hidden">
                            <div class="bg-orange-500 h-2 rounded-full" style="width: 25%"></div>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-slate-100 dark:border-slate-700">
                        <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-700/50">
                            <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Target Bulan Ini</p>
                            <div class="flex items-end gap-2">
                                <span class="text-xl font-bold text-slate-800 dark:text-white">82%</span>
                                <span class="text-xs font-medium text-emerald-500 mb-1">Tercapai</span>
                            </div>
                        </div>
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
                        Rincian Harian
                    </h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Detail pendapatan dan keuntungan per tanggal
                    </p>
                </div>
                <button
                    class="px-4 py-2 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 text-sm font-bold rounded-xl hover:bg-indigo-100 dark:hover:bg-indigo-500/20 transition flex items-center gap-2">
                    <i class="ph-bold ph-file-csv"></i> Export CSV
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 font-bold">Total Transaksi</th>
                            <th class="px-6 py-4 font-bold">Omset</th>
                            <th class="px-6 py-4 font-bold">HPP</th>
                            <th class="px-6 py-4 font-bold text-right text-emerald-600 dark:text-emerald-400">Profit Bersih
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                16 Des 2025
                            </td>
                            <td class="px-6 py-4">
                                42 Transaksi
                            </td>
                            <td class="px-6 py-4 font-mono">
                                Rp 4.500.000
                            </td>
                            <td class="px-6 py-4 font-mono text-rose-500">
                                - Rp 2.800.000
                            </td>
                            <td class="px-6 py-4 font-mono font-bold text-right text-emerald-600 dark:text-emerald-400">
                                + Rp 1.700.000
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                15 Des 2025
                            </td>
                            <td class="px-6 py-4">
                                38 Transaksi
                            </td>
                            <td class="px-6 py-4 font-mono">
                                Rp 3.200.000
                            </td>
                            <td class="px-6 py-4 font-mono text-rose-500">
                                - Rp 2.100.000
                            </td>
                            <td class="px-6 py-4 font-mono font-bold text-right text-emerald-600 dark:text-emerald-400">
                                + Rp 1.100.000
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class="bg-slate-50 dark:bg-slate-700/30">
                        <tr>
                            <td colspan="4" class="px-6 py-4 font-bold text-slate-500 dark:text-slate-400 text-right">
                                Total Profit Bersih</td>
                            <td
                                class="px-6 py-4 font-bold font-mono text-emerald-600 dark:text-emerald-400 text-right text-lg">
                                Rp 2.800.000</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>

    {{-- Script Placeholder untuk Chart --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            // Contoh inisialisasi chart sederhana (Dummy Data)
            var options = {
                series: [{
                    name: 'Profit Bersih',
                    data: [1.2, 1.8, 1.4, 2.1, 1.7, 2.8, 2.4] // Dalam Jutaan
                }, {
                    name: 'Omset',
                    data: [3.1, 4.0, 3.2, 5.1, 4.2, 6.0, 5.2] // Dalam Jutaan
                }],
                chart: {
                    height: 320,
                    type: 'area',
                    toolbar: {
                        show: false
                    },
                    fontFamily: 'inherit'
                },
                colors: ['#10b981', '#6366f1'], // Emerald & Indigo
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                xaxis: {
                    categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                grid: {
                    borderColor: '#f1f5f9',
                    strokeDashArray: 4,
                },
                theme: {
                    mode: 'light' // Bisa dibuat dinamis check dark mode class
                }
            };

            var chart = new ApexCharts(document.querySelector("#profitChart"), options);
            chart.render();
        </script>
    @endpush
@endsection
