@extends('layouts.admin')

@section('title', 'Tambah Supplier Baru - Hanania POS')

@section('content')
@if (session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-4">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <section id="add-supplier" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <a href="{{ url()->previous() }}"
                    class="w-10 h-10 flex items-center justify-center rounded-xl bg-white dark:bg-darkCard border border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 hover:shadow-lg transition duration-300">
                    <i class="ph-bold ph-arrow-left text-xl"></i>
                </a>
                <div>
                    <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                        Supplier Baru
                    </h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Tambahkan mitra pemasok baru ke dalam database
                    </p>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard p-6 md:p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">

            <form action="{{ route('suppliers.store') }}" method="POST">
    @csrf


                <div class="mb-8">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                        <i class="ph-fill ph-identification-card text-indigo-500"></i>
                        Informasi Utama
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-600 dark:text-slate-300">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i class="ph-bold ph-user"></i>
                                </div>
                                <input type="text" name="name" placeholder="Contoh: Budi Santoso"
                                    class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-600 dark:text-slate-300">
                                Nama Perusahaan <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i class="ph-bold ph-buildings"></i>
                                </div>
                                <input type="text" name="company" placeholder="Contoh: PT. Tekstil Sejahtera"
                                    class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-600 dark:text-slate-300">
                                Pajak ID (NPWP)
                            </label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i class="ph-bold ph-file-text"></i>
                                </div>
                                <input type="text" name="tax_id" placeholder="Nomor wajib pajak..."
                                    class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200">
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-slate-100 dark:border-slate-700 my-8">

                <div class="mb-8">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                        <i class="ph-fill ph-address-book text-indigo-500"></i>
                        Kontak
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-600 dark:text-slate-300">
                                Alamat Email <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i class="ph-bold ph-envelope-simple"></i>
                                </div>
                                <input type="email" name="email" placeholder="email@perusahaan.com"
                                    class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-600 dark:text-slate-300">
                                Nomor Telepon <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i class="ph-bold ph-phone"></i>
                                </div>
                                <input type="tel" name="phone" placeholder="+62 812..."
                                    class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200">
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-slate-100 dark:border-slate-700 my-8">

                <div class="mb-8">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                        <i class="ph-fill ph-map-pin text-indigo-500"></i>
                        Lokasi & Alamat
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="space-y-2 md:col-span-2 lg:col-span-3">
                            <label class="text-sm font-bold text-slate-600 dark:text-slate-300">
                                Alamat Lengkap
                            </label>
                            <div class="relative">
                                <textarea name="address" rows="2" placeholder="Nama jalan, gedung, nomor..."
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200"></textarea>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-600 dark:text-slate-300">Kota</label>
                            <input type="text" name="city" placeholder="Jakarta Selatan"
                                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-600 dark:text-slate-300">Wilayah / Provinsi</label>
                            <input type="text" name="region" placeholder="DKI Jakarta"
                                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-600 dark:text-slate-300">Negara</label>
                            <div class="relative">
                                <select name="country"
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-800 dark:text-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 appearance-none">
                                    <option value="ID" selected>Indonesia</option>
                                    <option value="SG">Singapore</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="CN">China</option>
                                    <option value="US">United States</option>
                                </select>
                                <div
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-500">
                                    <i class="ph-bold ph-caret-down"></i>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-600 dark:text-slate-300">Kode Pos</label>
                            <input type="text" name="postal_code" placeholder="12xxx"
                                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200">
                        </div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-4 pt-4">
                    <button type="submit"
                        class="flex-1 md:flex-none md:w-48 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-200/50 dark:shadow-none transition duration-300 flex items-center justify-center gap-2 group">
                        <i class="ph-bold ph-check text-xl group-hover:scale-110 transition-transform"></i>
                        Simpan Supplier
                    </button>

                    <button type="button" onclick="history.back()"
                        class="flex-1 md:flex-none md:w-32 py-3.5 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-200 font-bold rounded-xl hover:bg-slate-50 dark:hover:bg-slate-600 transition duration-300">
                        Batal
                    </button>
                </div>

            </form>
        </div>
    </section>
@endsection
