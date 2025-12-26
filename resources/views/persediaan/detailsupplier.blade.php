@extends('layouts.admin')

@section('title', 'Detail Supplier - ' . $supplier->company)

@section('content')
<section class="max-w-7xl mx-auto pb-20">
    {{-- Header Navigation --}}
    <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-8">
        <a href="{{ route('suppliers.index') }}"
           class="w-10 h-10 rounded-xl bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-500 hover:text-indigo-600 hover:border-indigo-200 transition">
            <i class="ph-bold ph-arrow-left"></i>
        </a>

        <div>
            <h1 class="font-display font-bold text-2xl text-slate-800 dark:text-white">Detail Supplier</h1>
            <div class="text-sm text-slate-500 dark:text-slate-400 flex items-center gap-2 mt-1">
                <span>Supplier</span>
                <i class="ph-bold ph-caret-right text-xs"></i>
                <span class="text-indigo-600 dark:text-indigo-400 font-medium">{{ $supplier->company }}</span>
            </div>
        </div>

        <div class="sm:ml-auto flex gap-3">
             <a href="{{ route('suppliers.index') }}"
                class="px-5 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 rounded-xl font-bold flex items-center gap-2 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                Kembali
            </a>
            <button onclick='openEditModal(@json($supplier))'
               class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-bold flex items-center gap-2 hover:bg-indigo-700 shadow-lg shadow-indigo-200/50 dark:shadow-none transition">
                <i class="ph-bold ph-pencil-simple"></i>
                <span>Edit Data</span>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">

        {{-- MAIN INFO COLUMN --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Card Utama --}}
            <div class="bg-white dark:bg-darkCard p-6 sm:p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm relative overflow-hidden">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 flex items-center justify-center font-display font-bold text-xl">
                            PT
                        </div>
                        <div>
                            <h2 class="text-xl sm:text-2xl font-bold text-slate-800 dark:text-white">{{ $supplier->company }}</h2>
                            <p class="text-slate-500 dark:text-slate-400 flex items-center gap-1.5 text-sm mt-1">
                                <i class="ph-bold ph-user"></i>
                                Kontak: {{ $supplier->name }}
                            </p>
                        </div>
                    </div>
                    <span class="px-3 py-1 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-xs font-bold border border-green-200 dark:border-green-800">
                        Aktif
                    </span>
                </div>

                <hr class="border-slate-100 dark:border-slate-700 my-6">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-8">
                    <div class="space-y-1">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Email Perusahaan</p>
                        <div class="flex items-center gap-2 text-slate-700 dark:text-slate-200 font-medium">
                            <i class="ph-duotone ph-envelope-simple text-indigo-500"></i>
                            {{ $supplier->email }}
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Nomor Telepon</p>
                        <div class="flex items-center gap-2 text-slate-700 dark:text-slate-200 font-medium font-mono">
                            <i class="ph-duotone ph-phone text-indigo-500"></i>
                            {{ $supplier->phone }}
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">NPWP</p>
                        <div class="flex items-center gap-2 text-slate-700 dark:text-slate-200 font-medium">
                            <i class="ph-duotone ph-identification-card text-indigo-500"></i>
                            {{ $supplier->tax_id ?? '-' }}
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Kategori</p>
                        <div class="flex items-center gap-2 text-slate-700 dark:text-slate-200 font-medium">
                            <i class="ph-duotone ph-tag text-indigo-500"></i>
                            General Supplier
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Alamat --}}
            <div class="bg-white dark:bg-darkCard p-6 sm:p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 bg-orange-50 dark:bg-orange-900/20 rounded-lg text-orange-600 dark:text-orange-400">
                        <i class="ph-bold ph-map-pin text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-slate-800 dark:text-white">Alamat Lengkap</h3>
                </div>

                <p class="text-slate-600 dark:text-slate-300 leading-relaxed pl-[3.25rem]">
                    {{ $supplier->address ?? 'Alamat belum diisi.' }} <br>
                    @if($supplier->city || $supplier->region)
                        {{ $supplier->city }}, {{ $supplier->region }} <br>
                    @endif
                    @if($supplier->country || $supplier->postal_code)
                        {{ $supplier->country }} {{ $supplier->postal_code }}
                    @endif
                </p>
            </div>
        </div>

        {{-- SIDE INFO COLUMN --}}
        <div class="space-y-6">
            <div class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                <h3 class="font-bold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                    <i class="ph-bold ph-info text-indigo-500"></i>
                    Informasi Sistem
                </h3>

                <div class="space-y-4 relative">
                    {{-- Timeline item --}}
                    <div class="flex gap-3">
                        <div class="flex flex-col items-center">
                            <div class="w-2 h-2 rounded-full bg-slate-300 dark:bg-slate-600 mt-2"></div>
                            <div class="w-0.5 h-full bg-slate-100 dark:bg-slate-700 my-1"></div>
                        </div>
                        <div class="pb-2">
                            <p class="text-xs text-slate-400">Dibuat pada</p>
                            <p class="text-sm font-medium text-slate-700 dark:text-slate-200">{{ $supplier->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>

                    {{-- Timeline item --}}
                    <div class="flex gap-3">
                        <div class="flex flex-col items-center">
                            <div class="w-2 h-2 rounded-full bg-green-500 mt-2"></div>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Terakhir diupdate</p>
                            <p class="text-sm font-medium text-slate-700 dark:text-slate-200">{{ $supplier->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Stats (Placeholder layout) --}}
            <div class="bg-indigo-600 rounded-3xl p-6 text-white shadow-lg shadow-indigo-200 dark:shadow-none relative overflow-hidden">
                <i class="ph-duotone ph-package absolute -right-4 -bottom-4 text-9xl text-white/10"></i>
                <p class="text-indigo-100 text-sm font-medium mb-1">Total Transaksi</p>
                <h3 class="text-3xl font-bold font-display">Rp 0</h3>
                <p class="text-xs text-indigo-200 mt-4 opacity-80">*Fitur riwayat transaksi akan segera hadir.</p>
            </div>
        </div>

    </div>
</section>

    {{-- MODAL EDIT SUPPLIER (LENGKAP) --}}
    <div id="editSupplierModal"
        class="fixed inset-0 z-50 hidden bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4 transition-opacity duration-300">

        <div class="bg-white dark:bg-darkCard w-full max-w-3xl rounded-3xl shadow-2xl relative flex flex-col max-h-[90vh]">

            {{-- Header Modal --}}
            <div
                class="px-6 py-5 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center bg-slate-50/50 dark:bg-slate-800/50 rounded-t-3xl">
                <h3 class="font-display font-bold text-xl text-slate-800 dark:text-white">Edit Supplier</h3>
                <button type="button" onclick="closeEditModal()"
                    class="w-8 h-8 rounded-full flex items-center justify-center text-slate-400 hover:text-slate-600 hover:bg-slate-100 dark:hover:bg-slate-700 transition">
                    <i class="ph-bold ph-x text-lg"></i>
                </button>
            </div>

            {{-- Body Modal (Scrollable) --}}
            <div class="p-6 overflow-y-auto custom-scrollbar">
                <form id="editSupplierForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">

                        {{-- SECTION: INFORMASI DASAR --}}
                        <div>
                            <h4 class="text-xs font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400 mb-4 flex items-center gap-2">
                                <i class="ph-bold ph-info"></i> Informasi Dasar
                            </h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                {{-- Nama Kontak --}}
                                <div>
                                    <label for="edit_name" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Kontak <span class="text-red-500">*</span></label>
                                    <input type="text" name="name" id="edit_name" required
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none dark:text-white placeholder:text-slate-400"
                                        placeholder="Nama Personil">
                                </div>

                                {{-- Nama Perusahaan --}}
                                <div>
                                    <label for="edit_company" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Perusahaan <span class="text-red-500">*</span></label>
                                    <input type="text" name="company" id="edit_company" required
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none dark:text-white placeholder:text-slate-400"
                                        placeholder="PT/CV Supplier">
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label for="edit_email" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Email <span class="text-red-500">*</span></label>
                                    <input type="email" name="email" id="edit_email" required
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none dark:text-white placeholder:text-slate-400"
                                        placeholder="email@company.com">
                                </div>

                                {{-- Telepon --}}
                                <div>
                                    <label for="edit_phone" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">No. Telepon <span class="text-red-500">*</span></label>
                                    <input type="text" name="phone" id="edit_phone" required
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none dark:text-white placeholder:text-slate-400"
                                        placeholder="0812xxxx">
                                </div>

                                {{-- NPWP --}}
                                <div class="sm:col-span-2">
                                    <label for="edit_tax_id" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">NPWP / Tax ID</label>
                                    <input type="text" name="tax_id" id="edit_tax_id"
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none dark:text-white placeholder:text-slate-400"
                                        placeholder="Nomor Pokok Wajib Pajak">
                                </div>
                            </div>
                        </div>

                        <hr class="border-slate-100 dark:border-slate-700 border-dashed">

                        {{-- SECTION: ALAMAT LENGKAP --}}
                        <div>
                            <h4 class="text-xs font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400 mb-4 flex items-center gap-2">
                                <i class="ph-bold ph-map-pin"></i> Alamat Lengkap
                            </h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                {{-- Alamat Jalan --}}
                                <div class="sm:col-span-2">
                                    <label for="edit_address" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Alamat Jalan</label>
                                    <textarea name="address" id="edit_address" rows="2"
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none dark:text-white placeholder:text-slate-400 resize-none"
                                        placeholder="Nama jalan, gedung, nomor..."></textarea>
                                </div>

                                {{-- Kota --}}
                                <div>
                                    <label for="edit_city" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kota / Kabupaten</label>
                                    <input type="text" name="city" id="edit_city"
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none dark:text-white placeholder:text-slate-400">
                                </div>

                                {{-- Provinsi/Region --}}
                                <div>
                                    <label for="edit_region" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Provinsi / Wilayah</label>
                                    <input type="text" name="region" id="edit_region"
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none dark:text-white placeholder:text-slate-400">
                                </div>

                                {{-- Kode Pos --}}
                                <div>
                                    <label for="edit_postal_code" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kode Pos</label>
                                    <input type="text" name="postal_code" id="edit_postal_code"
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none dark:text-white placeholder:text-slate-400">
                                </div>

                                {{-- Negara --}}
                                <div>
                                    <label for="edit_country" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Negara (Kode)</label>
                                    <input type="text" name="country" id="edit_country" maxlength="5"
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none dark:text-white placeholder:text-slate-400 uppercase"
                                        placeholder="ID">
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Footer Action --}}
                    <div class="flex justify-end gap-3 mt-8 pt-4 border-t border-slate-100 dark:border-slate-700">
                        <button type="button" onclick="closeEditModal()"
                            class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-5 py-2.5 rounded-xl bg-indigo-600 text-white font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200/50 dark:shadow-none transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('editSupplierModal');
        const form = document.getElementById('editSupplierForm');

        function openEditModal(supplier) {
            modal.classList.remove('hidden');

            // Animasi scale
            const modalContent = modal.querySelector('div');
            modalContent.classList.add('scale-100');
            modalContent.classList.remove('scale-95');

            // Set action URL form
            form.action = `/suppliers/${supplier.id}`;

            // Isi field dengan data supplier atau kosong string jika null
            document.getElementById('edit_name').value = supplier.name;
            document.getElementById('edit_company').value = supplier.company;
            document.getElementById('edit_email').value = supplier.email;
            document.getElementById('edit_phone').value = supplier.phone;
            document.getElementById('edit_tax_id').value = supplier.tax_id ?? '';

            // Field Alamat
            document.getElementById('edit_address').value = supplier.address ?? '';
            document.getElementById('edit_city').value = supplier.city ?? '';
            document.getElementById('edit_region').value = supplier.region ?? '';
            document.getElementById('edit_postal_code').value = supplier.postal_code ?? '';
            document.getElementById('edit_country').value = supplier.country ?? '';
        }

        function closeEditModal() {
            modal.classList.add('hidden');
            form.reset();
        }

        // Close modal jika klik di area gelap (backdrop)
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeEditModal();
            }
        });
    </script>
@endsection
