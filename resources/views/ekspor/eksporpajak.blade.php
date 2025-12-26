@extends('layouts.admin')

@section('title', 'Ekspor Pajak - Hanania POS')

@section('content')
    <section id="tax-export" class="page-section active max-w-7xl mx-auto">
        
        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Ekspor Laporan Pajak
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm">
                    Unduh rekapitulasi pajak untuk pelaporan keuangan
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <div class="lg:col-span-2 bg-white dark:bg-darkCard p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-file-text text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                            Parameter Laporan
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            Pilih rentang waktu data yang ingin ditarik
                        </p>
                    </div>
                </div>

                <form action="#" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 dark:text-slate-300">
                                Dari Tanggal
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <i class="ph-bold ph-calendar-blank"></i>
                                </span>
                                <input type="date" 
                                    class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-500/30 text-slate-700 dark:text-white font-medium transition outline-none"
                                    required>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 dark:text-slate-300">
                                Sampai Tanggal
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <i class="ph-bold ph-calendar-blank"></i>
                                </span>
                                <input type="date" 
                                    class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-500/30 text-slate-700 dark:text-white font-medium transition outline-none"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-sm font-bold text-slate-700 dark:text-slate-300">
                            Format Dokumen
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="cursor-pointer relative">
                                <input type="radio" name="format" value="excel" class="peer sr-only" checked>
                                <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-600 peer-checked:border-indigo-500 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-500/20 peer-checked:text-indigo-700 dark:peer-checked:text-indigo-300 flex items-center gap-3 transition hover:bg-slate-50 dark:hover:bg-slate-700">
                                    <i class="ph-fill ph-file-xls text-2xl text-emerald-500"></i>
                                    <span class="font-bold text-sm">Excel (.xlsx)</span>
                                </div>
                                <div class="absolute top-4 right-4 text-indigo-500 opacity-0 peer-checked:opacity-100 transition">
                                    <i class="ph-fill ph-check-circle"></i>
                                </div>
                            </label>

                            <label class="cursor-pointer relative">
                                <input type="radio" name="format" value="pdf" class="peer sr-only">
                                <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-600 peer-checked:border-indigo-500 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-500/20 peer-checked:text-indigo-700 dark:peer-checked:text-indigo-300 flex items-center gap-3 transition hover:bg-slate-50 dark:hover:bg-slate-700">
                                    <i class="ph-fill ph-file-pdf text-2xl text-red-500"></i>
                                    <span class="font-bold text-sm">PDF Document</span>
                                </div>
                                <div class="absolute top-4 right-4 text-indigo-500 opacity-0 peer-checked:opacity-100 transition">
                                    <i class="ph-fill ph-check-circle"></i>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100 dark:border-slate-700 flex justify-end">
                        <button type="submit" class="w-full md:w-auto px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-lg shadow-indigo-500/30 transition flex items-center justify-center gap-2">
                            <i class="ph-bold ph-download-simple"></i>
                            <span>Generate Laporan</span>
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-indigo-600 rounded-3xl p-8 text-white shadow-lg shadow-indigo-500/30 flex flex-col justify-between relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8 opacity-10 pointer-events-none">
                    <i class="ph-fill ph-receipt text-9xl transform rotate-12"></i>
                </div>

                <div class="relative z-10">
                    <h3 class="text-xl font-display font-bold mb-2">Informasi Pajak</h3>
                    <p class="text-indigo-100 text-sm leading-relaxed mb-6">
                        Laporan pajak yang diunduh mencakup PPN masukan dan keluaran berdasarkan transaksi yang tercatat di sistem pada periode yang dipilih.
                    </p>
                    
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/20 mb-4">
                        <div class="flex items-start gap-3">
                            <i class="ph-fill ph-info text-xl text-yellow-300 mt-0.5"></i>
                            <div>
                                <p class="font-bold text-sm mb-1">Catatan Penting</p>
                                <p class="text-xs text-indigo-100">Pastikan semua transaksi harian telah ditutup (closing) sebelum melakukan ekspor data.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative z-10 mt-4">
                    <div class="text-xs font-medium text-indigo-200 uppercase tracking-wider mb-1">Status Sistem</div>
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 bg-emerald-400 rounded-full animate-pulse"></span>
                        <span class="font-bold">Siap Ekspor Data</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <div>
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Riwayat Ekspor
                    </h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        File yang di-generate dalam 30 hari terakhir
                    </p>
                </div>
                <button class="w-8 h-8 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-400 transition flex items-center justify-center">
                    <i class="ph-bold ph-arrows-clockwise text-xl"></i>
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold">Tanggal Request</th>
                            <th class="px-6 py-4 font-bold">Periode Data</th>
                            <th class="px-6 py-4 font-bold">Format</th>
                            <th class="px-6 py-4 font-bold">Oleh</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                <div class="font-bold text-slate-800 dark:text-slate-200">16 Des 2025</div>
                                <div class="text-xs text-slate-400">14:30 WIB</div>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-700 dark:text-slate-300">
                                01 Des - 15 Des 2025
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 text-xs font-bold border border-emerald-100 dark:border-emerald-500/20">
                                    <i class="ph-fill ph-file-xls"></i> Excel
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-600 overflow-hidden">
                                        <img src="https://ui-avatars.com/api/?name=Admin&background=random" alt="Admin">
                                    </div>
                                    <span>Admin</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-indigo-600 hover:text-indigo-800 dark:hover:text-indigo-400 font-bold text-xs flex items-center justify-end gap-1 ml-auto">
                                    <i class="ph-bold ph-download-simple"></i> Download
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                <div class="font-bold text-slate-800 dark:text-slate-200">01 Des 2025</div>
                                <div class="text-xs text-slate-400">09:15 WIB</div>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-700 dark:text-slate-300">
                                01 Nov - 30 Nov 2025
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-red-50 dark:bg-red-500/10 text-red-600 dark:text-red-400 text-xs font-bold border border-red-100 dark:border-red-500/20">
                                    <i class="ph-fill ph-file-pdf"></i> PDF
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-600 overflow-hidden">
                                        <img src="https://ui-avatars.com/api/?name=Budi&background=random" alt="Budi">
                                    </div>
                                    <span>Budi</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-indigo-600 hover:text-indigo-800 dark:hover:text-indigo-400 font-bold text-xs flex items-center justify-end gap-1 ml-auto">
                                    <i class="ph-bold ph-download-simple"></i> Download
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection