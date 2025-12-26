@extends('layouts.admin')

@section('title', 'Produk Impor - Hanania POS')

@section('content')
    <section id="import-product" class="page-section active max-w-7xl mx-auto">

        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Import Data Produk
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Upload data produk massal melalui file CSV
                </p>
            </div>
            <button type="button"
                class="flex items-center gap-2 px-5 py-2.5 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 font-bold rounded-xl border border-indigo-100 dark:border-indigo-500/20 hover:bg-indigo-100 dark:hover:bg-indigo-500/20 transition">
                <i class="ph-bold ph-info"></i>
                <span>Produk Info</span>
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2 space-y-6">
                <div
                    class="bg-white dark:bg-darkCard p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">

                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-8">
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-3">
                                Upload File CSV
                            </label>
                            <div class="relative w-full group">
                                <input type="file" name="csv_file" id="csv_file" accept=".csv" class="hidden" />
                                <label for="csv_file"
                                    class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-slate-300 dark:border-slate-600 rounded-2xl cursor-pointer bg-slate-50 dark:bg-slate-700/30 hover:bg-indigo-50 dark:hover:bg-slate-700 hover:border-indigo-400 dark:hover:border-indigo-400 transition duration-300">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <div
                                            class="w-12 h-12 mb-3 bg-white dark:bg-slate-600 rounded-full shadow-sm flex items-center justify-center text-indigo-500 group-hover:scale-110 transition duration-300">
                                            <i class="ph-fill ph-upload-simple text-2xl"></i>
                                        </div>
                                        <p class="mb-2 text-sm text-slate-600 dark:text-slate-300 font-medium">
                                            <span class="font-bold text-indigo-500">Klik untuk upload</span> atau drag &
                                            drop
                                        </p>
                                        <p class="text-xs text-slate-400 dark:text-slate-500">
                                            Format CSV (Maks. 5MB)
                                        </p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label for="category"
                                    class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                                    Kategori Produk
                                </label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                        <i class="ph-bold ph-tag"></i>
                                    </div>
                                    <select id="category" name="category_id"
                                        class="w-full pl-10 pr-4 py-3 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-slate-700 dark:text-slate-200 appearance-none transition">
                                        <option value="" disabled selected>Pilih Kategori...</option>
                                        <option value="1">Pakaian Pria</option>
                                        <option value="2">Pakaian Wanita</option>
                                        <option value="3">Aksesoris</option>
                                        <option value="4">Sepatu</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                                        <i class="ph-bold ph-caret-down"></i>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="warehouse"
                                    class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                                    Pilih Gudang
                                </label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                        <i class="ph-bold ph-warehouse"></i>
                                    </div>
                                    <select id="warehouse" name="warehouse_id"
                                        class="w-full pl-10 pr-4 py-3 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-slate-700 dark:text-slate-200 appearance-none transition">
                                        <option value="" disabled selected>Pilih Lokasi Gudang...</option>
                                        <option value="jkt">Gudang Jakarta Pusat</option>
                                        <option value="sby">Gudang Surabaya</option>
                                        <option value="bdg">Gudang Bandung</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                                        <i class="ph-bold ph-caret-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 pt-4 border-t border-slate-100 dark:border-slate-700/50">
                            <button type="submit"
                                class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/40 transform hover:-translate-y-0.5 transition duration-200 flex items-center justify-center gap-2">
                                <i class="ph-bold ph-check-circle text-lg"></i>
                                Proses Data Import
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="space-y-6">
                <div
                    class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-3xl p-6 text-white shadow-lg shadow-indigo-500/20">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                            <i class="ph-fill ph-file-csv text-2xl"></i>
                        </div>
                        <span class="bg-white/20 px-2 py-1 rounded text-xs font-bold backdrop-blur-sm">Wajib</span>
                    </div>
                    <h3 class="font-display font-bold text-xl mb-2">Template CSV</h3>
                    <p class="text-indigo-100 text-sm mb-6 leading-relaxed">
                        Gunakan template standar kami agar proses import data berjalan lancar tanpa error format.
                    </p>
                    <button
                        class="w-full bg-white text-indigo-600 font-bold py-3 rounded-xl hover:bg-indigo-50 transition flex items-center justify-center gap-2">
                        <i class="ph-bold ph-download-simple"></i>
                        Download Template
                    </button>
                </div>

                <div
                    class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                        <i class="ph-fill ph-clock-counter-clockwise text-slate-400"></i>
                        Riwayat Import
                    </h3>
                    <div class="space-y-4">
                        <div
                            class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700/50 transition border border-transparent hover:border-slate-100 dark:hover:border-slate-600">
                            <div
                                class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                                <i class="ph-bold ph-check"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-bold text-slate-800 dark:text-white text-sm truncate">Batch_Shoes_001.csv
                                </h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400">150 item • 2 jam lalu</p>
                            </div>
                        </div>

                        <div
                            class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700/50 transition border border-transparent hover:border-slate-100 dark:hover:border-slate-600">
                            <div
                                class="w-10 h-10 rounded-full bg-amber-100 dark:bg-amber-500/20 text-amber-600 dark:text-amber-400 flex items-center justify-center shrink-0">
                                <i class="ph-bold ph-warning"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-bold text-slate-800 dark:text-white text-sm truncate">Winter_Collection.csv
                                </h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Gagal Format • Kemarin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
