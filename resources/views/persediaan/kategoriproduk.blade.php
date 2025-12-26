@extends('layouts.admin')

@section('title', 'Kategori Produk - Hanania POS')

@section('content')
    <section class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h2 class="font-display font-bold text-2xl text-slate-800 dark:text-white">
                    Kategori Produk
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                    Kelola kategori, stok, dan performa penjualan per kategori.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('categories.export') }}"
                    class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-200 text-sm font-bold rounded-xl hover:bg-slate-50 dark:hover:bg-slate-600 transition shadow-sm">
                    <i class="ph-bold ph-microsoft-excel-logo text-green-600 text-lg"></i>
                    <span class="hidden sm:inline">Export Excel</span>
                </a>

                <button onclick="openCategoryModal()"
                    class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-200 text-sm font-bold rounded-xl hover:bg-slate-50 dark:hover:bg-slate-600 transition shadow-sm">
                    <i class="ph-bold ph-git-fork text-lg"></i>
                    <span class="hidden sm:inline">Sub Kategori</span>
                </button>

                <button onclick="openCategoryModal()"
                    class="flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200/50 dark:shadow-none">
                    <i class="ph-bold ph-plus text-lg"></i>
                    <span>Tambah Kategori</span>
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none overflow-hidden">

            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="relative w-full sm:w-72">
                    <i
                        class="ph-bold ph-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="text" placeholder="Cari nama kategori..."
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 text-slate-600 dark:text-slate-200 placeholder-slate-400 transition">
                </div>

                {{-- <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tampilkan:</span>
                    <select
                        class="bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 text-sm rounded-lg px-3 py-1.5 focus:outline-none">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                </div> --}}
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">Nama Kategori</th>
                            <th class="px-6 py-4 font-bold text-center">Total Produk</th>
                            <th class="px-6 py-4 font-bold text-center">Jumlah Stok</th>
                            <th class="px-6 py-4 font-bold">Layak (Jual/Stok)</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        @forelse ($categories as $index => $category)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition duration-200">
                                {{-- No (pagination aware) --}}
                                <td class="px-6 py-4 font-mono text-slate-400">
                                    {{ $categories->firstItem() + $index }}
                                </td>

                                {{-- Nama Kategori --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @if ($category->parent_id)
                                            <div class="w-4 border-l-2 border-slate-200 h-full mr-1"></div>
                                            <div
                                                class="w-8 h-8 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 flex items-center justify-center">
                                                <i class="ph-fill ph-tag text-lg"></i>
                                            </div>
                                        @else
                                            <div
                                                class="w-10 h-10 rounded-lg bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 flex items-center justify-center">
                                                <i class="ph-fill ph-t-shirt text-xl"></i>
                                            </div>
                                        @endif

                                        <div>
                                            <p class="font-bold text-slate-800 dark:text-white">
                                                {{ $category->name }}
                                            </p>
                                            <p class="text-xs text-slate-400">
                                                {{ $category->parent ? 'Sub: ' . $category->parent->name : 'Main Category' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Total Produk --}}
                                <td class="px-6 py-4 text-center font-mono text-slate-700 dark:text-slate-300">
                                    {{ $category->total_products ?? 0 }}
                                </td>

                                {{-- Jumlah Stok --}}
                                <td class="px-6 py-4 text-center font-mono text-slate-600 dark:text-slate-400">
                                    {{ number_format($category->total_stock) }}
                                </td>

                                {{-- Kelayakan --}}
                                <td class="px-6 py-4">
                                    <div class="w-full max-w-[140px]">
                                        <div class="flex justify-between text-xs mb-1">
                                            <span
                                                class="font-bold
                                @if ($category->feasibility_percent >= 80) text-emerald-600 dark:text-emerald-400
                                @elseif($category->feasibility_percent >= 50) text-amber-600 dark:text-amber-400
                                @else text-red-600 dark:text-red-400 @endif
                            ">
                                                {{ $category->feasibility_label }}
                                            </span>
                                            <span class="text-slate-400">
                                                {{ $category->feasibility_percent }}%
                                            </span>
                                        </div>

                                        <div
                                            class="w-full bg-slate-100 dark:bg-slate-600 h-1.5 rounded-full overflow-hidden">
                                            <div class="
                                h-1.5 rounded-full
                                @if ($category->feasibility_percent >= 80) bg-emerald-500
                                @elseif($category->feasibility_percent >= 50) bg-amber-500
                                @else bg-red-500 @endif
                            "
                                                style="width: {{ $category->feasibility_percent }}%">
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Aksi --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="" {{-- <a href="{{ route('categories.show', $category->id) }}" --}}
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 transition">
                                            <i class="ph-bold ph-eye text-lg"></i>
                                        </a>

                                        <a href="{{ route('categories.export.single', $category->id) }}"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-500/20 transition">
                                            <i class="ph-bold ph-file-text text-lg"></i>
                                        </a>

                                        <button
                                            onclick="openEditModal(
                                                {{ $category->id }},
                                                '{{ $category->name }}',
                                                '{{ $category->parent_id }}',
                                                {{ $category->is_active ? 'true' : 'false' }}
                                            )"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-500/20 transition">
                                            <i class="ph-bold ph-pencil-simple text-lg"></i>
                                        </button>


                                        <form id="delete-form-{{ $category->id }}"
                                            action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                onclick="confirmDelete('{{ $category->name }}', {{ $category->id }})"
                                                class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/20 transition">
                                                <i class="ph-bold ph-trash text-lg"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-slate-400">
                                    Data kategori belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div
                class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan
                    <span class="font-bold text-slate-800 dark:text-white">
                        {{ $categories->firstItem() }}-{{ $categories->lastItem() }}
                    </span>
                    dari
                    <span class="font-bold text-slate-800 dark:text-white">
                        {{ $categories->total() }}
                    </span>
                    kategori
                </p>


                {{ $categories->links('vendor.pagination.hanania') }}

            </div>

        </div>
    </section>
    {{-- MODAL TAMBAH KATEGORI --}}
    <div id="modalCategory" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">

        <div class="bg-white dark:bg-darkCard w-full max-w-md rounded-3xl shadow-xl">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                {{-- Header --}}
                <div class="px-6 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Tambah Kategori
                    </h3>
                    <p class="text-sm text-slate-400">
                        Buat kategori utama atau sub kategori
                    </p>
                </div>

                {{-- Body --}}
                <div class="p-6 space-y-4">

                    {{-- Nama --}}
                    <div>
                        <label class="text-sm font-bold text-slate-600 dark:text-slate-300">
                            Nama Kategori
                        </label>
                        <input type="text" name="name" required
                            class="mt-1 w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-indigo-500/50 focus:outline-none">
                    </div>

                    {{-- Parent --}}
                    <div>
                        <label class="text-sm font-bold text-slate-600 dark:text-slate-300">
                            Parent Kategori
                        </label>
                        <select name="parent_id"
                            class="mt-1 w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-sm focus:outline-none">
                            <option value="">Main Category</option>
                            @foreach ($categories as $cat)
                                @if (!$cat->parent_id)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="is_active" value="1" checked
                            class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                        <span class="text-sm text-slate-600 dark:text-slate-300">
                            Aktifkan kategori
                        </span>
                    </div>

                </div>

                {{-- Footer --}}
                <div class="px-6 py-4 border-t border-slate-100 dark:border-slate-700 flex justify-end gap-2">
                    <button type="button" onclick="closeCategoryModal()"
                        class="px-4 py-2 rounded-xl text-sm font-bold text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-700">
                        Batal
                    </button>

                    <button type="submit"
                        class="px-5 py-2 rounded-xl bg-indigo-600 text-white text-sm font-bold hover:bg-indigo-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL EDIT KATEGORI --}}
    <div id="modalEditCategory"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">

        <div class="bg-white dark:bg-darkCard w-full max-w-md rounded-3xl shadow-xl">
            <form id="editCategoryForm" method="POST">
                @csrf
                @method('PUT')

                {{-- Header --}}
                <div class="px-6 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                        Edit Kategori
                    </h3>
                    <p class="text-sm text-slate-400">
                        Perbarui data kategori
                    </p>
                </div>

                {{-- Body --}}
                <div class="p-6 space-y-4">

                    {{-- Nama --}}
                    <div>
                        <label class="text-sm font-bold text-slate-600 dark:text-slate-300">
                            Nama Kategori
                        </label>
                        <input type="text" name="name" id="edit_name" required
                            class="mt-1 w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-sm focus:ring-2 focus:ring-indigo-500/50 focus:outline-none">
                    </div>

                    {{-- Parent --}}
                    <div>
                        <label class="text-sm font-bold text-slate-600 dark:text-slate-300">
                            Parent Kategori
                        </label>
                        <select name="parent_id" id="edit_parent"
                            class="mt-1 w-full px-4 py-2.5 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-sm">
                            <option value="">Main Category</option>
                            @foreach ($categories as $cat)
                                @if (!$cat->parent_id)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="flex items-center gap-2">
                        <input type="hidden" name="is_active" value="0">

                        <input type="checkbox" name="is_active" id="edit_active" value="1"
                            class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">

                        <span class="text-sm text-slate-600 dark:text-slate-300">
                            Aktifkan kategori
                        </span>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="px-6 py-4 border-t border-slate-100 dark:border-slate-700 flex justify-end gap-2">
                    <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 rounded-xl text-sm font-bold text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-700">
                        Batal
                    </button>

                    <button type="submit"
                        class="px-5 py-2 rounded-xl bg-indigo-600 text-white text-sm font-bold hover:bg-indigo-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, name, parentId, isActive) {
            const modal = document.getElementById('modalEditCategory');
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            document.getElementById('edit_name').value = name;
            document.getElementById('edit_parent').value = parentId ?? '';
            document.getElementById('edit_active').checked = isActive;

            document.getElementById('editCategoryForm').action =
                `/admin/categories/${id}`;
        }

        function closeEditModal() {
            const modal = document.getElementById('modalEditCategory');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function confirmDelete(name, id) {
            if (confirm(`Yakin ingin menghapus kategori "${name}"?`)) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        }
    </script>


    <script>
        function openCategoryModal() {
            document.getElementById('modalCategory').classList.remove('hidden');
            document.getElementById('modalCategory').classList.add('flex');
        }

        function closeCategoryModal() {
            document.getElementById('modalCategory').classList.add('hidden');
            document.getElementById('modalCategory').classList.remove('flex');
        }
    </script>
@endsection
