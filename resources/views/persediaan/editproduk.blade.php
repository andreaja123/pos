@extends('layouts.admin')

@section('title', 'Edit Produk - Hanania POS')

@section('content')
    <section class="max-w-7xl mx-auto pb-20">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Edit Produk</h2>
                <p class="text-sm text-slate-500">Perbarui informasi produk: <span
                        class="font-bold text-indigo-600">{{ $product->name }}</span></p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('products.index') }}"
                    class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition">Batal</a>
                <button type="submit" form="edit-product-form"
                    class="px-5 py-2.5 rounded-xl bg-indigo-600 text-white font-bold text-sm hover:bg-indigo-700 shadow-lg transition flex items-center gap-2">
                    <i class="ph-bold ph-floppy-disk"></i> Simpan Perubahan
                </button>
            </div>
        </div>

        <form id="edit-product-form" action="{{ route('products.update', $product->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT') <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 shadow-sm">
                        <h3 class="font-display font-bold text-lg text-slate-800 mb-6 flex items-center gap-2">
                            <i class="ph-duotone ph-info text-indigo-500 text-xl"></i> Informasi Dasar
                        </h3>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Produk <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-indigo-500">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Kode Produk</label>
                                    <input type="text" name="code" value="{{ old('code', $product->code) }}"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-mono">
                                </div>
                                <div class="flex gap-3">
                                    <div class="flex-1">
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Barcode</label>
                                        <input type="text" name="barcode" value="{{ old('barcode', $product->barcode) }}"
                                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-mono">
                                    </div>
                                    <div class="w-24">
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Digit</label>
                                        <input type="number" name="barcode_digits"
                                            value="{{ old('barcode_digits', $product->barcode_digits) }}"
                                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-3 text-sm text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 shadow-sm">
                        <h3 class="font-display font-bold text-lg text-slate-800 mb-6 flex items-center gap-2">
                            <i class="ph-duotone ph-currency-dollar text-emerald-500 text-xl"></i> Harga & Pajak
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Harga Beli (HPP)</label>
                                <input type="number" name="cost_price"
                                    value="{{ old('cost_price', $product->cost_price) }}"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Harga Jual</label>
                                <input type="number" name="sell_price"
                                    value="{{ old('sell_price', $product->sell_price) }}"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Pajak (%)</label>
                                <input type="number" name="tax_rate" value="{{ old('tax_rate', $product->tax_rate) }}"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Diskon (%)</label>
                                <input type="number" name="discount_rate"
                                    value="{{ old('discount_rate', $product->discount_rate) }}"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 shadow-sm">
                        <h3 class="font-display font-bold text-lg text-slate-800 mb-6 flex items-center gap-2">
                            <i class="ph-duotone ph-swatches text-pink-500 text-xl"></i> Produk Variasi
                        </h3>

                        @foreach ($product->variants as $index => $variant)
                            <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100 mb-4">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                    <input type="text" name="variants[{{ $index }}][brand]"
                                        value="{{ $variant->brand }}" placeholder="Merek"
                                        class="border-slate-200 rounded-lg px-3 py-2 text-sm">
                                    <input type="text" name="variants[{{ $index }}][color]"
                                        value="{{ $variant->color }}" placeholder="Warna"
                                        class="border-slate-200 rounded-lg px-3 py-2 text-sm">
                                    <input type="text" name="variants[{{ $index }}][size]"
                                        value="{{ $variant->size }}" placeholder="Ukuran"
                                        class="border-slate-200 rounded-lg px-3 py-2 text-sm">
                                </div>
                                <div class="grid grid-cols-3 gap-4">
                                    <input type="number" name="variants[{{ $index }}][stock]"
                                        value="{{ $variant->stock }}" placeholder="Stok"
                                        class="border-slate-200 rounded-lg px-3 py-2 text-sm">
                                    <input type="number" name="variants[{{ $index }}][stock_alert]"
                                        value="{{ $variant->stock_alert }}" placeholder="Alert"
                                        class="border-slate-200 rounded-lg px-3 py-2 text-sm">
                                </div>
                            </div>
                        @endforeach
                        <button type="button"
                            class="text-xs font-bold text-indigo-600 bg-indigo-50 px-3 py-1.5 rounded-lg"><i
                                class="ph-bold ph-plus"></i> Tambah Variasi</button>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 shadow-sm">
                        <h3 class="font-display font-bold text-lg text-slate-800 mb-4">Gambar Produk</h3>
                        <div id="image-dropzone"
                            class="relative border-2 border-dashed border-slate-300 rounded-2xl h-64 flex flex-col items-center justify-center hover:border-indigo-500 transition cursor-pointer bg-slate-50 overflow-hidden">
                            <input type="file" name="image" id="image-input"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/*">

                            <div id="placeholder-content"
                                class="flex flex-col items-center pointer-events-none transition-opacity duration-300">
                                <div
                                    class="w-16 h-16 bg-indigo-50 text-indigo-500 rounded-full flex items-center justify-center mb-3">
                                    <i class="ph-duotone ph-image text-3xl"></i>
                                </div>
                                <p class="text-sm font-bold text-slate-700">Ganti Gambar</p>
                            </div>

                            <img id="image-preview"
                                class="hidden absolute inset-0 w-full h-full object-contain bg-white z-0" />

                            <button type="button" id="remove-image-btn"
                                class="hidden absolute top-3 right-3 z-20 bg-white text-red-500 border border-slate-200 rounded-full p-2 shadow-lg hover:scale-110 transition">
                                <i class="ph-bold ph-x text-lg"></i>
                            </button>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 shadow-sm">
                        <h3 class="font-display font-bold text-lg text-slate-800 mb-6">Pengaturan</h3>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Kategori</label>
                                <select name="category_id" id="category_id"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Sub Kategori</label>
                                <select name="subcategory_id" id="subcategory_id"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm">
                                    <option value="">Pilih Sub</option>
                                    @foreach ($subcategories as $sub)
                                        <option value="{{ $sub->id }}" data-parent="{{ $sub->parent_id }}"
                                            {{ old('subcategory_id', $product->subcategory_id) == $sub->id ? 'selected' : '' }}>
                                            {{ $sub->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <hr class="border-slate-100">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-bold text-slate-800">Status Aktif</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_active" value="1"
                                        {{ $product->is_active ? 'checked' : '' }} class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:bg-emerald-500 peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all">
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
        // --- Logic Sub Kategori ---
        document.getElementById('category_id').addEventListener('change', function() {
            const selectedParentId = this.value;
            const subCatSelect = document.getElementById('subcategory_id');
            const options = subCatSelect.querySelectorAll('option');
            subCatSelect.value = "";
            options.forEach(option => {
                if (option.value === "") return;
                const parentId = option.getAttribute('data-parent');
                option.style.display = (selectedParentId === "" || parentId === selectedParentId) ?
                    'block' : 'none';
            });
        });

        // --- Logic Image Upload & Preview Initialization ---
        const dropzone = document.getElementById('image-dropzone');
        const input = document.getElementById('image-input');
        const placeholder = document.getElementById('placeholder-content');
        const preview = document.getElementById('image-preview');
        const removeBtn = document.getElementById('remove-image-btn');

        // Init: Cek apakah produk sudah punya gambar
        @php
            $primaryImage = $product->images->where('is_primary', true)->first();
        @endphp

        @if ($primaryImage)
            preview.src = "{{ $primaryImage->image_url }}";
            preview.classList.remove('hidden');
            removeBtn.classList.remove('hidden');
            placeholder.classList.add('hidden', 'opacity-0');
        @endif

        // Handle File Select
        input.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    removeBtn.classList.remove('hidden');
                    placeholder.classList.add('hidden', 'opacity-0');
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

        // Handle Remove
        removeBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            input.value = '';
            preview.src = '';
            preview.classList.add('hidden');
            removeBtn.classList.add('hidden');
            placeholder.classList.remove('hidden', 'opacity-0');
        });
    </script>
@endsection
