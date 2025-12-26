@extends('layouts.admin')

@section('title', 'Backup Database - Hanania POS')

@section('content')
    <section id="backup-database" class="page-section active max-w-7xl mx-auto">

        <div class="mb-8">
            <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white mb-2">
                Cadangkan & Pulihkan
            </h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">
                Kelola keamanan data aplikasi Hanania POS anda di sini.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <div
                class="lg:col-span-2 bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none overflow-hidden relative group">
                <div
                    class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-indigo-50 dark:bg-indigo-500/10 rounded-full blur-3xl opacity-50 pointer-events-none">
                </div>

                <div class="p-8 flex flex-col md:flex-row items-center gap-8 relative z-10">
                    <div
                        class="w-32 h-32 bg-indigo-50 dark:bg-indigo-500/10 rounded-full flex items-center justify-center flex-shrink-0 border-4 border-indigo-100 dark:border-indigo-500/20">
                        <i class="ph-duotone ph-database text-6xl text-indigo-600 dark:text-indigo-400"></i>
                    </div>

                    <div class="flex-1 text-center md:text-left">
                        <h3 class="text-xl font-display font-bold text-slate-800 dark:text-white mb-2">
                            Buat Cadangan Database Baru
                        </h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm mb-6 leading-relaxed">
                            Proses ini akan menyimpan seluruh data transaksi, produk, dan pelanggan saat ini. Disarankan
                            untuk melakukan backup sebelum melakukan update sistem.
                        </p>

                        <div class="flex flex-col sm:flex-row items-center gap-4 justify-center md:justify-start">
                            <button
                                class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-lg shadow-indigo-200/50 dark:shadow-none hover:-translate-y-0.5 transition duration-300 flex items-center gap-2 w-full sm:w-auto justify-center">
                                <i class="ph-bold ph-cloud-arrow-up text-xl"></i>
                                <span>Proses Cadangkan Sekarang</span>
                            </button>

                            <span class="text-xs text-slate-400 font-medium">
                                <i class="ph-fill ph-clock mr-1"></i> Estimasi: ±15 detik
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none flex flex-col justify-between">
                <div>
                    <h3 class="font-display font-bold text-slate-800 dark:text-white mb-6 flex items-center gap-2">
                        <i class="ph-fill ph-hard-drives text-indigo-500"></i> Status Penyimpanan
                    </h3>

                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-slate-500 dark:text-slate-400">Terakhir Backup</span>
                                <span class="font-bold text-slate-800 dark:text-white">Hari ini, 08:30</span>
                            </div>
                            <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full overflow-hidden">
                                <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-slate-500 dark:text-slate-400">Total File Backup</span>
                                <span class="font-bold text-slate-800 dark:text-white">12 File</span>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-slate-500 dark:text-slate-400">Ukuran Total</span>
                                <span class="font-bold text-slate-800 dark:text-white">45.2 MB</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 pt-6 border-t border-slate-100 dark:border-slate-700">
                    <div
                        class="bg-amber-50 dark:bg-amber-500/10 p-4 rounded-xl border border-amber-100 dark:border-amber-500/20">
                        <div class="flex gap-3">
                            <i class="ph-fill ph-warning-circle text-amber-500 text-xl mt-0.5"></i>
                            <p class="text-xs text-amber-700 dark:text-amber-400 leading-relaxed font-medium">
                                Pastikan untuk mengunduh file backup ke penyimpanan lokal (PC/Laptop) secara berkala untuk
                                keamanan ganda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div>
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Riwayat Backup
                    </h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Daftar file database yang tersimpan di server
                    </p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold">Nama File</th>
                            <th class="px-6 py-4 font-bold">Tanggal & Waktu</th>
                            <th class="px-6 py-4 font-bold">Ukuran</th>
                            <th class="px-6 py-4 font-bold">Tipe</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-300 flex items-center justify-center">
                                        <i class="ph-fill ph-file-sql text-xl"></i>
                                    </div>
                                    <span
                                        class="font-bold text-slate-800 dark:text-slate-200 font-mono">backup_2023_12_16.sql</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                16 Des 2025, 19:30
                            </td>
                            <td class="px-6 py-4 font-medium">
                                4.2 MB
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30">
                                    Manual
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button
                                        class="w-8 h-8 rounded-lg bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 flex items-center justify-center hover:bg-indigo-100 dark:hover:bg-indigo-500/30 transition"
                                        title="Download">
                                        <i class="ph-bold ph-download-simple"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded-lg bg-red-50 dark:bg-red-500/20 text-red-600 dark:text-red-400 flex items-center justify-center hover:bg-red-100 dark:hover:bg-red-500/30 transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-300 flex items-center justify-center">
                                        <i class="ph-fill ph-file-sql text-xl"></i>
                                    </div>
                                    <span
                                        class="font-bold text-slate-800 dark:text-slate-200 font-mono">backup_auto_2023_12_15.sql</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                15 Des 2025, 00:00
                            </td>
                            <td class="px-6 py-4 font-medium">
                                4.1 MB
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-blue-100 dark:bg-blue-500/20 text-blue-700 dark:text-blue-400 rounded-full text-xs font-bold border border-blue-200 dark:border-blue-500/30">
                                    Otomatis
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button
                                        class="w-8 h-8 rounded-lg bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 flex items-center justify-center hover:bg-indigo-100 dark:hover:bg-indigo-500/30 transition"
                                        title="Download">
                                        <i class="ph-bold ph-download-simple"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded-lg bg-red-50 dark:bg-red-500/20 text-red-600 dark:text-red-400 flex items-center justify-center hover:bg-red-100 dark:hover:bg-red-500/30 transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-100 dark:border-slate-700 flex justify-center">
                <button class="text-sm font-bold text-slate-500 hover:text-indigo-600 transition">Lihat Semua
                    Riwayat</button>
            </div>
        </div>
    </section>
@endsection
