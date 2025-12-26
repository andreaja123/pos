@extends('layouts.admin')
@section('title', 'Laporan Keuangan - Hanania POS')

@section('content')
    <section id="finance-report" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Penghasilan vs Pengeluaran
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Analisis arus kas mingguan, bulanan, dan tahunan.
                </p>
            </div>

            <div
                class="flex flex-wrap items-center gap-3 bg-white dark:bg-darkCard p-2 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm">
                <div class="flex bg-slate-100 dark:bg-slate-700/50 rounded-xl p-1">
                    <button
                        class="px-3 py-1.5 text-xs font-bold rounded-lg bg-white dark:bg-slate-600 text-slate-800 dark:text-white shadow-sm transition">
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

                <div class="w-px h-8 bg-slate-200 dark:bg-slate-600 mx-1 hidden md:block"></div>

                <div class="flex items-center gap-2">
                    <div class="relative">
                        <input type="date"
                            class="pl-3 pr-2 py-1.5 text-xs font-bold bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg text-slate-600 dark:text-slate-300 focus:outline-none focus:border-indigo-500">
                    </div>
                    <span class="text-slate-400 text-xs">-</span>
                    <div class="relative">
                        <input type="date"
                            class="pl-3 pr-2 py-1.5 text-xs font-bold bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg text-slate-600 dark:text-slate-300 focus:outline-none focus:border-indigo-500">
                    </div>
                </div>

                <button
                    class="p-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 dark:shadow-none">
                    <i class="ph-bold ph-magnifying-glass"></i>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none relative overflow-hidden group">
                <div class="absolute right-0 top-0 p-6 opacity-10 group-hover:scale-110 transition duration-500">
                    <i class="ph-fill ph-trend-up text-6xl text-emerald-500"></i>
                </div>
                <div class="relative z-10">
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-2 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Total Pemasukan
                    </p>
                    <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white mb-1">
                        Rp 84.250.000
                    </h3>
                    <p class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                        <i class="ph-bold ph-arrow-up-right"></i>
                        <span>+12.5% vs periode lalu</span>
                    </p>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none relative overflow-hidden group">
                <div class="absolute right-0 top-0 p-6 opacity-10 group-hover:scale-110 transition duration-500">
                    <i class="ph-fill ph-trend-down text-6xl text-rose-500"></i>
                </div>
                <div class="relative z-10">
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-2 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-rose-500"></span> Total Pengeluaran
                    </p>
                    <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white mb-1">
                        Rp 32.100.000
                    </h3>
                    <p class="text-rose-500 text-xs font-bold flex items-center gap-1">
                        <i class="ph-bold ph-arrow-up-right"></i>
                        <span>+5.2% vs periode lalu</span>
                    </p>
                </div>
            </div>

            <div
                class="bg-indigo-600 dark:bg-indigo-600 p-6 rounded-3xl border border-indigo-500 shadow-lg shadow-indigo-200 dark:shadow-none relative overflow-hidden text-white">
                <div class="absolute right-0 top-0 p-6 opacity-20">
                    <i class="ph-fill ph-wallet text-6xl text-white"></i>
                </div>
                <div class="relative z-10">
                    <p class="text-indigo-100 text-sm font-bold mb-2">
                        Keuntungan Bersih (Net)
                    </p>
                    <h3 class="text-3xl font-display font-bold text-white mb-1">
                        Rp 52.150.000
                    </h3>
                    <p class="text-indigo-100 text-xs font-medium opacity-80">
                        Margin Keuntungan: 61%
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <div
                class="lg:col-span-2 bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Grafik Arus Kas
                    </h3>
                    <div class="flex items-center gap-2 text-xs font-bold">
                        <span class="flex items-center gap-1 text-slate-500 dark:text-slate-400">
                            <span class="w-3 h-3 rounded-full bg-emerald-500"></span> Masuk
                        </span>
                        <span class="flex items-center gap-1 text-slate-500 dark:text-slate-400">
                            <span class="w-3 h-3 rounded-full bg-rose-500"></span> Keluar
                        </span>
                    </div>
                </div>

                <div class="relative h-80 w-full">
                    <canvas id="cashflowChart"></canvas>
                </div>
            </div>

            <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6">
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-6">
                    Kategori Pengeluaran
                </h3>
                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between items-end mb-2">
                            <span class="text-sm font-bold text-slate-600 dark:text-slate-300">Stok & HPP</span>
                            <span class="text-sm font-bold text-slate-800 dark:text-white">65%</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-700 h-2 rounded-full overflow-hidden">
                            <div class="bg-indigo-500 h-2 rounded-full" style="width: 65%"></div>
                        </div>
                        <p class="text-xs text-slate-400 mt-1">Rp 20.865.000</p>
                    </div>

                    <div>
                        <div class="flex justify-between items-end mb-2">
                            <span class="text-sm font-bold text-slate-600 dark:text-slate-300">Gaji Karyawan</span>
                            <span class="text-sm font-bold text-slate-800 dark:text-white">20%</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-700 h-2 rounded-full overflow-hidden">
                            <div class="bg-orange-500 h-2 rounded-full" style="width: 20%"></div>
                        </div>
                        <p class="text-xs text-slate-400 mt-1">Rp 6.420.000</p>
                    </div>

                    <div>
                        <div class="flex justify-between items-end mb-2">
                            <span class="text-sm font-bold text-slate-600 dark:text-slate-300">Operasional & Listrik</span>
                            <span class="text-sm font-bold text-slate-800 dark:text-white">15%</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-700 h-2 rounded-full overflow-hidden">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: 15%"></div>
                        </div>
                        <p class="text-xs text-slate-400 mt-1">Rp 4.815.000</p>
                    </div>
                </div>

                <div
                    class="mt-8 p-4 bg-slate-50 dark:bg-slate-700/50 rounded-2xl border border-slate-100 dark:border-slate-600">
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Tips Hemat</p>
                    <p class="text-sm font-bold text-slate-700 dark:text-slate-200">
                        Pengeluaran operasional naik 5% bulan ini. Cek penggunaan listrik di jam tutup toko.
                    </p>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                    Riwayat Transaksi Terakhir
                </h3>
                <button class="text-indigo-600 dark:text-indigo-400 text-sm font-bold hover:underline">
                    Download Laporan PDF
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 font-bold">Keterangan</th>
                            <th class="px-6 py-4 font-bold">Kategori</th>
                            <th class="px-6 py-4 font-bold text-right">Nominal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">16 Des 2025</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Penjualan Harian #ORD-099</td>
                            <td class="px-6 py-4"><span
                                    class="px-2 py-1 rounded-md bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 text-xs font-bold">Pemasukan</span>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-emerald-600">+ Rp 2.450.000</td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">15 Des 2025</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Restock Kain Linen</td>
                            <td class="px-6 py-4"><span
                                    class="px-2 py-1 rounded-md bg-rose-100 dark:bg-rose-500/20 text-rose-700 dark:text-rose-400 text-xs font-bold">Pengeluaran</span>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-rose-500">- Rp 5.200.000</td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">15 Des 2025</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Bayar Listrik & WiFi</td>
                            <td class="px-6 py-4"><span
                                    class="px-2 py-1 rounded-md bg-rose-100 dark:bg-rose-500/20 text-rose-700 dark:text-rose-400 text-xs font-bold">Pengeluaran</span>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-rose-500">- Rp 850.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('cashflowChart').getContext('2d');

            // Gradient untuk Pemasukan
            const gradientIncome = ctx.createLinearGradient(0, 0, 0, 300);
            gradientIncome.addColorStop(0, 'rgba(16, 185, 129, 0.2)'); // Emerald-500
            gradientIncome.addColorStop(1, 'rgba(16, 185, 129, 0)');

            // Gradient untuk Pengeluaran
            const gradientExpense = ctx.createLinearGradient(0, 0, 0, 300);
            gradientExpense.addColorStop(0, 'rgba(244, 63, 94, 0.2)'); // Rose-500
            gradientExpense.addColorStop(1, 'rgba(244, 63, 94, 0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                    datasets: [{
                            label: 'Pemasukan',
                            data: [12, 19, 15, 25, 22, 30, 28],
                            borderColor: '#10b981', // Emerald 500
                            backgroundColor: gradientIncome,
                            borderWidth: 3,
                            tension: 0.4,
                            fill: true,
                            pointRadius: 4,
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#10b981',
                        },
                        {
                            label: 'Pengeluaran',
                            data: [8, 12, 10, 15, 12, 18, 14],
                            borderColor: '#f43f5e', // Rose 500
                            backgroundColor: gradientExpense,
                            borderWidth: 3,
                            tension: 0.4,
                            fill: true,
                            pointRadius: 4,
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#f43f5e',
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            backgroundColor: 'rgba(30, 41, 59, 0.9)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: 'rgba(255,255,255,0.1)',
                            borderWidth: 1,
                            padding: 10,
                            displayColors: true,
                            usePointStyle: true,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(148, 163, 184, 0.1)', // Slate 400 very light
                                drawBorder: false,
                            },
                            ticks: {
                                color: '#94a3b8', // Slate 400
                                callback: function(value) {
                                    return 'Rp ' + value + 'jt';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                color: '#94a3b8' // Slate 400
                            }
                        }
                    },
                    interaction: {
                        mode: 'nearest',
                        axis: 'x',
                        intersect: false
                    }
                }
            });
        });
    </script>
@endsection
