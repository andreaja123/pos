@extends('layouts.admin')
@section('title', 'Pelanggan Teratas - Hanania POS')

@section('content')
    <section id="top-customers" class="max-w-7xl mx-auto space-y-6">

        <div class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
            <div class="flex flex-col lg:flex-row justify-between lg:items-end gap-6">
                <div>
                    <h2 class="font-display font-bold text-2xl text-slate-800 dark:text-white mb-1">
                        Laporan Pelanggan
                    </h2>
                    <p class="text-slate-500 dark:text-slate-400 text-sm">
                        Analisa loyalitas dan transaksi pelanggan tertinggi
                    </p>
                </div>

                <div class="flex flex-col md:flex-row gap-4 items-center w-full lg:w-auto">
                    <div
                        class="flex items-center gap-2 bg-slate-50 dark:bg-slate-700/50 p-1.5 rounded-xl border border-slate-200 dark:border-slate-600 w-full md:w-auto">
                        <input type="date"
                            class="bg-transparent border-none text-xs font-bold text-slate-600 dark:text-slate-300 focus:ring-0 px-2">
                        <span class="text-slate-400 text-xs">s/d</span>
                        <input type="date"
                            class="bg-transparent border-none text-xs font-bold text-slate-600 dark:text-slate-300 focus:ring-0 px-2">
                    </div>

                    <div
                        class="flex bg-slate-50 dark:bg-slate-700/50 p-1 rounded-xl border border-slate-200 dark:border-slate-600 w-full md:w-auto">
                        <button
                            class="flex-1 px-4 py-2 text-xs font-bold rounded-lg text-slate-500 hover:text-indigo-600 hover:bg-white dark:hover:bg-slate-600 dark:text-slate-400 transition shadow-sm">
                            Minggu Ini
                        </button>
                        <button
                            class="flex-1 px-4 py-2 text-xs font-bold rounded-lg bg-white dark:bg-slate-600 text-indigo-600 dark:text-indigo-400 shadow-sm border border-slate-100 dark:border-slate-500 transition">
                            Bulan Ini
                        </button>
                        <button
                            class="flex-1 px-4 py-2 text-xs font-bold rounded-lg text-slate-500 hover:text-indigo-600 hover:bg-white dark:hover:bg-slate-600 dark:text-slate-400 transition shadow-sm">
                            Tahun Ini
                        </button>
                    </div>

                    <button
                        class="p-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 dark:shadow-none">
                        <i class="ph-bold ph-magnifying-glass text-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div
                class="lg:col-span-2 bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Tren Transaksi Pelanggan Top
                    </h3>
                    <button class="text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400">
                        <i class="ph-bold ph-dots-three-circle text-2xl"></i>
                    </button>
                </div>
                <div
                    class="relative w-full h-64 bg-slate-50 dark:bg-slate-700/30 rounded-2xl flex items-center justify-center border border-dashed border-slate-200 dark:border-slate-600">
                    <div class="text-center">
                        <i class="ph-duotone ph-chart-line-up text-4xl text-slate-300 dark:text-slate-500 mb-2"></i>
                        <p class="text-xs text-slate-400 dark:text-slate-500 font-medium">Area Grafik (Chart.js /
                            ApexCharts)</p>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-full flex items-end justify-around px-4 pb-4 opacity-50">
                        <div class="w-8 bg-indigo-200 dark:bg-indigo-900 rounded-t-lg h-[40%]"></div>
                        <div class="w-8 bg-indigo-300 dark:bg-indigo-800 rounded-t-lg h-[60%]"></div>
                        <div class="w-8 bg-indigo-400 dark:bg-indigo-700 rounded-t-lg h-[30%]"></div>
                        <div class="w-8 bg-indigo-500 dark:bg-indigo-600 rounded-t-lg h-[80%]"></div>
                        <div class="w-8 bg-indigo-600 dark:bg-indigo-500 rounded-t-lg h-[55%]"></div>
                        <div class="w-8 bg-indigo-500 dark:bg-indigo-600 rounded-t-lg h-[75%]"></div>
                        <div class="w-8 bg-indigo-400 dark:bg-indigo-700 rounded-t-lg h-[45%]"></div>
                    </div>
                </div>
            </div>

            <div
                class="bg-indigo-600 dark:bg-indigo-900/50 p-6 rounded-3xl shadow-xl shadow-indigo-200 dark:shadow-none text-white flex flex-col justify-between relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                <div class="absolute bottom-10 -left-10 w-24 h-24 bg-indigo-400/20 rounded-full blur-xl"></div>

                <div>
                    <div class="flex items-center gap-2 mb-2 text-indigo-100">
                        <i class="ph-fill ph-trophy text-xl"></i>
                        <span class="text-sm font-bold">Top #1 Bulan Ini</span>
                    </div>
                    <h3 class="text-2xl font-display font-bold mb-1">Budi Santoso</h3>
                    <p class="text-indigo-200 text-sm">Member sejak 2023</p>
                </div>

                <div class="space-y-4 relative z-10">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-2xl border border-white/10">
                        <p class="text-xs text-indigo-200 mb-1">Total Belanja</p>
                        <p class="text-xl font-bold">Rp 12.500.000</p>
                    </div>
                    <div class="flex gap-3">
                        <div class="flex-1 bg-white/10 backdrop-blur-sm p-3 rounded-2xl border border-white/10">
                            <p class="text-xs text-indigo-200 mb-1">Transaksi</p>
                            <p class="text-lg font-bold">24x</p>
                        </div>
                        <div class="flex-1 bg-white/10 backdrop-blur-sm p-3 rounded-2xl border border-white/10">
                            <p class="text-xs text-indigo-200 mb-1">Avg</p>
                            <p class="text-lg font-bold">520rb</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Peringkat Pelanggan
                    </h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Diurutkan berdasarkan total nominal belanja
                    </p>
                </div>
                <div class="flex gap-3">
                    <button
                        class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 text-xs font-bold rounded-xl hover:bg-slate-50 transition">
                        <i class="ph-bold ph-download-simple"></i> Export CSV
                    </button>
                    <button
                        class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 text-xs font-bold rounded-xl hover:bg-slate-50 transition">
                        <i class="ph-bold ph-printer"></i> Print
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16 text-center">Rank</th>
                            <th class="px-6 py-4 font-bold">Pelanggan</th>
                            <th class="px-6 py-4 font-bold">Total Transaksi</th>
                            <th class="px-6 py-4 font-bold">Total Belanja (IDR)</th>
                            <th class="px-6 py-4 font-bold">Terakhir Berkunjung</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition group">
                            <td class="px-6 py-4 text-center">
                                <div
                                    class="w-8 h-8 mx-auto bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center">
                                    <i class="ph-fill ph-trophy text-lg"></i>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-600 overflow-hidden">
                                        <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=random"
                                            alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-slate-800 dark:text-white group-hover:text-indigo-600 transition">
                                            Budi Santoso</p>
                                        <p class="text-xs text-slate-400">budi.s@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium">
                                24 Transaksi
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-emerald-400">
                                Rp 12.500.000
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-slate-100 dark:bg-slate-700 px-2 py-1 rounded text-xs font-medium">Hari
                                    ini</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button
                                    class="p-2 hover:bg-slate-100 dark:hover:bg-slate-600 rounded-lg text-slate-400 hover:text-indigo-600 transition">
                                    <i class="ph-bold ph-eye text-lg"></i>
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition group">
                            <td class="px-6 py-4 text-center">
                                <div
                                    class="w-8 h-8 mx-auto bg-slate-200 text-slate-600 rounded-full flex items-center justify-center font-bold text-xs">
                                    #2
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-pink-100 dark:bg-pink-900/30 text-pink-600 flex items-center justify-center font-bold">
                                        RM
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-slate-800 dark:text-white group-hover:text-indigo-600 transition">
                                            Rina Melati</p>
                                        <p class="text-xs text-slate-400">0812-3456-7890</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium">
                                18 Transaksi
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-emerald-400">
                                Rp 8.200.000
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs text-slate-500">2 hari lalu</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button
                                    class="p-2 hover:bg-slate-100 dark:hover:bg-slate-600 rounded-lg text-slate-400 hover:text-indigo-600 transition">
                                    <i class="ph-bold ph-eye text-lg"></i>
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition group">
                            <td class="px-6 py-4 text-center">
                                <div
                                    class="w-8 h-8 mx-auto bg-orange-100 text-orange-700 rounded-full flex items-center justify-center font-bold text-xs">
                                    #3
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 flex items-center justify-center font-bold">
                                        AD
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-slate-800 dark:text-white group-hover:text-indigo-600 transition">
                                            Andi Darma</p>
                                        <p class="text-xs text-slate-400">andi.darma@gmail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium">
                                15 Transaksi
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-emerald-400">
                                Rp 5.750.000
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs text-slate-500">Minggu lalu</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button
                                    class="p-2 hover:bg-slate-100 dark:hover:bg-slate-600 rounded-lg text-slate-400 hover:text-indigo-600 transition">
                                    <i class="ph-bold ph-eye text-lg"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <p class="text-xs text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">1-3</span> dari 142 Pelanggan
                </p>
                <div class="flex gap-2">
                    <button
                        class="px-3 py-1 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-400 text-xs hover:bg-slate-50 dark:hover:bg-slate-700"
                        disabled>Previous</button>
                    <button
                        class="px-3 py-1 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 text-xs hover:bg-slate-50 dark:hover:bg-slate-700">Next</button>
                </div>
            </div>
        </div>
    </section>
@endsection
