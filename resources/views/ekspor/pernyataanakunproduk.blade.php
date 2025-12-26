@extends('layouts.admin')

@section('title', 'Pernyataan Akun Produk - Hanania POS')

@section('content')
    <section id="product-statement" class="page-section active max-w-7xl mx-auto">

        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Pernyataan Akun Produk
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                    Upload data produk via CSV dan atur keamanan akses akun.
                </p>
            </div>
            <button class="flex items-center gap-2 text-slate-500 hover:text-indigo-600 transition text-sm font-bold">
                <i class="ph-bold ph-arrow-left"></i>
                Kembali ke Dashboard
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-6">
                <form action="#" method="POST" enctype="multipart/form-data"
                    class="bg-white dark:bg-darkCard p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                    @csrf

                    <div class="mb-8">
                        <label class="block text-slate-700 dark:text-slate-300 font-bold mb-3 text-sm">
                            Upload File CSV
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="relative group">
                            <input type="file" name="csv_file" accept=".csv"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />
                            <div
                                class="border-2 border-dashed border-slate-200 dark:border-slate-600 group-hover:border-indigo-500 dark:group-hover:border-indigo-400 rounded-2xl p-8 text-center transition duration-300 bg-slate-50 dark:bg-slate-800/50 group-hover:bg-indigo-50/30 dark:group-hover:bg-indigo-900/10">
                                <div
                                    class="w-16 h-16 mx-auto bg-white dark:bg-slate-700 rounded-full shadow-sm flex items-center justify-center mb-4 group-hover:scale-110 transition duration-300">
                                    <i class="ph-duotone ph-file-csv text-3xl text-indigo-500"></i>
                                </div>
                                <h4 class="text-slate-800 dark:text-white font-bold mb-1">
                                    Klik atau tarik file CSV ke sini
                                </h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400">
                                    Maksimal ukuran file 5MB. Format: .csv
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8" x-data="{ passwordType: 'random' }">
                        <label class="block text-slate-700 dark:text-slate-300 font-bold mb-3 text-sm">
                            Pengaturan Password Akun
                        </label>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                            <label class="cursor-pointer relative">
                                <input type="radio" name="password_type" value="random" class="peer sr-only"
                                    x-model="passwordType">
                                <div
                                    class="p-4 rounded-xl border-2 border-slate-100 dark:border-slate-700 hover:border-indigo-200 bg-white dark:bg-slate-800 peer-checked:border-indigo-500 peer-checked:bg-indigo-50/30 dark:peer-checked:bg-indigo-900/20 transition-all duration-200">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-orange-100 dark:bg-orange-500/20 text-orange-600 dark:text-orange-400 flex items-center justify-center">
                                            <i class="ph-bold ph-shuffle"></i>
                                        </div>
                                        <span class="font-bold text-slate-700 dark:text-slate-200 text-sm">Generate
                                            Acak</span>
                                    </div>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                                        Sistem akan membuat password unik otomatis untuk setiap akun.
                                    </p>
                                </div>
                                <div
                                    class="absolute top-4 right-4 text-indigo-500 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <i class="ph-fill ph-check-circle text-xl"></i>
                                </div>
                            </label>

                            <label class="cursor-pointer relative">
                                <input type="radio" name="password_type" value="manual" class="peer sr-only"
                                    x-model="passwordType">
                                <div
                                    class="p-4 rounded-xl border-2 border-slate-100 dark:border-slate-700 hover:border-indigo-200 bg-white dark:bg-slate-800 peer-checked:border-indigo-500 peer-checked:bg-indigo-50/30 dark:peer-checked:bg-indigo-900/20 transition-all duration-200">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-emerald-100 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center">
                                            <i class="ph-bold ph-lock-key"></i>
                                        </div>
                                        <span class="font-bold text-slate-700 dark:text-slate-200 text-sm">Set Manual</span>
                                    </div>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                                        Tentukan satu password default untuk semua akun yang diupload.
                                    </p>
                                </div>
                                <div
                                    class="absolute top-4 right-4 text-indigo-500 opacity-0 peer-checked:opacity-100 transition-opacity">
                                    <i class="ph-fill ph-check-circle text-xl"></i>
                                </div>
                            </label>
                        </div>

                        <div x-show="passwordType === 'manual'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0" class="mt-4">
                            <label class="block text-xs font-bold text-slate-500 mb-2 uppercase tracking-wider">Password
                                Default</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <i class="ph-bold ph-key"></i>
                                </span>
                                <input type="password" name="manual_password" placeholder="Masukkan password default..."
                                    class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 dark:text-white placeholder-slate-400 transition" />
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-100 dark:border-slate-700 flex justify-end gap-3">
                        <button type="button"
                            class="px-6 py-3 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm shadow-lg shadow-indigo-200/50 dark:shadow-none transition transform active:scale-95">
                            Proses Pernyataan
                        </button>
                    </div>
                </form>
            </div>

            <div class="lg:col-span-1">
                <div
                    class="bg-indigo-50 dark:bg-slate-800/50 p-6 rounded-3xl border border-indigo-100 dark:border-slate-700 sticky top-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-white dark:bg-slate-700 text-indigo-600 flex items-center justify-center shadow-sm">
                            <i class="ph-fill ph-info"></i>
                        </div>
                        <h3 class="font-display font-bold text-slate-800 dark:text-white">
                            Panduan Upload
                        </h3>
                    </div>

                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-sm text-slate-600 dark:text-slate-300">
                            <i class="ph-bold ph-check text-emerald-500 mt-0.5"></i>
                            <span>Pastikan header CSV sesuai format: <code>nama_produk</code>, <code>sku</code>,
                                <code>stok_awal</code>.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-600 dark:text-slate-300">
                            <i class="ph-bold ph-check text-emerald-500 mt-0.5"></i>
                            <span>Maksimal 500 baris data dalam sekali upload untuk kinerja optimal.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-600 dark:text-slate-300">
                            <i class="ph-bold ph-warning text-orange-500 mt-0.5"></i>
                            <span>Jika memilih <b>Password Manual</b>, pastikan password cukup kuat (min. 8
                                karakter).</span>
                        </li>
                    </ul>

                    <div class="mt-6 pt-6 border-t border-indigo-100 dark:border-slate-700">
                        <a href="#"
                            class="flex items-center justify-between group p-3 rounded-xl bg-white dark:bg-slate-700 border border-indigo-100 dark:border-slate-600 hover:border-indigo-300 transition">
                            <div class="flex items-center gap-3">
                                <i class="ph-file-csv text-2xl text-emerald-600"></i>
                                <div class="text-left">
                                    <p class="text-xs font-bold text-slate-800 dark:text-white">Download Template</p>
                                    <p class="text-[10px] text-slate-500">template_produk.csv</p>
                                </div>
                            </div>
                            <i class="ph-bold ph-download-simple text-slate-400 group-hover:text-indigo-600"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
