@extends('layouts.admin')

@section('title', 'Dokumen - Hanania POS')

@section('content')
    <section id="dokumen" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-display font-bold text-slate-800 dark:text-white mb-2">
                    Kelola Dokumen
                </h2>
                <p class="text-slate-500 dark:text-slate-400">
                    Arsip digital dan laporan manajemen.
                </p>
            </div>

            <div class="bg-white dark:bg-darkCard px-6 py-3 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm flex items-center gap-4">
                <div class="w-10 h-10 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-xl flex items-center justify-center">
                    <i class="ph-fill ph-files text-xl"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 font-bold">Total File</p>
                    <p class="text-xl font-display font-bold text-slate-800 dark:text-white">{{ number_format($total) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none overflow-hidden">

            <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">

                <form method="GET" action="{{ route('documents.index') }}" class="relative w-full md:w-96">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="ph-bold ph-magnifying-glass text-slate-400"></i>
                    </span>
                    <input name="q" value="{{ request('q') }}" type="text"
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white placeholder-slate-400 transition"
                        placeholder="Cari judul dokumen...">
                </form>

                <div class="flex items-center gap-3 w-full md:w-auto">
                    <a href="#" class="flex-1 md:flex-none flex items-center justify-center gap-2 px-4 py-2.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-500/20 rounded-xl text-sm font-bold hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition">
                        <i class="ph-fill ph-microsoft-excel-logo text-lg"></i>
                        <span>Export Excel</span>
                    </a>

                    <a href="{{ route('documents.create') }}" class="flex-1 md:flex-none flex items-center justify-center gap-2 px-4 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-bold shadow-lg shadow-indigo-200/50 dark:shadow-none hover:bg-indigo-700 transition">
                        <i class="ph-bold ph-plus"></i>
                        <span>Tambah Dokumen</span>
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="px-6 py-4 text-sm text-green-600 font-bold">{{ session('success') }}</div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">Judul Dokumen</th>
                            <th class="px-6 py-4 font-bold">Kategori</th>
                            <th class="px-6 py-4 font-bold">Ditambahkan</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        @forelse($documents as $idx => $doc)
                            <tr class="group hover:bg-slate-50 dark:hover:bg-slate-700/50 transition duration-200">
                                <td class="px-6 py-4 font-mono text-slate-500">{{ $documents->firstItem() + $idx }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-slate-50 dark:bg-slate-800 text-slate-600 flex items-center justify-center">
                                            @php
                                                $ext = strtolower(pathinfo($doc->original_name, PATHINFO_EXTENSION));
                                            @endphp
                                            @if(in_array($ext, ['pdf']))
                                                <i class="ph-fill ph-file-pdf text-2xl text-red-600"></i>
                                            @elseif(in_array($ext, ['xls','xlsx','csv']))
                                                <i class="ph-fill ph-file-xls text-2xl text-emerald-600"></i>
                                            @elseif(in_array($ext, ['doc','docx']))
                                                <i class="ph-fill ph-file-doc text-2xl text-blue-600"></i>
                                            @else
                                                <i class="ph-fill ph-file text-2xl text-slate-600"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-800 dark:text-white group-hover:text-indigo-600 transition">{{ $doc->title }}</h4>
                                            <p class="text-xs text-slate-400">{{ strtoupper(pathinfo($doc->original_name, PATHINFO_EXTENSION)) }} • {{ number_format($doc->size / 1024, 1) }} KB</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-xs font-bold border border-slate-200 dark:border-slate-600">
                                        {{ $doc->category ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-700 dark:text-slate-200">{{ $doc->created_at->isoFormat('D MMM YYYY') }}</span>
                                        <span class="text-xs text-slate-400">{{ $doc->created_at->format('H:i') }} WIB</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('documents.download', $doc) }}" class="p-2 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 transition" title="Download">
                                            <i class="ph-bold ph-download-simple text-lg"></i>
                                        </a>
                                        <a href="{{ route('documents.edit', $doc) }}" class="p-2 rounded-lg text-slate-400 hover:text-orange-500 hover:bg-orange-50 dark:hover:bg-orange-500/20 transition" title="Edit">
                                            <i class="ph-bold ph-pencil-simple text-lg"></i>
                                        </a>
                                        <form action="{{ route('documents.destroy', $doc) }}" method="POST" onsubmit="return confirm('Hapus dokumen ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 rounded-lg text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-500/20 transition" title="Hapus">
                                                <i class="ph-bold ph-trash text-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-slate-400">Tidak ada dokumen.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">{{ $documents->firstItem() ?? 0 }}</span> sampai <span class="font-bold text-slate-800 dark:text-white">{{ $documents->lastItem() ?? 0 }}</span> dari <span class="font-bold text-slate-800 dark:text-white">{{ $documents->total() }}</span> hasil
                </p>

                <div class="flex items-center gap-2">
                    {{ $documents->links('vendor.pagination.hanania') }}
                </div>
            </div>

        </div>
    </section>
@endsection
