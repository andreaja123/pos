@extends('layouts.admin')

@section('title', 'Kelola Supplier - Hanania POS')

@section('content')
    <section id="kelola-supplier" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                    Kelola Supplier
                </h1>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                    Manajemen data pemasok stok barang Anda.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('suppliers.export') }}"
                    class="flex items-center gap-2 px-5 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition shadow-sm">
                    <i class="ph-bold ph-microsoft-excel-logo text-green-600 text-lg"></i>
                    <span class="hidden sm:inline">Export Excel</span>
                </a>
                <a href="{{ route('suppliers.create') }}"
                    class="flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200/50 dark:shadow-none">
                    <i class="ph-bold ph-plus text-lg"></i>
                    <span>Supplier Baru</span>
                </a>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">

            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row gap-4 justify-between items-center">
                <div class="relative w-full sm:w-72">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="ph-bold ph-magnifying-glass text-slate-400"></i>
                    </div>
                    <form method="GET" action="{{ route('suppliers.index') }}">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari nama, email, atau telepon..."
                            class="block w-full pl-10 pr-3 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition dark:text-white">
                    </form>
                </div>

                <div class="flex items-center gap-2 w-full sm:w-auto">
                    <span class="text-sm text-slate-500 dark:text-slate-400 whitespace-nowrap">Tampilkan:</span>
                    <form method="GET">
                        <select name="per_page" onchange="this.form.submit()"
                            class="bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-white text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block p-2.5">
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        </select>

                        <input type="hidden" name="search" value="{{ request('search') }}">
                    </form>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display uppercase tracking-wider text-xs">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16 text-center">No</th>
                            <th class="px-6 py-4 font-bold">Nama Supplier</th>
                            <th class="px-6 py-4 font-bold">Alamat</th>
                            <th class="px-6 py-4 font-bold">Email</th>
                            <th class="px-6 py-4 font-bold">Telepon</th>
                            <th class="px-6 py-4 font-bold text-center w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        @forelse ($suppliers as $supplier)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 text-center font-mono text-slate-500">
                                    {{ $loop->iteration + ($suppliers->currentPage() - 1) * $suppliers->perPage() }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300 flex items-center justify-center font-bold text-xs">
                                            PT
                                        </div>
                                        <div>
                                            <span
                                                class="block font-bold text-slate-800 dark:text-slate-200">{{ $supplier->company }}</span>
                                            <span class="text-xs text-slate-500">{{ $supplier->name }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 max-w-xs truncate"
                                    title="{{ $supplier->address }}">
                                    {{ $supplier->address ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-slate-500">
                                    {{ $supplier->email }}
                                </td>
                                <td class="px-6 py-4 font-mono text-slate-500">
                                    {{ $supplier->phone }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('suppliers.show', $supplier) }}"
                                            class="p-2 rounded-lg text-slate-400 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition"
                                            title="Lihat Detail">
                                            <i class="ph-bold ph-eye text-lg"></i>
                                        </a>
                                        <button onclick='openEditModal(@json($supplier))'
                                            class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-900/20 transition"
                                            title="Edit">
                                            <i class="ph-bold ph-pencil-simple text-lg"></i>
                                        </button>
                                        <form method="POST" action="{{ route('suppliers.destroy', $supplier) }}"
                                            onsubmit="return confirm('Hapus supplier ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="p-2 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition"
                                                title="Hapus">
                                                <i class="ph-bold ph-trash text-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-10 text-slate-400">
                                    <div class="flex flex-col items-center">
                                        <i class="ph-duotone ph-magnifying-glass text-4xl mb-2 text-slate-300"></i>
                                        <span>Data tidak ditemukan</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div
                class="px-6 py-4 border-t border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400 text-center sm:text-left">
                    Menampilkan <span class="font-bold text-slate-700 dark:text-white">{{ $suppliers->firstItem() }}</span>
                    sampai <span class="font-bold text-slate-700 dark:text-white">{{ $suppliers->lastItem() }}</span>
                    dari <span class="font-bold text-slate-700 dark:text-white">{{ $suppliers->total() }}</span> data
                </p>

                {{ $suppliers->links('vendor.pagination.hanania') }}
            </div>

        </div>
    </section>

    {{-- MODAL EDIT SUPPLIER (REFINED) --}}
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

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Di sini kita tidak bisa langsung passing old data ke function openEditModal
                // karena struktur datanya berbeda. Idealnya backend mengirim flash session.
                // Untuk simplifikasi, kita buka saja modalnya.
                // openEditModal(...)
                alert('Terdapat kesalahan input. Silakan periksa kembali.');
            });
        </script>
    @endif

@endsection
