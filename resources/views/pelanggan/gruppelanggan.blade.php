@extends('layouts.admin')

@section('title', 'Grup Pelanggan - Hanania POS')

@section('content')
    <section id="grup-pelanggan" class="page-section active max-w-7xl mx-auto">

        <div class="mb-8">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Grup Pelanggan
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Kelola segmentasi dan kategori pelanggan untuk promosi
                </p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('groups.create') }}" class="flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl transition shadow-lg shadow-indigo-200 dark:shadow-none">
                    <i class="ph-bold ph-plus"></i>
                    <span>Tambah Grup Baru</span>
                </a>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">

            @if(session('success'))
                <div class="p-4">
                    <div class="rounded-lg p-3 bg-emerald-50 border border-emerald-100 text-emerald-800">{{ session('success') }}</div>
                </div>
            @endif

            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row gap-4 justify-between items-center">
                <form class="relative w-full sm:w-72" action="{{ route('groups.index') }}" method="GET">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">
                        <i class="ph-bold ph-magnifying-glass"></i>
                    </span>
                    <input name="q" value="{{ request('q') }}" type="text" placeholder="Cari nama grup..."
                        class="w-full pl-10 pr-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 text-slate-600 dark:text-slate-300 placeholder-slate-400 transition" />
                </form>


            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display border-b border-slate-100 dark:border-slate-700">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">Nama Grup</th>
                            <th class="px-6 py-4 font-bold">Total Pelanggan</th>
                            <th class="px-6 py-4 font-bold text-center">Status Diskon</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        @forelse($groups as $index => $group)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition group">
                                <td class="px-6 py-4 font-mono text-slate-500">{{ $groups->firstItem() + $index }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 flex items-center justify-center">
                                            <i class="ph-fill ph-users text-xl"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-800 dark:text-white">{{ $group->name }}</h4>
                                            @if($group->description)
                                                <p class="text-xs text-slate-400">{{ $group->description }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-slate-800 dark:text-white">{{ $group->customers_count }}</span>
                                        <span class="text-xs px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-700 text-slate-500">Orang</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($group->discount_percentage)
                                    <span
                                        class="px-3 py-1 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 rounded-lg text-xs font-bold border border-indigo-100 dark:border-indigo-500/20">
                                        Aktif {{ rtrim(rtrim(number_format($group->discount_percentage,2), '0'), '.') }}%
                                    </span>
                                    @else
                                    <span
                                        class="px-3 py-1 bg-slate-100 dark:bg-slate-700 text-slate-400 rounded-lg text-xs font-bold border border-slate-200 dark:border-slate-600">
                                        Tanpa Diskon
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('groups.edit', $group) }}" title="Edit Grup" class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-orange-500 hover:bg-orange-50 dark:hover:bg-orange-900/20 transition"><i class="ph-bold ph-pencil-simple text-lg"></i></a>

                                        <form action="{{ route('groups.destroy', $group) }}" method="POST" onsubmit="return confirm('Hapus grup ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition" title="Hapus"><i class="ph-bold ph-trash text-lg"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-6 text-center text-slate-500">Tidak ada grup pelanggan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div
                class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">{{ $groups->firstItem() ?? 0 }}</span> sampai <span class="font-bold text-slate-800 dark:text-white">{{ $groups->lastItem() ?? 0 }}</span> dari <span class="font-bold text-slate-800 dark:text-white">{{ $groups->total() }}</span> grup
                </p>
                <div class="flex items-center gap-2">
                    {{ $groups->links('vendor.pagination.hanania') }}
                </div>
            </div>



        </div>
    </div>
    </section>
@endsection
