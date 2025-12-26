@extends('layouts.admin')

@section('title', 'Import Pelanggan - Hanania POS')

@section('content')
    {{-- Kita gunakan x-data untuk interaksi sederhana (show/hide password input) --}}
    <section x-data="{ passwordType: 'random', fileName: null }" id="import-pelanggan" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Import Pelanggan
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                    Upload data pelanggan massal menggunakan file CSV.
                </p>
            </div>

            <div class="flex gap-3">
                <button
                    class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition flex items-center gap-2">
                    <i class="ph-bold ph-download-simple text-lg"></i>
                    Download Template
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div
                class="lg:col-span-2 bg-white dark:bg-darkCard p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-8">
                        <label class="block text-slate-700 dark:text-slate-200 font-bold mb-3 font-display">
                            File CSV
                        </label>
                        <div class="relative group">
                            <input type="file" name="file_csv" id="file_csv" accept=".csv"
                                @change="fileName = $event.target.files[0].name"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div
                                class="border-2 border-dashed border-slate-300 dark:border-slate-600 rounded-2xl p-10 flex flex-col items-center justify-center text-center group-hover:border-indigo-500 group-hover:bg-indigo-50/30 dark:group-hover:bg-indigo-500/10 transition duration-300">
                                <div
                                    class="w-16 h-16 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition duration-300">
                                    <i class="ph-duotone ph-file-csv text-3xl"></i>
                                </div>

                                <h4 class="font-bold text-slate-800 dark:text-white text-lg mb-1">
                                    <span x-show="!fileName">Klik atau Drag file ke sini</span>
                                    <span x-show="fileName" x-text="fileName"
                                        class="text-indigo-600 dark:text-indigo-400"></span>
                                </h4>
                                <p class="text-slate-500 dark:text-slate-400 text-sm">
                                    Hanya format .CSV yang didukung (Maks 5MB)
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="w-full bg-slate-100 dark:bg-slate-700 h-px mb-8"></div>

                    <div class="mb-8">
                        <label class="block text-slate-700 dark:text-slate-200 font-bold mb-4 font-display">
                            Konfigurasi Password Akun
                        </label>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <label
                                class="cursor-pointer relative p-4 rounded-2xl border-2 transition duration-200 flex items-start gap-4"
                                :class="passwordType === 'random' ?
                                    'border-indigo-500 bg-indigo-50/30 dark:bg-indigo-500/10' :
                                    'border-slate-200 dark:border-slate-700 hover:border-slate-300'">
                                <input type="radio" name="password_option" value="random" class="hidden"
                                    x-model="passwordType">
                                <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center mt-0.5"
                                    :class="passwordType === 'random' ? 'border-indigo-500' : 'border-slate-300'">
                                    <div class="w-3 h-3 rounded-full bg-indigo-500" x-show="passwordType === 'random'">
                                    </div>
                                </div>
                                <div>
                                    <h5 class="font-bold text-slate-800 dark:text-white text-sm">Generate Random</h5>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">System akan membuat password
                                        acak untuk setiap user.</p>
                                </div>
                            </label>

                            <label
                                class="cursor-pointer relative p-4 rounded-2xl border-2 transition duration-200 flex items-start gap-4"
                                :class="passwordType === 'manual' ?
                                    'border-indigo-500 bg-indigo-50/30 dark:bg-indigo-500/10' :
                                    'border-slate-200 dark:border-slate-700 hover:border-slate-300'">
                                <input type="radio" name="password_option" value="manual" class="hidden"
                                    x-model="passwordType">
                                <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center mt-0.5"
                                    :class="passwordType === 'manual' ? 'border-indigo-500' : 'border-slate-300'">
                                    <div class="w-3 h-3 rounded-full bg-indigo-500" x-show="passwordType === 'manual'">
                                    </div>
                                </div>
                                <div>
                                    <h5 class="font-bold text-slate-800 dark:text-white text-sm">Set Manual Default</h5>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Tentukan satu password
                                        default untuk semua user.</p>
                                </div>
                            </label>
                        </div>

                        <div x-show="passwordType === 'manual'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            class="bg-slate-50 dark:bg-slate-800/50 p-6 rounded-2xl border border-slate-200 dark:border-slate-700">
                            <label class="block text-slate-600 dark:text-slate-300 text-sm font-bold mb-2">
                                Password Default
                            </label>
                            <div class="relative">
                                <input type="text" name="default_password"
                                    class="w-full px-4 py-3 rounded-xl bg-white dark:bg-darkCard border border-slate-300 dark:border-slate-600 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-500/20 outline-none text-slate-800 dark:text-white font-mono placeholder:text-slate-400 transition"
                                    placeholder="Contoh: Member2024!">
                                <i class="ph-bold ph-lock-key absolute right-4 top-3.5 text-slate-400"></i>
                            </div>
                            <p class="text-xs text-amber-500 mt-2 flex items-center gap-1">
                                <i class="ph-fill ph-warning-circle"></i>
                                User disarankan mengganti password saat login pertama.
                            </p>
                        </div>
                    </div>

                    <div
                        class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-slate-100 dark:border-slate-700">
                        <button type="button"
                            class="px-6 py-3 rounded-xl text-slate-500 dark:text-slate-400 font-bold text-sm hover:bg-slate-100 dark:hover:bg-slate-700 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-lg shadow-indigo-500/30 font-bold text-sm transition transform active:scale-95 flex items-center gap-2">
                            <i class="ph-bold ph-upload-simple"></i>
                            Proses Import
                        </button>
                    </div>
                </form>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div
                    class="bg-indigo-600 text-white p-6 rounded-3xl shadow-lg shadow-indigo-500/20 relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white opacity-10 rounded-full blur-2xl">
                    </div>
                    <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-20 h-20 bg-black opacity-10 rounded-full blur-2xl">
                    </div>

                    <h3 class="font-display font-bold text-lg mb-4 relative z-10">Panduan Import</h3>
                    <ul class="space-y-4 relative z-10 text-indigo-100 text-sm">
                        <li class="flex items-start gap-3">
                            <div
                                class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center flex-shrink-0 text-xs font-bold mt-0.5">
                                1</div>
                            <p>Pastikan format file sesuai dengan template.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center flex-shrink-0 text-xs font-bold mt-0.5">
                                2</div>
                            <p>Kolom <strong>Email</strong> harus unik dan belum terdaftar.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center flex-shrink-0 text-xs font-bold mt-0.5">
                                3</div>
                            <p>Data yang error akan dilewati secara otomatis.</p>
                        </li>
                    </ul>
                </div>

                <div
                    class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                    <h3 class="font-display font-bold text-slate-800 dark:text-white mb-4 text-sm">
                        Riwayat Import
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-xl bg-emerald-100 dark:bg-emerald-500/20 text-emerald-600 flex items-center justify-center">
                                <i class="ph-bold ph-check"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-xs text-slate-400">12 Des 2024</p>
                                <h4 class="font-bold text-slate-800 dark:text-white text-sm">Batch_Desember.csv</h4>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 opacity-60">
                            <div
                                class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-700 text-slate-500 flex items-center justify-center">
                                <i class="ph-bold ph-check"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-xs text-slate-400">10 Nov 2024</p>
                                <h4 class="font-bold text-slate-800 dark:text-white text-sm">Data_Store_B.csv</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
