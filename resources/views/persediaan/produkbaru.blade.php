@extends('layouts.admin')

@section('title', 'Tambah Produk Baru - Hanania POS')

@section('content')
    <section id="create-product" class="max-w-7xl mx-auto pb-20">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Tambah Produk Baru
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Isi informasi detail produk di bawah ini.
                </p>
            </div>
            <div class="flex gap-3">
                <button type="button"
                    class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                    Batal
                </button>
                <button type="submit" form="product-form"
                    class="px-5 py-2.5 rounded-xl bg-indigo-600 text-white font-bold text-sm hover:bg-indigo-700 shadow-lg shadow-indigo-200/50 dark:shadow-none transition flex items-center gap-2">
                    <i class="ph-bold ph-check"></i>
                    Simpan Produk
                </button>
            </div>
        </div>

        <form id="product-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-8">

                    <div
                        class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                        <h3
                            class="font-display font-bold text-lg text-slate-800 dark:text-white mb-6 flex items-center gap-2">
                            <i class="ph-duotone ph-info text-indigo-500 text-xl"></i> Informasi Dasar
                        </h3>

                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Produk
                                    <span class="text-red-500">*</span></label>
                                <input type="text" name="name" placeholder="Contoh: Kemeja Linen Putih"
                                    class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white placeholder:text-slate-400">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kode
                                        Produk</label>
                                    <input type="text" name="code" placeholder="Auto-generated"
                                        class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white font-mono">
                                </div>
                                <div class="flex gap-3">
                                    <div class="flex-1">
                                        <label
                                            class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Barcode</label>
                                        <div class="relative">
                                            <input type="text" name="barcode"
                                                class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl pl-4 pr-10 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white font-mono">
                                            <i class="ph-bold ph-scan absolute right-3 top-3.5 text-slate-400 text-lg"></i>
                                        </div>
                                    </div>
                                    <div class="w-24">
                                        <label
                                            class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Digit</label>
                                        <input type="number" name="barcode_digits" value="13"
                                            class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-3 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                        <h3
                            class="font-display font-bold text-lg text-slate-800 dark:text-white mb-6 flex items-center gap-2">
                            <i class="ph-duotone ph-currency-dollar text-emerald-500 text-xl"></i> Harga & Pajak
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Harga Beli
                                    (HPP)</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-3 text-slate-500 font-bold text-sm">Rp</span>
                                    <input type="number" name="cost_price"
                                        class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl pl-10 pr-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white font-mono"
                                        placeholder="0">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Harga
                                    Jual</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-3 text-slate-500 font-bold text-sm">Rp</span>
                                    <input type="number" name="sell_price"
                                        class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl pl-10 pr-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white font-mono"
                                        placeholder="0">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Tingkat Pajak
                                    Default (%)</label>
                                <input type="number" name="tax_rate"
                                    class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white"
                                    placeholder="0">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Diskon
                                    Default (%)</label>
                                <input type="number" name="discount_rate"
                                    class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white"
                                    placeholder="0">
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
                        <div class="flex justify-between items-center mb-6">
                            <h3
                                class="font-display font-bold text-lg text-slate-800 dark:text-white flex items-center gap-2">
                                <i class="ph-duotone ph-swatches text-pink-500 text-xl"></i> Produk Variasi
                            </h3>
                            <button type="button"
                                class="text-xs font-bold text-indigo-600 bg-indigo-50 dark:bg-indigo-500/20 px-3 py-1.5 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-500/30 transition flex items-center gap-1">
                                <i class="ph-bold ph-plus"></i> Tambah Variasi
                            </button>
                        </div>

                        <div
                            class="bg-slate-50 dark:bg-slate-800/50 rounded-2xl p-4 border border-slate-100 dark:border-slate-700 space-y-4 mb-4">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="text-xs font-bold text-slate-500 mb-1 block">Merek</label>
                                    <select name="variants[0][brand]"
                                        class="w-full bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg px-3 py-2 text-sm">
                                        <option>Nike</option>
                                        <option>Adidas</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-500 mb-1 block">Warna</label>
                                    <select name="variants[0][color]"
                                        class="w-full bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg px-3 py-2 text-sm">
                                        <option>Hitam</option>
                                        <option>Putih</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-500 mb-1 block">Ukuran</label>
                                    <select name="variants[0][size]"
                                        class="w-full bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg px-3 py-2 text-sm">
                                        <option>XL</option>
                                        <option>L</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                                <div>
                                    <label class="text-xs font-bold text-slate-500 mb-1 block">Unit Stok</label>
                                    <input type="number" name="variants[0][stock]"
                                        class="w-full bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg px-3 py-2 text-sm"
                                        placeholder="Jumlah">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-slate-500 mb-1 block">Peringatan Kuantitas</label>
                                    <input type="number"
                                        class="w-full bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg px-3 py-2 text-sm"
                                        placeholder="Min. Limit">
                                </div>
                                <button type="button" name="variants[0][alert]"
                                    class="w-full bg-red-50 dark:bg-red-500/10 text-red-600 dark:text-red-400 border border-red-100 dark:border-red-500/20 py-2 rounded-lg text-sm font-bold hover:bg-red-100 transition flex justify-center items-center gap-2">
                                    <i class="ph-bold ph-trash"></i> Hapus
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <h3
                                class="font-display font-bold text-lg text-slate-800 dark:text-white flex items-center gap-2">
                                <i class="ph-duotone ph-warehouse text-orange-500 text-xl"></i> Stok Gudang
                            </h3>
                            <button type="button"
                                class="text-xs font-bold text-indigo-600 bg-indigo-50 dark:bg-indigo-500/20 px-3 py-1.5 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-500/30 transition flex items-center gap-1">
                                <i class="ph-bold ph-plus"></i> Tambah Gudang
                            </button>
                        </div>

                        <div class="hidden md:grid grid-cols-12 gap-4 mb-2 text-xs font-bold text-slate-500 px-2">
                            <div class="col-span-5">Pilih Gudang</div>
                            @foreach ($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}"
                                    {{ old('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                    {{ $warehouse->name }} ({{ $warehouse->type }})
                                </option>
                            @endforeach
                            <div class="col-span-1"></div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center mb-3">
                            <div class="md:col-span-5">
                                <select name="stocks[0][warehouse_id]"
                                    class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-3 py-2.5 text-sm dark:text-white">
                                    @foreach ($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}"
                                            {{ old('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                            {{ $warehouse->name }} ({{ $warehouse->type }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="md:col-span-3">
                                <input type="number" name="stocks[0][quantity]" placeholder="Stok"
                                    class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-3 py-2.5 text-sm dark:text-white">
                            </div>
                            <div class="md:col-span-3">
                                <input type="number" name="stocks[0][alert_limit]" placeholder="Min"
                                    class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-3 py-2.5 text-sm dark:text-white">
                            </div>
                            <div class="md:col-span-1 flex justify-end">
                                <button type="button"
                                    class="w-9 h-9 flex items-center justify-center rounded-lg text-red-500 hover:bg-red-50 dark:hover:bg-red-500/20 transition">
                                    <i class="ph-bold ph-trash text-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <h3
                                class="font-display font-bold text-lg text-slate-800 dark:text-white flex items-center gap-2">
                                <i class="ph-duotone ph-barcode text-purple-500 text-xl"></i> Serial Number
                            </h3>
                            <button type="button"
                                class="text-xs font-bold text-indigo-600 bg-indigo-50 dark:bg-indigo-500/20 px-3 py-1.5 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-500/30 transition flex items-center gap-1">
                                <i class="ph-bold ph-plus"></i> Tambah Serial
                            </button>
                        </div>
                        <p class="text-xs text-slate-400 mb-4">Masukkan nomor seri unik untuk produk elektronik/IMEI jika
                            ada.</p>

                        <div class="space-y-3">
                            <div class="flex gap-3">
                                <input type="text" name="serials[]" placeholder="Masukkan Serial Number / IMEI"
                                    class="flex-1 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white font-mono">
                                <button type="button"
                                    class="px-3 py-2 rounded-xl border border-red-200 text-red-500 hover:bg-red-50 dark:border-red-500/30 dark:hover:bg-red-500/20 transition">
                                    <i class="ph-bold ph-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="space-y-8">

                    <div
                        class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                        <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-4">
                            Gambar Produk
                        </h3>

                        <div id="image-dropzone"
                            class="relative border-2 border-dashed border-slate-300 dark:border-slate-600 rounded-2xl h-64 flex flex-col items-center justify-center text-center hover:border-indigo-500 hover:bg-indigo-50 dark:hover:bg-indigo-500/10 transition cursor-pointer group bg-slate-50 dark:bg-slate-800/50 overflow-hidden">

                            <input type="file" name="image" id="image-input"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                accept="image/png, image/jpeg, image/jpg, image/webp">

                            <div id="placeholder-content"
                                class="flex flex-col items-center pointer-events-none transition-opacity duration-300">
                                <div
                                    class="w-16 h-16 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-500 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition duration-300">
                                    <i class="ph-duotone ph-image text-3xl"></i>
                                </div>
                                <p class="text-sm font-bold text-slate-700 dark:text-white">Upload Gambar</p>
                                <p class="text-xs text-slate-400 mt-1">Drag & drop atau klik di sini</p>
                                <p class="text-[10px] text-slate-400 mt-2">JPG, PNG, WEBP (Max. 2MB)</p>
                            </div>

                            <img id="image-preview"
                                class="hidden absolute inset-0 w-full h-full object-contain bg-white dark:bg-slate-800 z-0" />

                            <button type="button" id="remove-image-btn"
                                class="hidden absolute top-3 right-3 z-20 bg-white dark:bg-slate-700 text-red-500 dark:text-red-400 border border-slate-200 dark:border-slate-600 rounded-full p-2 shadow-lg hover:bg-red-50 dark:hover:bg-red-500/10 transition transform hover:scale-110"
                                title="Hapus Gambar">
                                <i class="ph-bold ph-x text-lg"></i>
                            </button>
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                        <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-6">
                            Pengaturan
                        </h3>

                        <div class="space-y-5">
                            <div>
                                <label
                                    class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kategori</label>
                                <select name="category_id"
                                    class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Sub
                                    Kategori</label>
                                <select name="subcategory_id"
                                    class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white">
                                    <option value="">Pilih Sub Kategori</option>
                                    @foreach ($subcategories as $sub)
                                        <option value="{{ $sub->id }}" data-parent="{{ $sub->parent_id }}"
                                            {{ old('subcategory_id') == $sub->id ? 'selected' : '' }}>
                                            {{ $sub->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Satuan
                                    Unit</label>
                                <select name="unit_id"
                                    class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white">
                                    <option value="pcs">Pcs (Pieces)</option>
                                    <option value="box">Box</option>
                                    <option value="kg">Kilogram</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Gudang
                                    Default</label>
                                <select name="warehouse_id"
                                    class="w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white">
                                    <option value="">Pilih Gudang Utama</option>
                                    @foreach ($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}"
                                            {{ old('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                            {{ $warehouse->name }} ({{ $warehouse->type }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <hr class="border-slate-100 dark:border-slate-700">

                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="block text-sm font-bold text-slate-800 dark:text-white">Status
                                        Aktif</span>
                                    <span class="text-xs text-slate-500">Produk dapat dijual</span>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-500">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </section>
    <script>
        document.getElementById('category_id').addEventListener('change', function() {
            const selectedParentId = this.value;
            const subCatSelect = document.getElementById('subcategory_id');
            const options = subCatSelect.querySelectorAll('option');

            // Reset pilihan
            subCatSelect.value = "";

            options.forEach(option => {
                // Skip placeholder "Pilih Sub Kategori"
                if (option.value === "") return;

                const parentId = option.getAttribute('data-parent');

                if (selectedParentId === "" || parentId === selectedParentId) {
                    option.style.display = 'block'; // Tampilkan jika cocok
                } else {
                    option.style.display = 'none'; // Sembunyikan jika tidak cocok
                }
            });
        });
    </script>
    <script>
        // ... (Kode kategori sebelumnya biarkan saja) ...

        // --- Logic Image Upload ---
        const dropzone = document.getElementById('image-dropzone');
        const input = document.getElementById('image-input');
        const placeholder = document.getElementById('placeholder-content');
        const preview = document.getElementById('image-preview');
        const removeBtn = document.getElementById('remove-image-btn');

        // 1. Drag & Drop Visual Effects
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, (e) => {
                e.preventDefault();
                e.stopPropagation();
            }, false);
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            dropzone.addEventListener(eventName, () => {
                dropzone.classList.add('border-indigo-500', 'bg-indigo-50', 'dark:bg-indigo-500/10');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, () => {
                dropzone.classList.remove('border-indigo-500', 'bg-indigo-50', 'dark:bg-indigo-500/10');
            }, false);
        });

        // 2. Handle File Drop
        dropzone.addEventListener('drop', (e) => {
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                input.files = files; // Assign ke input
                handleFiles(files);
            }
        }, false);

        // 3. Handle File Click Select
        input.addEventListener('change', function() {
            handleFiles(this.files);
        });

        // 4. Function: Tampilkan Preview
        function handleFiles(files) {
            if (files.length === 0) return;

            const file = files[0];
            if (!file.type.startsWith('image/')) {
                alert('Harap upload file gambar.');
                return;
            }

            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function() {
                preview.src = reader.result;

                // Show UI Elements
                preview.classList.remove('hidden');
                removeBtn.classList.remove('hidden');
                placeholder.classList.add('hidden', 'opacity-0');
            }
        }

        // 5. Function: Hapus Gambar (Reset)
        removeBtn.addEventListener('click', function(e) {
            // Stop event agar tidak men-trigger klik pada input file di bawahnya
            e.preventDefault();
            e.stopPropagation();

            // Reset Values
            input.value = ''; // Clear input file
            preview.src = ''; // Clear source img

            // Reset UI
            preview.classList.add('hidden');
            removeBtn.classList.add('hidden');
            placeholder.classList.remove('hidden', 'opacity-0');
        });
    </script>
@endsection
