@extends('layouts.admin')

@section('title', 'Ekspor Transaksi - Hanania POS')

@section('content')
    <section id="export-page" class="max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="font-display font-bold text-2xl text-slate-800 dark:text-white mb-1">
                    Ekspor Data Transaksi
                </h1>
                <p class="text-slate-500 dark:text-slate-400 text-sm">
                    Unduh laporan transaksi dalam format pilihan Anda.
                </p>
            </div>

            <div class="hidden md:block">
                <span
                    class="px-4 py-2 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 rounded-xl text-sm font-bold border border-indigo-100 dark:border-indigo-500/20">
                    <i class="ph-bold ph-calendar-check mr-2"></i>
                    Hari ini: {{ date('d M Y') }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div
                    class="bg-white dark:bg-darkCard p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">

                    <form action="#" method="POST">
                        @csrf
                        <div class="space-y-6">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300 ml-1">Akun /
                                        Rekening</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                            <i class="ph-bold ph-wallet"></i>
                                        </div>
                                        <select
                                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition appearance-none cursor-pointer">
                                            <option value="all">Semua Akun</option>
                                            <option value="bca">BCA - 882910</option>
                                            <option value="mandiri">Mandiri - 11029</option>
                                            <option value="cash">Kas Tunai</option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                                            <i class="ph-bold ph-caret-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300 ml-1">Tipe
                                        Transaksi</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                            <i class="ph-bold ph-tag"></i>
                                        </div>
                                        <select
                                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition appearance-none cursor-pointer">
                                            <option value="all">Semua Tipe</option>
                                            <option value="income">Pemasukan (Penjualan)</option>
                                            <option value="expense">Pengeluaran</option>
                                            <option value="refund">Refund / Retur</option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                                            <i class="ph-bold ph-caret-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="border-slate-100 dark:border-slate-700">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300 ml-1">Dari
                                        Tanggal</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                            <i class="ph-bold ph-calendar-blank"></i>
                                        </div>
                                        <input type="date"
                                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                                            value="{{ date('Y-m-01') }}">
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300 ml-1">Sampai
                                        Tanggal</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                            <i class="ph-bold ph-calendar-check"></i>
                                        </div>
                                        <input type="date"
                                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                                            value="{{ date('Y-m-d') }}">
                                    </div>
                                    <p class="text-xs text-slate-400 text-right italic mt-1">*Default: Hari ini</p>
                                </div>
                            </div>

                            <div class="pt-4">
                                <label class="text-sm font-bold text-slate-700 dark:text-slate-300 ml-1 mb-3 block">Format
                                    File</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <label class="cursor-pointer group">
                                        <input type="radio" name="format" value="excel" class="peer sr-only" checked>
                                        <div
                                            class="p-4 rounded-2xl border-2 border-slate-100 dark:border-slate-700 bg-white dark:bg-slate-800 peer-checked:border-green-500 peer-checked:bg-green-50 dark:peer-checked:bg-green-900/20 transition hover:border-slate-300 dark:hover:border-slate-600">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xl">
                                                    <i class="ph-fill ph-microsoft-excel-logo"></i>
                                                </div>
                                                <div>
                                                    <h4 class="font-bold text-slate-700 dark:text-white text-sm">Excel
                                                        (.xlsx)</h4>
                                                    <p class="text-xs text-slate-500 dark:text-slate-400">Lengkap dengan
                                                        detail</p>
                                                </div>
                                                <div class="ml-auto opacity-0 peer-checked:opacity-100 text-green-500">
                                                    <i class="ph-bold ph-check-circle text-xl"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="cursor-pointer group">
                                        <input type="radio" name="format" value="pdf" class="peer sr-only">
                                        <div
                                            class="p-4 rounded-2xl border-2 border-slate-100 dark:border-slate-700 bg-white dark:bg-slate-800 peer-checked:border-red-500 peer-checked:bg-red-50 dark:peer-checked:bg-red-900/20 transition hover:border-slate-300 dark:hover:border-slate-600">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-10 h-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center text-xl">
                                                    <i class="ph-fill ph-file-pdf"></i>
                                                </div>
                                                <div>
                                                    <h4 class="font-bold text-slate-700 dark:text-white text-sm">PDF
                                                        Document</h4>
                                                    <p class="text-xs text-slate-500 dark:text-slate-400">Siap cetak</p>
                                                </div>
                                                <div class="ml-auto opacity-0 peer-checked:opacity-100 text-red-500">
                                                    <i class="ph-bold ph-check-circle text-xl"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 dark:shadow-none hover:-translate-y-1 transition duration-300 flex items-center justify-center gap-2 mt-4">
                                <i class="ph-bold ph-download-simple text-xl"></i>
                                Ekspor Transaksi
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-indigo-600 rounded-3xl p-6 text-white relative overflow-hidden shadow-lg">
                    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                    <div class="absolute bottom-0 left-0 -ml-8 -mb-8 w-32 h-32 bg-indigo-400/20 rounded-full blur-2xl">
                    </div>

                    <div class="relative z-10">
                        <div
                            class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-4 backdrop-blur-sm">
                            <i class="ph-fill ph-info text-2xl"></i>
                        </div>
                        <h3 class="font-display font-bold text-lg mb-2">Informasi Ekspor</h3>
                        <p class="text-indigo-100 text-sm leading-relaxed mb-4">
                            Proses ekspor mungkin memakan waktu beberapa detik tergantung jumlah data transaksi pada rentang
                            tanggal yang dipilih.
                        </p>
                        <div
                            class="text-xs font-mono bg-indigo-800/30 p-3 rounded-lg border border-indigo-500/30 text-indigo-200">
                            Limit baris: 5.000 / file
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6">
                    <h3
                        class="font-display font-bold text-slate-800 dark:text-white text-sm mb-4 flex items-center justify-between">
                        <span>Riwayat Unduhan</span>
                        <i class="ph-bold ph-clock-counter-clockwise text-slate-400"></i>
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3 group cursor-pointer">
                            <div
                                class="w-10 h-10 rounded-lg bg-green-50 text-green-600 flex items-center justify-center group-hover:bg-green-100 transition">
                                <i class="ph-fill ph-file-xls text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h4
                                    class="font-bold text-slate-700 dark:text-slate-200 text-xs group-hover:text-green-600 transition">
                                    Laporan_Nov_2023.xlsx</h4>
                                <p class="text-[10px] text-slate-400">12 Des 2023 • 14:30 WIB</p>
                            </div>
                            <div class="text-slate-300">
                                <i class="ph-bold ph-download-simple"></i>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 group cursor-pointer">
                            <div
                                class="w-10 h-10 rounded-lg bg-red-50 text-red-600 flex items-center justify-center group-hover:bg-red-100 transition">
                                <i class="ph-fill ph-file-pdf text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h4
                                    class="font-bold text-slate-700 dark:text-slate-200 text-xs group-hover:text-red-600 transition">
                                    Rekap_Penjualan.pdf</h4>
                                <p class="text-[10px] text-slate-400">10 Des 2023 • 09:15 WIB</p>
                            </div>
                            <div class="text-slate-300">
                                <i class="ph-bold ph-download-simple"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
