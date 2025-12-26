@extends('layouts.admin')

@section('title', 'Catatan - Hanania POS')

@section('content')
    <section id="catatan" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h1 class="font-display font-bold text-2xl text-slate-800 dark:text-white">
                    Manajemen Catatan
                </h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Kelola catatan operasional dan pengingat penting.
                </p>
            </div>

            <div class="flex items-center gap-3 w-full md:w-auto">
                <button
                    class="flex-1 md:flex-none items-center justify-center gap-2 px-5 py-2.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 font-bold text-sm rounded-xl border border-emerald-100 dark:border-emerald-500/20 hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition">
                    <i class="ph-bold ph-microsoft-excel-logo text-lg"></i>
                    <span>Ekspor Excel</span>
                </button>

                <button
                    class="flex-1 md:flex-none items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 text-white font-bold text-sm rounded-xl shadow-lg shadow-indigo-200/50 dark:shadow-none hover:bg-indigo-700 hover:-translate-y-0.5 transition duration-300">
                    <i class="ph-bold ph-plus text-lg"></i>
                    <span>Tambah Catatan</span>
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">

            <div
                class="p-5 md:p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">

                <div class="relative w-full md:w-72">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                        <i class="ph-bold ph-magnifying-glass text-lg"></i>
                    </span>
                    <form action="{{ route('notes.index') }}" method="GET">
                        <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari judul catatan..."
                            class="w-full pl-10 pr-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 text-slate-600 dark:text-slate-300 placeholder-slate-400 transition">
                    </form>
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider hidden md:block">Urutkan:</span>
                    <select
                        class="bg-transparent text-sm font-bold text-slate-600 dark:text-slate-300 border-none focus:ring-0 cursor-pointer">
                        <option>Terbaru</option>
                        <option>Terlama</option>
                        <option>A-Z</option>
                    </select>

                    <a href="{{ route('notes.create') }}" class="px-4 py-2.5 bg-indigo-600 text-white rounded-xl font-bold text-sm shadow-lg shadow-indigo-200/50 hover:bg-indigo-700 transition">
                        <i class="ph-bold ph-plus"></i>
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">Judul Catatan</th>
                            <th class="px-6 py-4 font-bold w-48">Ditambahkan</th>
                            <th class="px-6 py-4 font-bold text-right w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        @forelse($notes as $index => $note)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4 font-mono font-medium text-slate-500 dark:text-slate-400">{{ $notes->firstItem() + $index }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-800 dark:text-slate-200 text-base">{{ $note->title }}</span>
                                        <span class="text-xs text-slate-500 dark:text-slate-400 mt-1 line-clamp-1">{{ Str::limit(strip_tags($note->body), 120) }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2 text-slate-500 dark:text-slate-400">
                                        <i class="ph-fill ph-calendar-blank"></i>
                                        <span>{{ $note->created_at->format('d M Y') }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end items-center gap-2">
                                        <a href="{{ route('notes.edit', $note) }}" title="Edit" class="w-8 h-8 rounded-lg flex items-center justify-center bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-500/20 transition">
                                            <i class="ph-bold ph-pencil-simple"></i>
                                        </a>

                                        <form action="{{ route('notes.destroy', $note) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus catatan ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="w-8 h-8 rounded-lg flex items-center justify-center bg-red-50 dark:bg-red-500/10 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-500/20 transition" title="Hapus">
                                                <i class="ph-bold ph-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-6 text-center text-slate-500">Tidak ada catatan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div
                class="px-6 py-4 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">{{ $notes->firstItem() ?? 0 }}</span> sampai <span class="font-bold text-slate-800 dark:text-white">{{ $notes->lastItem() ?? 0 }}</span> dari <span class="font-bold text-slate-800 dark:text-white">{{ $notes->total() }}</span> catatan
                </p>

                <div class="flex items-center gap-2">
                    {{ $notes->links('vendor.pagination.hanania') }}
                </div>
            </div>

        </div>
    </section>
@endsection
