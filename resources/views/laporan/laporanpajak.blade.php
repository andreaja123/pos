@extends('layouts.admin')
@section('title', 'Laporan Pajak - Hanania POS')

@section('content')
    <section id="tax-report" class="page-section active max-w-7xl mx-auto pb-10">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Laporan Pajak
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                    Rekapitulasi perpajakan bisnis Anda
                </p>
            </div>
            <div class="flex gap-3">
                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold text-sm rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition shadow-sm">
                    <i class="ph-bold ph-file-pdf text-lg text-red-500"></i>
                    Export PDF
                </button>
                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white font-bold text-sm rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200/50 dark:shadow-none">
                    <i class="ph-bold ph-file-xls text-lg"></i>
                    Export Excel
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none mb-8">
            <form class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-end">
                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                        Lokasi Bisnis
                    </label>
                    <div class="relative">
                        <i class="ph-bold ph-storefront absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <select
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-bold text-slate-700 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition appearance-none cursor-pointer">
                            <option>Semua Cabang</option>
                            <option>Cabang Jakarta Pusat</option>
                            <option>Cabang Surabaya</option>
                        </select>
                        <i
                            class="ph-bold ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                        Tipe Pajak
                    </label>
                    <div class="relative">
                        <i class="ph-bold ph-tag absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <select
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-bold text-slate-700 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition appearance-none cursor-pointer">
                            <option>Semua Tipe</option>
                            <option>PPN (11%)</option>
                            <option>PPh Final</option>
                            <option>Service Charge</option>
                        </select>
                        <i
                            class="ph-bold ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                    </div>
                </div>

                <div class="space-y-2 md:col-span-2 lg:col-span-2">
                    <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                        Periode Laporan
                    </label>
                    <div class="flex items-center gap-2">
                        <div class="relative flex-1">
                            <i
                                class="ph-bold ph-calendar-blank absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="date"
                                class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-bold text-slate-700 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition"
                                placeholder="Dari Tanggal">
                        </div>
                        <span class="text-slate-400 font-bold">-</span>
                        <div class="relative flex-1">
                            <i
                                class="ph-bold ph-calendar-blank absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="date"
                                class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-bold text-slate-700 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition"
                                placeholder="Sampai Tanggal">
                        </div>
                        <button type="submit"
                            class="p-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl transition shadow-lg shadow-indigo-200/50 dark:shadow-none">
                            <i class="ph-bold ph-magnifying-glass text-xl"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-indigo-600 rounded-3xl p-6 text-white shadow-xl shadow-indigo-200/50 dark:shadow-none relative overflow-hidden group">
                <div
                    class="absolute -right-6 -top-6 w-32 h-32 bg-white/10 rounded-full group-hover:scale-110 transition duration-500">
                </div>
                <p class="text-indigo-100 text-sm font-bold mb-1 relative z-10">Total DPP (Dasar Pengenaan Pajak)</p>
                <h3 class="text-3xl font-display font-bold relative z-10">Rp 452.5 Jt</h3>
                <div class="mt-4 flex items-center gap-2 text-indigo-100 text-xs font-medium">
                    <i class="ph-fill ph-trend-up"></i>
                    <span>Berdasarkan filter terpilih</span>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <div class="flex items-center gap-4 mb-2">
                    <div
                        class="w-10 h-10 rounded-xl bg-orange-50 dark:bg-orange-500/20 text-orange-600 dark:text-orange-400 flex items-center justify-center">
                        <i class="ph-fill ph-coins text-xl"></i>
                    </div>
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold">Est. Pajak Terutang</p>
                        <h3 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Rp 49.7 Jt</h3>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mt-3 mb-2 overflow-hidden">
                    <div class="bg-orange-500 h-1.5 rounded-full" style="width: 100%"></div>
                </div>
                <p class="text-xs text-slate-400">Total PPN + PPh yang harus disetor</p>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <div class="flex items-center gap-4 mb-2">
                    <div
                        class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center">
                        <i class="ph-fill ph-check-circle text-xl"></i>
                    </div>
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold">Arsip Laporan</p>
                        <h3 class="text-2xl font-display font-bold text-slate-800 dark:text-white">12 Bulan</h3>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mt-3 mb-2 overflow-hidden">
                    <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 100%"></div>
                </div>
                <p class="text-xs text-slate-400">Data pajak tersedia lengkap</p>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Rincian Transaksi Pajak
                    </h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Menampilkan transaksi kena pajak sesuai filter
                    </p>
                </div>
                <div class="relative w-full md:w-64">
                    <i class="ph-bold ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" placeholder="Cari No. Invoice..."
                        class="w-full pl-9 pr-4 py-2 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 font-bold">No. Invoice</th>
                            <th class="px-6 py-4 font-bold">Lokasi</th>
                            <th class="px-6 py-4 font-bold">Tipe Pajak</th>
                            <th class="px-6 py-4 font-bold text-right">Nilai DPP</th>
                            <th class="px-6 py-4 font-bold text-right">Nominal Pajak</th>
                            <th class="px-6 py-4 font-bold text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 text-slate-500 dark:text-slate-400">
                                16 Des 2025
                            </td>
                            <td class="px-6 py-4 font-mono font-bold text-indigo-600 dark:text-indigo-400">
                                #INV-2025-001
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-slate-200">
                                Jakarta Pusat
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 rounded text-xs font-bold border border-blue-100 dark:border-blue-500/20">
                                    PPN 11%
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-medium">
                                Rp 1.000.000
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-slate-800 dark:text-white">
                                Rp 110.000
                            </td>
                            <td class="px-6 py-4 text-center">
                                <i class="ph-fill ph-check-circle text-emerald-500 text-xl"
                                    title="Termasuk dalam Laporan"></i>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 text-slate-500 dark:text-slate-400">
                                16 Des 2025
                            </td>
                            <td class="px-6 py-4 font-mono font-bold text-indigo-600 dark:text-indigo-400">
                                #INV-2025-002
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-slate-200">
                                Surabaya
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-purple-50 dark:bg-purple-500/10 text-purple-600 dark:text-purple-400 rounded text-xs font-bold border border-purple-100 dark:border-purple-500/20">
                                    Service 5%
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-medium">
                                Rp 200.000
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-slate-800 dark:text-white">
                                Rp 10.000
                            </td>
                            <td class="px-6 py-4 text-center">
                                <i class="ph-fill ph-check-circle text-emerald-500 text-xl"></i>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 text-slate-500 dark:text-slate-400">
                                15 Des 2025
                            </td>
                            <td class="px-6 py-4 font-mono font-bold text-indigo-600 dark:text-indigo-400">
                                #INV-2025-003
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-slate-200">
                                Jakarta Pusat
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 rounded text-xs font-bold border border-blue-100 dark:border-blue-500/20">
                                    PPN 11%
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-medium">
                                Rp 5.000.000
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-slate-800 dark:text-white">
                                Rp 550.000
                            </td>
                            <td class="px-6 py-4 text-center">
                                <i class="ph-fill ph-check-circle text-emerald-500 text-xl"></i>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class="bg-slate-50 dark:bg-slate-800/50 border-t border-slate-200 dark:border-slate-600">
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-right font-bold text-slate-600 dark:text-slate-300">
                                TOTAL HALAMAN INI
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-slate-800 dark:text-white">
                                Rp 6.200.000
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-indigo-600 dark:text-indigo-400 text-lg">
                                Rp 670.000
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="p-6 border-t border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">1-10</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">42</span> data
                </p>
                <div class="flex gap-2">
                    <button
                        class="px-4 py-2 border border-slate-200 dark:border-slate-600 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition text-sm font-bold disabled:opacity-50">
                        Prev
                    </button>
                    <button
                        class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition text-sm font-bold shadow-lg shadow-indigo-200/50 dark:shadow-none">
                        1
                    </button>
                    <button
                        class="px-4 py-2 border border-slate-200 dark:border-slate-600 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition text-sm font-bold">
                        2
                    </button>
                    <button
                        class="px-4 py-2 border border-slate-200 dark:border-slate-600 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition text-sm font-bold">
                        Next
                    </button>
                </div>
            </div>
        </div>

    </section>
@endsection
