@extends('layouts.admin')

@section('title', 'Business Registers - Hanania POS')

@section('content')
    <section id="business-registers" class="page-section active max-w-7xl mx-auto space-y-6">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Business Registers
                </h1>
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Rekapitulasi pembukaan dan penutupan kasir.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i
                            class="ph-bold ph-magnifying-glass text-slate-400 group-focus-within:text-indigo-500 transition"></i>
                    </div>
                    <input type="text"
                        class="pl-10 pr-4 py-2.5 w-full sm:w-64 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition shadow-sm dark:text-white placeholder:text-slate-400"
                        placeholder="Cari kasir atau role...">
                </div>

                <button
                    class="flex items-center justify-center gap-2 px-4 py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white text-sm font-bold rounded-xl transition shadow-lg shadow-emerald-500/20 active:scale-95">
                    <i class="ph-bold ph-microsoft-excel-logo text-lg"></i>
                    <span>Export Excel</span>
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm whitespace-nowrap">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display border-b border-slate-100 dark:border-slate-700">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">Role / Kasir</th>
                            <th class="px-6 py-4 font-bold">Open Date</th>
                            <th class="px-6 py-4 font-bold">Close Date</th>
                            <th class="px-6 py-4 font-bold text-right">Tunai</th>
                            <th class="px-6 py-4 font-bold text-right">Kartu</th>
                            <th class="px-6 py-4 font-bold text-right">Bank Transfer</th>
                            <th class="px-6 py-4 font-bold text-right">Kembali</th>
                            <th class="px-6 py-4 font-bold text-center">Status</th>
                            <th class="px-6 py-4 font-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700 text-slate-600 dark:text-slate-400">

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono">1</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300 flex items-center justify-center font-bold text-xs">
                                        AD
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-800 dark:text-white">Andi Darma</span>
                                        <span class="text-xs text-slate-400">Kasir Utama</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-700 dark:text-slate-300">16 Des 2025</span>
                                    <span class="text-xs text-slate-400">08:00 WIB</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-400 italic">
                                - (Sedang Aktif)
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-medium text-slate-800 dark:text-white">
                                Rp 2.450.000
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-medium text-slate-800 dark:text-white">
                                Rp 1.200.000
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-medium text-slate-800 dark:text-white">
                                Rp 500.000
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-medium text-slate-800 dark:text-white">
                                Rp 150.000
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 rounded-full text-xs font-bold border border-blue-100 dark:border-blue-500/20">
                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                                    Open
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button
                                    class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg text-slate-400 hover:text-indigo-500 transition">
                                    <i class="ph-bold ph-eye text-lg"></i>
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono">2</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-pink-100 dark:bg-pink-900/50 text-pink-600 dark:text-pink-300 flex items-center justify-center font-bold text-xs">
                                        RM
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-800 dark:text-white">Rina Melati</span>
                                        <span class="text-xs text-slate-400">Supervisor</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-700 dark:text-slate-300">15 Des 2025</span>
                                    <span class="text-xs text-slate-400">08:00 WIB</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-700 dark:text-slate-300">15 Des 2025</span>
                                    <span class="text-xs text-slate-400">21:00 WIB</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-medium text-slate-800 dark:text-white">
                                Rp 5.850.000
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-medium text-slate-800 dark:text-white">
                                Rp 3.100.000
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-medium text-slate-800 dark:text-white">
                                Rp 0
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-medium text-slate-800 dark:text-white">
                                Rp 0
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="inline-flex items-center px-3 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-full text-xs font-bold border border-slate-200 dark:border-slate-600">
                                    Closed
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button
                                    class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg text-slate-400 hover:text-indigo-500 transition">
                                    <i class="ph-bold ph-eye text-lg"></i>
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono">3</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-amber-100 dark:bg-amber-900/50 text-amber-600 dark:text-amber-300 flex items-center justify-center font-bold text-xs">
                                        BS
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-800 dark:text-white">Budi Santoso</span>
                                        <span class="text-xs text-slate-400">Kasir</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-700 dark:text-slate-300">14 Des 2025</span>
                                    <span class="text-xs text-slate-400">14:00 WIB</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-700 dark:text-slate-300">14 Des 2025</span>
                                    <span class="text-xs text-slate-400">22:00 WIB</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-medium text-slate-800 dark:text-white">
                                Rp 1.150.000
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-medium text-slate-800 dark:text-white">
                                Rp 800.000
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-medium text-slate-800 dark:text-white">
                                Rp 1.500.000
                            </td>
                            <td class="px-6 py-4 text-right font-mono font-medium text-slate-800 dark:text-white">
                                Rp 50.000
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="inline-flex items-center px-3 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-full text-xs font-bold border border-slate-200 dark:border-slate-600">
                                    Closed
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button
                                    class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg text-slate-400 hover:text-indigo-500 transition">
                                    <i class="ph-bold ph-eye text-lg"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div
                class="px-6 py-4 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">1-10</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">128</span> data
                </p>

                <div class="flex items-center gap-2">
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-700 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition disabled:opacity-50"
                        disabled>
                        <i class="ph-bold ph-caret-left"></i>
                    </button>

                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-indigo-500 text-white font-bold text-sm shadow-md shadow-indigo-500/20">
                        1
                    </button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-400 font-bold text-sm transition">
                        2
                    </button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-400 font-bold text-sm transition">
                        3
                    </button>
                    <span class="text-slate-400">...</span>

                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-700 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        <i class="ph-bold ph-caret-right"></i>
                    </button>
                </div>
            </div>

        </div>
    </section>
@endsection
