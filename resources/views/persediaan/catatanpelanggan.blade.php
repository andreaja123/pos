@extends('layouts.admin')

@section('title', 'Catatan Pelanggan Retur - Hanania POS')

@section('content')
    <section id="customer-returns" class="page-section active max-w-7xl mx-auto space-y-6">

        <div class="flex flex-col md:flex-row justify-between items-end md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Catatan Pelanggan Retur
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Kelola data pengembalian stok dan status retur pelanggan.
                </p>
            </div>
            <button
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-bold text-sm shadow-lg shadow-indigo-200/50 dark:shadow-none flex items-center gap-2 transition duration-300">
                <i class="ph-bold ph-plus"></i>
                <span>Tambah Retur Baru</span>
            </button>
        </div>

        <div class="bg-white dark:bg-darkCard p-5 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
            <div class="flex flex-col lg:flex-row gap-4 justify-between items-center">
                <div class="flex flex-col md:flex-row gap-4 w-full lg:w-auto">
                    <div class="relative w-full md:w-48">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ph-fill ph-calendar-blank text-slate-400"></i>
                        </div>
                        <input type="date" placeholder="Start Date"
                            class="pl-10 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-slate-200 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-2.5">
                    </div>
                    <span class="hidden md:block self-center text-slate-400">-</span>
                    <div class="relative w-full md:w-48">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ph-fill ph-calendar-blank text-slate-400"></i>
                        </div>
                        <input type="date" placeholder="End Date"
                            class="pl-10 w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-slate-200 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-2.5">
                    </div>
                    <button
                        class="px-4 py-2.5 bg-slate-100 dark:bg-slate-600 hover:bg-slate-200 dark:hover:bg-slate-500 text-slate-600 dark:text-slate-200 rounded-xl text-sm font-bold transition flex items-center justify-center gap-2">
                        <i class="ph-bold ph-magnifying-glass"></i> Cari
                    </button>
                </div>

                <div class="w-full lg:w-auto flex justify-end">
                    <button
                        class="px-4 py-2.5 border border-emerald-200 dark:border-emerald-500/30 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-100 dark:hover:bg-emerald-500/20 rounded-xl text-sm font-bold transition flex items-center gap-2">
                        <i class="ph-fill ph-microsoft-excel-logo text-lg"></i>
                        <span>Export Excel</span>
                    </button>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display uppercase tracking-wider text-xs">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">Order #</th>
                            <th class="px-6 py-4 font-bold">Pelanggan</th>
                            <th class="px-6 py-4 font-bold">Tanggal Retur</th>
                            <th class="px-6 py-4 font-bold">Jumlah Bayar</th>
                            <th class="px-6 py-4 font-bold">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition cursor-pointer">
                            <td class="px-6 py-4 font-medium">1</td>
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                #RT-2023-001
                                <div class="text-[10px] text-slate-400">Ref: ORD-089</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300 flex items-center justify-center font-bold text-xs">
                                        JD
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800 dark:text-slate-200">Joko Driyono</div>
                                        <div class="text-xs text-slate-400">0812-3456-7890</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-700 dark:text-slate-300">
                                14 Des 2025
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                Rp 150.000
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Disetujui
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 rounded-lg transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition cursor-pointer">
                            <td class="px-6 py-4 font-medium">2</td>
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                #RT-2023-002
                                <div class="text-[10px] text-slate-400">Ref: ORD-112</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-pink-100 dark:bg-pink-900/50 text-pink-600 dark:text-pink-300 flex items-center justify-center font-bold text-xs">
                                        SA
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800 dark:text-slate-200">Siti Aminah</div>
                                        <div class="text-xs text-slate-400">0899-8877-6655</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-700 dark:text-slate-300">
                                15 Des 2025
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                Rp 275.000
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400 rounded-full text-xs font-bold border border-amber-200 dark:border-amber-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> Pending
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-500/20 rounded-lg transition"
                                        title="Edit">
                                        <i class="ph-bold ph-pencil-simple text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition cursor-pointer">
                            <td class="px-6 py-4 font-medium">3</td>
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                #RT-2023-003
                                <div class="text-[10px] text-slate-400">Ref: ORD-055</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-300 flex items-center justify-center font-bold text-xs">
                                        BP
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800 dark:text-slate-200">Bambang P.</div>
                                        <div class="text-xs text-slate-400">0811-2233-4455</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-700 dark:text-slate-300">
                                10 Des 2025
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                Rp 89.000
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 bg-red-100 dark:bg-red-500/20 text-red-700 dark:text-red-400 rounded-full text-xs font-bold border border-red-200 dark:border-red-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Ditolak
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 rounded-lg transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div
                class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400 text-center md:text-left">
                    Menampilkan <span class="font-bold text-slate-700 dark:text-slate-200">1</span> sampai <span
                        class="font-bold text-slate-700 dark:text-slate-200">3</span> dari <span
                        class="font-bold text-slate-700 dark:text-slate-200">48</span> data
                </p>

                <div class="flex items-center gap-2">
                    <button
                        class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 disabled:opacity-50 transition">
                        <i class="ph-bold ph-caret-left"></i>
                    </button>
                    <button
                        class="px-3 py-2 rounded-lg bg-indigo-600 text-white font-bold text-sm shadow-md shadow-indigo-200/50 dark:shadow-none">1</button>
                    <button
                        class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 text-sm font-medium transition">2</button>
                    <button
                        class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 text-sm font-medium transition">3</button>
                    <span class="text-slate-400">...</span>
                    <button
                        class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        <i class="ph-bold ph-caret-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
