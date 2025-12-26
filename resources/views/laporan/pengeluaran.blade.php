@extends('layouts.admin')
@section('title', 'Laporan Pengeluaran - Hanania POS')

@section('content')
    <section id="expenses" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Laporan Pengeluaran
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Monitoring arus kas keluar operasional
                </p>
            </div>

            <div
                class="w-full lg:w-auto flex flex-col md:flex-row gap-3 bg-white dark:bg-darkCard p-2 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm">
                <div class="flex items-center gap-2 px-2">
                    <div class="relative group">
                        <i class="ph-bold ph-calendar-blank absolute left-3 top-2.5 text-slate-400"></i>
                        <input type="date"
                            class="pl-9 pr-3 py-2 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-200 focus:ring-2 focus:ring-red-500 focus:outline-none transition"
                            placeholder="Start Date">
                    </div>
                    <span class="text-slate-400">-</span>
                    <div class="relative group">
                        <input type="date"
                            class="pl-3 pr-3 py-2 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-200 focus:ring-2 focus:ring-red-500 focus:outline-none transition"
                            placeholder="End Date">
                    </div>
                </div>

                <div class="w-px h-8 bg-slate-200 dark:bg-slate-600 hidden md:block"></div>

                <div class="flex p-1 bg-slate-100 dark:bg-slate-700 rounded-xl">
                    <button
                        class="px-4 py-1.5 text-xs font-bold rounded-lg bg-white dark:bg-slate-600 text-slate-800 dark:text-white shadow-sm transition">
                        Minggu Ini
                    </button>
                    <button
                        class="px-4 py-1.5 text-xs font-bold rounded-lg text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 transition">
                        Bulan Ini
                    </button>
                    <button
                        class="px-4 py-1.5 text-xs font-bold rounded-lg text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 transition">
                        Tahun Ini
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300 relative overflow-hidden">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-red-50 dark:bg-red-500/10 rounded-full blur-2xl"></div>
                <div class="flex justify-between items-start mb-4 relative">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Total Pengeluaran</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">Rp 8.2 Jt</h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-red-50 dark:bg-red-500/20 text-red-600 dark:text-red-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-trend-down text-2xl"></i>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span
                        class="bg-red-100 dark:bg-red-500/20 px-2 py-0.5 rounded text-red-600 dark:text-red-400 text-xs font-bold">+2.4%</span>
                    <span class="text-xs text-slate-400 font-medium">vs periode lalu</span>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Rata-rata Harian</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">Rp 450rb</h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-orange-50 dark:bg-orange-500/20 text-orange-600 dark:text-orange-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-chart-bar text-2xl"></i>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span
                        class="bg-emerald-100 dark:bg-emerald-500/20 px-2 py-0.5 rounded text-emerald-600 dark:text-emerald-400 text-xs font-bold">-5%</span>
                    <span class="text-xs text-slate-400 font-medium">lebih hemat</span>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Pengeluaran Terbesar</p>
                        <h3 class="text-xl font-display font-bold text-slate-800 dark:text-white truncate max-w-[180px]">
                            Bahan Baku</h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-purple-50 dark:bg-purple-500/20 text-purple-600 dark:text-purple-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-pie-chart text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-2 overflow-hidden">
                    <div class="bg-purple-500 h-1.5 rounded-full" style="width: 65%"></div>
                </div>
                <p class="text-xs text-slate-400 font-medium">65% dari total pengeluaran</p>
            </div>
        </div>

        <div class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm mb-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                    Grafik Arus Pengeluaran
                </h3>
                <button class="text-slate-400 hover:text-red-500 transition">
                    <i class="ph-bold ph-download-simple text-xl"></i>
                </button>
            </div>

            <div
                class="w-full h-[350px] bg-slate-50 dark:bg-slate-700/30 rounded-2xl flex items-center justify-center border border-dashed border-slate-200 dark:border-slate-600 relative overflow-hidden group">
                <div class="text-center">
                    <i
                        class="ph-duotone ph-chart-line-up text-4xl text-slate-300 dark:text-slate-600 mb-2 group-hover:scale-110 transition"></i>
                    <p class="text-sm text-slate-400">Area untuk Render Grafik (Chart.js / ApexCharts)</p>
                </div>
                <div class="absolute inset-0 pointer-events-none opacity-20"
                    style="background-image: linear-gradient(#cbd5e1 1px, transparent 1px), linear-gradient(90deg, #cbd5e1 1px, transparent 1px); background-size: 40px 40px;">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div
                class="lg:col-span-2 bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                    <div>
                        <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                            Riwayat Pengeluaran
                        </h3>
                    </div>
                    <button
                        class="px-4 py-2 bg-slate-50 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-sm font-bold rounded-xl hover:bg-slate-100 dark:hover:bg-slate-600 transition flex items-center gap-2">
                        <i class="ph-bold ph-plus"></i> Tambah Baru
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                        <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                            <tr>
                                <th class="px-6 py-4 font-bold">Tanggal</th>
                                <th class="px-6 py-4 font-bold">Keterangan</th>
                                <th class="px-6 py-4 font-bold">Kategori</th>
                                <th class="px-6 py-4 font-bold">Jumlah</th>
                                <th class="px-6 py-4 font-bold text-right">Bukti</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 font-medium">16 Des 2023</td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Belanja Stok Kain</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 bg-purple-100 dark:bg-purple-500/20 text-purple-700 dark:text-purple-300 rounded-lg text-xs font-bold">Bahan
                                        Baku</span>
                                </td>
                                <td class="px-6 py-4 text-slate-800 dark:text-white font-mono">Rp 2.500.000</td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-slate-400 hover:text-indigo-500 transition tooltip"
                                        title="Lihat Invoice">
                                        <i class="ph-bold ph-receipt text-lg"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 font-medium">15 Des 2023</td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Token Listrik Toko</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 bg-orange-100 dark:bg-orange-500/20 text-orange-700 dark:text-orange-300 rounded-lg text-xs font-bold">Operasional</span>
                                </td>
                                <td class="px-6 py-4 text-slate-800 dark:text-white font-mono">Rp 500.000</td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-slate-400 hover:text-indigo-500 transition">
                                        <i class="ph-bold ph-receipt text-lg"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 font-medium">14 Des 2023</td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Konsumsi Meeting</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 bg-blue-100 dark:bg-blue-500/20 text-blue-700 dark:text-blue-300 rounded-lg text-xs font-bold">Lain-lain</span>
                                </td>
                                <td class="px-6 py-4 text-slate-800 dark:text-white font-mono">Rp 150.000</td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-slate-400 hover:text-indigo-500 transition">
                                        <i class="ph-bold ph-receipt text-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-slate-100 dark:border-slate-700 flex justify-center">
                    <button
                        class="text-sm font-bold text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-white transition">
                        Lihat Semua Riwayat
                    </button>
                </div>
            </div>

            <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6">
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-6">
                    Kategori Bulan Ini
                </h3>
                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between items-end mb-2">
                            <span class="text-sm font-bold text-slate-600 dark:text-slate-300">Bahan Baku</span>
                            <span class="text-sm font-bold text-slate-800 dark:text-white">Rp 5.2jt</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-700 h-2 rounded-full overflow-hidden">
                            <div class="bg-purple-500 h-2 rounded-full" style="width: 65%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between items-end mb-2">
                            <span class="text-sm font-bold text-slate-600 dark:text-slate-300">Gaji Karyawan</span>
                            <span class="text-sm font-bold text-slate-800 dark:text-white">Rp 2.1jt</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-700 h-2 rounded-full overflow-hidden">
                            <div class="bg-pink-500 h-2 rounded-full" style="width: 25%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between items-end mb-2">
                            <span class="text-sm font-bold text-slate-600 dark:text-slate-300">Operasional</span>
                            <span class="text-sm font-bold text-slate-800 dark:text-white">Rp 800rb</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-700 h-2 rounded-full overflow-hidden">
                            <div class="bg-orange-500 h-2 rounded-full" style="width: 10%"></div>
                        </div>
                    </div>
                </div>

                <div
                    class="mt-8 bg-slate-50 dark:bg-slate-700/50 p-4 rounded-2xl border border-slate-100 dark:border-slate-700">
                    <div class="flex items-start gap-3">
                        <i class="ph-fill ph-info text-blue-500 mt-0.5"></i>
                        <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                            Pengeluaran bahan baku bulan ini <span class="text-red-500 font-bold">naik 15%</span>
                            dibandingkan bulan lalu. Cek stok gudang.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
