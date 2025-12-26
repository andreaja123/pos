@extends('layouts.admin')

@section('title', 'Ekspor Produk - Hanania POS')

@section('content')
    <section id="export-products" class="page-section active max-w-7xl mx-auto">

        <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Ekspor Data Produk
                </h2>
                <p class="text-slate-500 dark:text-slate-400 mt-1">
                    Unduh laporan stok dan data produk dalam format digital.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2">
                <div
                    class="bg-white dark:bg-darkCard p-6 md:p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">

                    <form action="#" method="POST">
                        <div class="mb-8">
                            <h3
                                class="flex items-center gap-2 font-display font-bold text-lg text-slate-800 dark:text-white mb-6">
                                <i class="ph-fill ph-funnel text-indigo-500 text-xl"></i>
                                Filter Data
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-600 dark:text-slate-300">Kategori
                                        Produk</label>
                                    <div class="relative">
                                        <select
                                            class="w-full pl-4 pr-10 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none cursor-pointer">
                                            <option value="all">Semua Kategori</option>
                                            <option value="clothing">Pakaian Anak</option>
                                            <option value="accessories">Aksesoris</option>
                                            <option value="shoes">Sepatu</option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-500">
                                            <i class="ph-bold ph-caret-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-600 dark:text-slate-300">Status Stok</label>
                                    <div class="relative">
                                        <select
                                            class="w-full pl-4 pr-10 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none cursor-pointer">
                                            <option value="all">Semua Stok</option>
                                            <option value="low">Stok Menipis (< 10)</option>
                                            <option value="out">Stok Habis (0)</option>
                                            <option value="available">Tersedia</option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-500">
                                            <i class="ph-bold ph-caret-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="md:col-span-2 space-y-2">
                                    <label class="text-sm font-bold text-slate-600 dark:text-slate-300">Cari Produk Spesifik
                                        (Opsional)</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                            <i class="ph-bold ph-magnifying-glass"></i>
                                        </div>
                                        <input type="text" placeholder="Ketik nama produk atau SKU..."
                                            class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="border-slate-100 dark:border-slate-700 my-8">

                        <div class="mb-8">
                            <h3
                                class="flex items-center gap-2 font-display font-bold text-lg text-slate-800 dark:text-white mb-6">
                                <i class="ph-fill ph-file-text text-indigo-500 text-xl"></i>
                                Format File
                            </h3>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <label class="cursor-pointer group">
                                    <input type="radio" name="format" value="excel" class="peer sr-only" checked>
                                    <div
                                        class="p-4 rounded-2xl border-2 border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/50 peer-checked:border-green-500 peer-checked:bg-green-50 dark:peer-checked:bg-green-900/20 transition-all duration-200">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-12 h-12 rounded-xl bg-green-100 dark:bg-green-900/50 text-green-600 dark:text-green-400 flex items-center justify-center text-2xl">
                                                <i class="ph-fill ph-microsoft-excel-logo"></i>
                                            </div>
                                            <div>
                                                <h4
                                                    class="font-bold text-slate-800 dark:text-white group-hover:text-green-700 dark:group-hover:text-green-400 transition">
                                                    Excel (.xlsx)</h4>
                                                <p class="text-xs text-slate-500 dark:text-slate-400">Cocok untuk olah data
                                                    lanjut</p>
                                            </div>
                                            <div class="ml-auto opacity-0 peer-checked:opacity-100 text-green-500">
                                                <i class="ph-fill ph-check-circle text-xl"></i>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <label class="cursor-pointer group">
                                    <input type="radio" name="format" value="pdf" class="peer sr-only">
                                    <div
                                        class="p-4 rounded-2xl border-2 border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/50 peer-checked:border-red-500 peer-checked:bg-red-50 dark:peer-checked:bg-red-900/20 transition-all duration-200">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-12 h-12 rounded-xl bg-red-100 dark:bg-red-900/50 text-red-600 dark:text-red-400 flex items-center justify-center text-2xl">
                                                <i class="ph-fill ph-file-pdf"></i>
                                            </div>
                                            <div>
                                                <h4
                                                    class="font-bold text-slate-800 dark:text-white group-hover:text-red-700 dark:group-hover:text-red-400 transition">
                                                    PDF Document</h4>
                                                <p class="text-xs text-slate-500 dark:text-slate-400">Siap cetak dan
                                                    presentasi</p>
                                            </div>
                                            <div class="ml-auto opacity-0 peer-checked:opacity-100 text-red-500">
                                                <i class="ph-fill ph-check-circle text-xl"></i>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="button"
                                class="w-full md:w-auto px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 dark:shadow-none hover:-translate-y-1 transition duration-300 flex items-center justify-center gap-2">
                                <i class="ph-bold ph-download-simple text-xl"></i>
                                <span>Proses Ekspor File</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-3xl p-6 text-white shadow-lg">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur-sm">
                            <i class="ph-bold ph-info text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg mb-1">Tips Ekspor</h4>
                            <p class="text-indigo-100 text-sm leading-relaxed">
                                Gunakan format Excel jika Anda ingin mengedit data stok secara massal untuk diimpor kembali
                                nanti.
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-100 dark:border-slate-700">
                        <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                            Riwayat Ekspor
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            File tersedia selama 24 jam
                        </p>
                    </div>

                    <div class="divide-y divide-slate-100 dark:divide-slate-700">
                        <div class="p-4 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition group">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-green-100 dark:bg-green-900/50 text-green-600 dark:text-green-400 flex items-center justify-center">
                                        <i class="ph-fill ph-microsoft-excel-logo"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-sm text-slate-700 dark:text-slate-200">
                                            Laporan_Stok_Des.xlsx</p>
                                        <p class="text-[10px] text-slate-400">10 Menit yang lalu</p>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="w-full mt-2 py-1.5 rounded-lg border border-slate-200 dark:border-slate-600 text-xs font-bold text-slate-600 dark:text-slate-300 group-hover:bg-white dark:group-hover:bg-slate-600 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition flex items-center justify-center gap-1">
                                <i class="ph-bold ph-download-simple"></i> Download Ulang
                            </button>
                        </div>

                        <div class="p-4 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition group">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-red-100 dark:bg-red-900/50 text-red-600 dark:text-red-400 flex items-center justify-center">
                                        <i class="ph-fill ph-file-pdf"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-sm text-slate-700 dark:text-slate-200">
                                            Katalog_Anak_2025.pdf</p>
                                        <p class="text-[10px] text-slate-400">Kemarin, 14:30</p>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="w-full mt-2 py-1.5 rounded-lg border border-slate-200 dark:border-slate-600 text-xs font-bold text-slate-600 dark:text-slate-300 group-hover:bg-white dark:group-hover:bg-slate-600 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition flex items-center justify-center gap-1">
                                <i class="ph-bold ph-download-simple"></i> Download Ulang
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
