@extends('layouts.admin')



@section('title', 'Data Gudang - Hanania POS')



@section('content')

    <section class="page-section active max-w-7xl mx-auto">



        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">

            <div>

                <h1 class="font-display text-2xl font-bold text-slate-800 dark:text-white">

                    Data Gudang

                </h1>

                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">

                    Kelola lokasi penyimpanan dan status stok produk.

                </p>

            </div>



            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">

                <div class="relative group w-full md:w-64">

                    <form action="{{ route('warehouses.index') }}" method="GET" class="relative group w-full md:w-64">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari gudang..."
                            class="w-full pl-10 pr-4 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition text-slate-600 dark:text-slate-300 shadow-sm">
                    </form>

                    <i
                        class="ph-bold ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-indigo-500 transition"></i>

                </div>



                <div class="flex gap-3">

                    <a href="{{ route('warehouses.export') }}"
                        class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 text-sm font-bold rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-indigo-600 dark:hover:text-indigo-400 transition shadow-sm">

                        <i class="ph-bold ph-microsoft-excel-logo text-lg text-green-600"></i>

                        <span class="hidden sm:inline">Export</span>

                    </a>



                    <button onclick="openModal('create')"
                        class="flex items-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl shadow-lg shadow-indigo-500/30 transition transform hover:-translate-y-0.5">

                        <i class="ph-bold ph-plus"></i>

                        <span>Gudang Baru</span>

                    </button>

                </div>

            </div>

        </div>



        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none overflow-hidden">



            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">

                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display border-b border-slate-100 dark:border-slate-700">

                        <tr>

                            <th class="px-6 py-5 font-bold w-16">No</th>

                            <th class="px-6 py-5 font-bold min-w-[200px]">Nama Gudang</th>

                            <th class="px-6 py-5 font-bold text-center">Total Produk</th>

                            <th class="px-6 py-5 font-bold text-center">Jumlah Stok</th>

                            <th class="px-6 py-5 font-bold">Tipe / Layak</th>

                            <th class="px-6 py-5 font-bold text-right min-w-[150px]">Aksi</th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        @forelse($warehouses as $index => $warehouse)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition duration-200">

                                <td class="px-6 py-4 font-mono text-slate-500">{{ $warehouses->firstItem() + $index }}</td>

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 flex items-center justify-center">

                                            <i class="ph-fill ph-warehouse text-xl"></i>

                                        </div>

                                        <div>

                                            <h4 class="font-bold text-slate-800 dark:text-white">{{ $warehouse->name }}</h4>

                                            <p class="text-xs text-slate-500">{{ $warehouse->location }}</p>

                                        </div>

                                    </div>

                                </td>

                                <td class="px-6 py-4 text-center font-bold text-slate-700 dark:text-slate-300">

                                    {{ number_format($warehouse->total_produk) }} <span
                                        class="text-xs font-normal text-slate-400">item</span>

                                </td>

                                <td class="px-6 py-4 text-center">

                                    <span
                                        class="font-bold text-slate-800 dark:text-white">{{ number_format($warehouse->jumlah_stok ?? 0) }}</span>

                                </td>

                                <td class="px-6 py-4">
                                    @php
                                        $badgeClass = match ($warehouse->type) {
                                            'Pusat Penjualan' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                                            'Stok Cadangan' => 'bg-blue-100 text-blue-700 border-blue-200',
                                            'Karantina' => 'bg-amber-100 text-amber-700 border-amber-200',
                                            default => 'bg-slate-100 text-slate-700',
                                        };
                                        $dotClass = match ($warehouse->type) {
                                            'Pusat Penjualan' => 'bg-emerald-500',
                                            'Stok Cadangan' => 'bg-blue-500',
                                            default => 'hidden', // Karantina pakai icon warning di desain asli
                                        };
                                    @endphp
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border {{ $badgeClass }} border-emerald-200 dark:border-emerald-500/30">

                                        @if ($warehouse->type == 'Karantina')
                                            <i class="ph-bold ph-warning-circle"></i>
                                        @else
                                            <span class="w-1.5 h-1.5 rounded-full {{ $dotClass }}"></span>
                                        @endif

                                        {{ $warehouse->type }}

                                    </span>

                                </td>

                                <td class="px-6 py-4 text-right">

                                    <div class="flex justify-end gap-2">

                                        <button
                                            class="p-2 rounded-lg text-slate-400 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition"
                                            title="Lihat Detail">

                                            <i class="ph-bold ph-eye text-lg"></i>

                                        </button>

                                        <button
                                            class="p-2 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-900/30 transition"
                                            title="Laporan">

                                            <i class="ph-bold ph-file-text text-lg"></i>

                                        </button>

                                        <button onclick="openModal('edit', {{ $warehouse }})"
                                            class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-900/30 transition"
                                            title="Edit">

                                            <i class="ph-bold ph-pencil-simple text-lg"></i>

                                        </button>

                                        <form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus gudang ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition"
                                                title="Hapus">
                                                <i class="ph-bold ph-trash text-lg"></i>
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-8 text-slate-500">Data gudang tidak ditemukan.</td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>



            <div
                class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">

                <p class="text-sm text-slate-500 dark:text-slate-400">

                    Menampilkan <span
                        class="font-bold text-slate-800 dark:text-white">{{ $warehouses->firstItem() ?? 0 }}-{{ $warehouses->lastItem() ?? 0 }}</span>
                    dari <span class="font-bold text-slate-800 dark:text-white">{{ $warehouses->total() }}</span> data
                    gudang

                </p>


                {{ $warehouses->links('vendor.pagination.hanania') }}


            </div>



        </div>

    </section>
    <div id="warehouseModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">

        <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity opacity-0" id="modalBackdrop"></div>

        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white dark:bg-slate-800 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                id="modalPanel">

                <div
                    class="bg-white dark:bg-slate-800 px-4 pb-4 pt-5 sm:p-6 sm:pb-4 border-b border-slate-100 dark:border-slate-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold leading-6 text-slate-900 dark:text-white" id="modalTitle">
                            Tambah Gudang Baru
                        </h3>
                        <button onclick="closeModal()" type="button"
                            class="text-slate-400 hover:text-slate-500 transition">
                            <i class="ph-bold ph-x text-xl"></i>
                        </button>
                    </div>
                </div>

                <form id="warehouseForm" method="POST" action="">
                    @csrf
                    <div id="methodSpoof"></div>

                    <div class="bg-white dark:bg-slate-800 px-4 py-5 sm:p-6 space-y-4">

                        <div>
                            <label for="name"
                                class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Nama Gudang</label>
                            <input type="text" name="name" id="name" required
                                class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 text-slate-800 dark:text-white transition"
                                placeholder="Contoh: Gudang Pusat">
                        </div>

                        <div>
                            <label for="location"
                                class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Lokasi</label>
                            <input type="text" name="location" id="location" required
                                class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 text-slate-800 dark:text-white transition"
                                placeholder="Contoh: Jakarta Selatan">
                        </div>

                        <div>
                            <label for="type"
                                class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Tipe Gudang</label>
                            <div class="relative">
                                <select name="type" id="type" required
                                    class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 text-slate-800 dark:text-white transition appearance-none">
                                    <option value="Pusat Penjualan">Pusat Penjualan</option>
                                    <option value="Stok Cadangan">Stok Cadangan</option>
                                    <option value="Karantina">Karantina</option>
                                </select>
                                <i
                                    class="ph-bold ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-slate-50 dark:bg-slate-700/50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 border-t border-slate-100 dark:border-slate-700">
                        <button type="submit"
                            class="inline-flex w-full justify-center rounded-xl bg-indigo-600 px-3 py-2 text-sm font-bold text-white shadow-sm hover:bg-indigo-500 sm:ml-3 sm:w-auto transition">
                            Simpan Data
                        </button>
                        <button type="button" onclick="closeModal()"
                            class="mt-3 inline-flex w-full justify-center rounded-xl bg-white dark:bg-slate-700 px-3 py-2 text-sm font-bold text-slate-900 dark:text-slate-300 shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-slate-600 hover:bg-slate-50 dark:hover:bg-slate-600 sm:mt-0 sm:w-auto transition">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Variabel elemen DOM
        const modal = document.getElementById('warehouseModal');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const modalPanel = document.getElementById('modalPanel');
        const modalTitle = document.getElementById('modalTitle');
        const form = document.getElementById('warehouseForm');
        const methodSpoof = document.getElementById('methodSpoof');

        // Input Fields
        const inputName = document.getElementById('name');
        const inputLocation = document.getElementById('location');
        const inputType = document.getElementById('type');

        // Route dasar (digunakan untuk replace ID saat update)
        // Pastikan route 'admin.warehouses.store' ada di web.php
        const storeUrl = "{{ route('warehouses.store') }}";

        // Kita butuh URL dummy untuk update agar bisa di-replace ID-nya via JS
        // Gunakan id '0' sebagai placeholder
        const updateUrlTemplate = "{{ route('warehouses.update', 0) }}";

        function openModal(mode, data = null) {
            // 1. Tampilkan Modal (Hapus class hidden)
            modal.classList.remove('hidden');

            // 2. Animasi Masuk (Perlu sedikit delay agar transisi CSS jalan)
            setTimeout(() => {
                modalBackdrop.classList.remove('opacity-0');
                modalPanel.classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
            }, 10);

            // 3. Reset State Form
            methodSpoof.innerHTML = ''; // Hapus method PUT jika ada
            form.reset(); // Kosongkan input

            // 4. Logic Mode (Create vs Edit)
            if (mode === 'edit' && data) {
                // Mode EDIT
                modalTitle.innerText = 'Edit Data Gudang';

                // Isi Form dengan data
                inputName.value = data.name;
                inputLocation.value = data.location;
                inputType.value = data.type;

                // Update Action URL: ganti '0' (placeholder) dengan ID gudang asli
                form.action = updateUrlTemplate.replace('/0', '/' + data.id);

                // Tambahkan Method Spoofing untuk PUT
                methodSpoof.innerHTML = '<input type="hidden" name="_method" value="PUT">';
            } else {
                // Mode CREATE
                modalTitle.innerText = 'Tambah Gudang Baru';
                form.action = storeUrl;
            }
        }

        function closeModal() {
            // 1. Animasi Keluar
            modalBackdrop.classList.add('opacity-0');
            modalPanel.classList.add('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');

            // 2. Sembunyikan Modal setelah animasi selesai (300ms sesuai durasi default tailwind)
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Tutup modal jika klik di luar panel (di backdrop)
        modal.addEventListener('click', function(e) {
            if (e.target === modalBackdrop) { // Pastikan yang diklik area gelap, bukan isi modal
                closeModal();
            }
        });
    </script>

    @if ($errors->any())
        @if (old('_method') === 'PUT')
            // Mode Edit: Kita butuh data ID yang sedang diedit.
            // Ini agak tricky di sisi client jika refresh,
            // tapi untuk simple case kita bisa reopen mode create atau handle manual.
            // Untuk amannya, kita buka modal Create dulu tapi isi value old.

            // Setup manual state
            modal.classList.remove('hidden');
            modalBackdrop.classList.remove('opacity-0');
            modalPanel.classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');

            // Inject PUT method kembali
            methodSpoof.innerHTML = '<input type="hidden" name="_method" value="PUT">';

            // Isi Value dari Old Input
            inputName.value = "{{ old('name') }}";
            inputLocation.value = "{{ old('location') }}";
            inputType.value = "{{ old('type') }}";

            // URL action harus diperbaiki manual di backend redirect,
            // atau user harus klik edit lagi.
            // Opsi paling robust: Gunakan AJAX submission (tapi kode jadi lebih kompleks).
            // Opsi simple: Tampilkan error di Toast Notification saja (lebih umum untuk Admin Panel modern).
        @else
            // Mode Create
            openModal('create');
            inputName.value = "{{ old('name') }}";
            inputLocation.value = "{{ old('location') }}";
            inputType.value = "{{ old('type') }}";
        @endif
    @endif
@endsection
