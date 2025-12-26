@extends('layouts.admin')

@section('title', 'Komisi Pegawai - Hanania POS')

@section('content')
    <section id="komisi-pegawai" class="page-section active max-w-7xl mx-auto space-y-6">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Komisi Pegawai</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400">Hitung dan kelola insentif penjualan tim Anda.</p>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
            <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                <i class="ph-fill ph-faders text-indigo-500"></i> Filter Periode & Karyawan
            </h3>

            <form action="" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                <div class="md:col-span-4 space-y-1">
                    <label class="text-xs font-bold text-slate-500 dark:text-slate-400 ml-1">Pilih Karyawan</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg">
                            <i class="ph-bold ph-user"></i>
                        </span>
                        <select
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-white font-medium focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition appearance-none cursor-pointer">
                            <option value="" disabled selected>Pilih nama karyawan...</option>
                            <option value="1">Budi Santoso</option>
                            <option value="2">Rina Melati</option>
                            <option value="3">Andi Darma</option>
                        </select>
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">
                            <i class="ph-bold ph-caret-down"></i>
                        </span>
                    </div>
                </div>

                <div class="md:col-span-3 space-y-1">
                    <label class="text-xs font-bold text-slate-500 dark:text-slate-400 ml-1">Dari Tanggal</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg">
                            <i class="ph-bold ph-calendar-blank"></i>
                        </span>
                        <input type="date"
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-white font-medium focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition" />
                    </div>
                </div>

                <div class="md:col-span-3 space-y-1">
                    <label class="text-xs font-bold text-slate-500 dark:text-slate-400 ml-1">Sampai Tanggal</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg">
                            <i class="ph-bold ph-calendar-check"></i>
                        </span>
                        <input type="date"
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-white font-medium focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition" />
                    </div>
                </div>

                <div class="md:col-span-2">
                    <button type="submit"
                        class="w-full py-3 px-6 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-200/50 dark:shadow-none transition duration-300 flex items-center justify-center gap-2">
                        <i class="ph-bold ph-calculator"></i> Hitung
                    </button>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div
                class="bg-gradient-to-br from-indigo-500 to-purple-600 p-6 rounded-3xl shadow-lg shadow-indigo-200/50 dark:shadow-none text-white relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16 blur-2xl group-hover:bg-white/20 transition duration-500">
                </div>
                <div class="relative z-10">
                    <p class="text-indigo-100 font-medium text-sm mb-1">Estimasi Total Komisi</p>
                    <h2 class="text-3xl font-display font-bold">Rp 1.450.000</h2>
                    <div
                        class="mt-4 inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-3 py-1 rounded-lg text-xs font-bold">
                        <i class="ph-fill ph-trend-up"></i> 5% dari Total Omset
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Total Penjualan Sales</p>
                        <h3 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Rp 29.000.000</h3>
                    </div>
                    <div
                        class="w-10 h-10 bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-xl flex items-center justify-center">
                        <i class="ph-fill ph-money text-xl"></i>
                    </div>
                </div>
                <p class="text-xs text-slate-500 dark:text-slate-400">Total omset yang dihasilkan oleh <span
                        class="font-bold text-slate-800 dark:text-white">Budi Santoso</span> pada periode ini.</p>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Jumlah Transaksi</p>
                        <h3 class="text-2xl font-display font-bold text-slate-800 dark:text-white">45 Trx</h3>
                    </div>
                    <div
                        class="w-10 h-10 bg-orange-50 dark:bg-orange-500/20 text-orange-600 dark:text-orange-400 rounded-xl flex items-center justify-center">
                        <i class="ph-fill ph-receipt text-xl"></i>
                    </div>
                </div>
                <p class="text-xs text-slate-500 dark:text-slate-400">Berhasil ditutup (Closing) pada periode ini.</p>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">Rincian Penjualan</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Detail transaksi yang masuk perhitungan komisi.
                    </p>
                </div>
                <button
                    class="px-4 py-2 bg-slate-50 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-sm font-bold rounded-xl hover:bg-slate-100 dark:hover:bg-slate-600 transition flex items-center gap-2">
                    <i class="ph-bold ph-download-simple"></i> Export Excel
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 font-bold">No. Referensi</th>
                            <th class="px-6 py-4 font-bold">Keterangan Barang</th>
                            <th class="px-6 py-4 font-bold">Total Belanja</th>
                            <th class="px-6 py-4 font-bold">Rate (%)</th>
                            <th class="px-6 py-4 font-bold text-right">Nominal Komisi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">16 Des 2023</td>
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400 font-bold">#INV-2023001</td>
                            <td class="px-6 py-4">Kemeja Linen Putih (2x)</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp 500.000</td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 px-2 py-1 rounded font-bold text-xs">5%</span>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-emerald-600 dark:text-emerald-400">
                                + Rp 25.000
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">15 Des 2023</td>
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400 font-bold">#INV-2023089</td>
                            <td class="px-6 py-4">Nike Air Max (1x)</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp 1.200.000</td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 px-2 py-1 rounded font-bold text-xs">5%</span>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-emerald-600 dark:text-emerald-400">
                                + Rp 60.000
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">15 Des 2023</td>
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400 font-bold">#INV-2023075</td>
                            <td class="px-6 py-4">Paket Bundle A (1x)</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp 300.000</td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 px-2 py-1 rounded font-bold text-xs">5%</span>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-emerald-600 dark:text-emerald-400">
                                + Rp 15.000
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class="bg-slate-50 dark:bg-slate-800 border-t border-slate-200 dark:border-slate-700">
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-right font-bold text-slate-600 dark:text-slate-300">
                                TOTAL KOMISI DITERIMA</td>
                            <td class="px-6 py-4 text-right font-bold text-xl text-indigo-600 dark:text-indigo-400">Rp
                                100.000</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="p-6 border-t border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <p class="text-xs text-slate-500">Menampilkan 1-3 dari 45 data</p>
                <div class="flex gap-2">
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition"><i
                            class="ph-bold ph-caret-left"></i></button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-indigo-500 text-white font-bold text-xs">1</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition"><i
                            class="ph-bold ph-caret-right"></i></button>
                </div>
            </div>
        </div>
    </section>
@endsection
