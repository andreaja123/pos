@extends('layouts.admin')

@section('title', 'Kelola Pelanggan - Hanania POS')

@section('content')
    <section id="kelola-pelanggan" class="page-section active max-w-7xl mx-auto">

        <div class="mb-8">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-6">
                <div>
                    <h1 class="font-display font-bold text-2xl text-slate-800 dark:text-white">
                        Kelola Pelanggan
                    </h1>
                    <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                        Manajemen data pelanggan dan riwayat interaksi.
                    </p>
                </div>

                <a href="{{ route('customers.create') }}"
                    class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg shadow-indigo-200/50 dark:shadow-none transition transform hover:-translate-y-0.5">
                    <i class="ph-bold ph-plus"></i>
                    <span>Tambah Pelanggan</span>
                </a>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-4 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm flex flex-col lg:flex-row gap-4 justify-between items-center">

                <div class="flex flex-wrap gap-2 w-full lg:w-auto">
                    <div class="relative group">
                        <button
                            class="px-4 py-2 bg-slate-50 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-sm font-bold rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-100 dark:hover:bg-slate-600 transition flex items-center gap-2">
                            <i class="ph-bold ph-checks"></i>
                            <span>Aksi Masal</span>
                            <i class="ph-bold ph-caret-down"></i>
                        </button>
                        <div
                            class="absolute top-full left-0 mt-2 w-48 bg-white dark:bg-darkCard rounded-xl shadow-xl border border-slate-100 dark:border-slate-600 hidden group-hover:block z-20 overflow-hidden">
                            <a href="#"
                                class="block px-4 py-3 text-sm text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 flex items-center gap-2">
                                <i class="ph-bold ph-envelope-simple"></i> Email Dipilih
                            </a>
                            <a href="#"
                                class="block px-4 py-3 text-sm text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 flex items-center gap-2">
                                <i class="ph-bold ph-chat-text"></i> SMS Dipilih
                            </a>
                            <div class="h-px bg-slate-100 dark:bg-slate-700 my-0"></div>
                            <a href="#"
                                class="block px-4 py-3 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 flex items-center gap-2">
                                <i class="ph-bold ph-trash"></i> Hapus Dipilih
                            </a>
                        </div>
                    </div>

                    <button
                        class="px-4 py-2 bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400 text-sm font-bold rounded-xl border border-amber-200 dark:border-amber-700 hover:bg-amber-100 dark:hover:bg-amber-900/40 transition flex items-center gap-2">
                        <i class="ph-bold ph-warning-circle"></i>
                        <span>Filter Unpaid</span>
                    </button>

                    <button
                        class="px-4 py-2 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 text-sm font-bold rounded-xl border border-emerald-200 dark:border-emerald-700 hover:bg-emerald-100 dark:hover:bg-emerald-900/40 transition flex items-center gap-2">
                        <i class="ph-bold ph-microsoft-excel-logo"></i>
                        <span>Export Excel</span>
                    </button>
                </div>

                <form method="GET" action="{{ route('customers.index') }}" class="relative w-full lg:w-72">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                        <i class="ph-bold ph-magnifying-glass text-lg"></i>
                    </span>
                    <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari nama, email, atau no hp..."
                        class="w-full pl-10 pr-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 text-slate-600 dark:text-slate-300 placeholder-slate-400 transition">
                </form>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">

            @if(session('success'))
                <div class="p-4">
                    <div class="rounded-lg bg-emerald-50 border border-emerald-100 text-emerald-700 px-4 py-3">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display border-b border-slate-100 dark:border-slate-700">
                        <tr>
                            <th class="px-6 py-4 w-10">
                                <div class="flex items-center">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                            </th>
                            <th class="px-6 py-4 font-bold">No</th>
                            <th class="px-6 py-4 font-bold">Nama Pelanggan</th>
                            <th class="px-6 py-4 font-bold">Kontak (Email / Telp)</th>
                            <th class="px-6 py-4 font-bold">Alamat</th>
                            <th class="px-6 py-4 font-bold text-center">Status</th>
                            <th class="px-6 py-4 font-bold text-center w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        @forelse($customers as $customer)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="selected[]" value="{{ $customer->id }}"
                                            class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-mono text-slate-500">{{ $customers->firstItem() + $loop->index }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @php
                                            $parts = explode(' ', trim($customer->name));
                                            $initials = strtoupper(collect($parts)->map(fn($w) => $w[0])->slice(0,2)->implode(''));
                                        @endphp
                                        <div
                                            class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300 flex items-center justify-center font-bold text-sm">
                                            {{ $initials }}</div>
                                        <div>
                                            <span class="block font-bold text-slate-800 dark:text-slate-200">{{ $customer->name }}</span>
                                            <span class="text-xs text-slate-400">ID: #CUST-{{ str_pad($customer->id, 3, '0', STR_PAD_LEFT) }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col gap-1">
                                        <div class="flex items-center gap-2 text-slate-500 dark:text-slate-400">
                                            <i class="ph-fill ph-envelope"></i>
                                            <span>{{ $customer->email ?? '-' }}</span>
                                        </div>
                                        <div class="flex items-center gap-2 text-slate-500 dark:text-slate-400">
                                            <i class="ph-fill ph-phone"></i>
                                            <span>{{ $customer->phone ?? '-' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="line-clamp-2 w-48" title="{{ $customer->billing_address }} {{ $customer->billing_city }}">
                                        {{ $customer->billing_address }} {{ $customer->billing_city }} {{ $customer->billing_state }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('customers.edit', $customer) }}" title="Edit"
                                            class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-900/50 dark:hover:text-amber-300 transition">
                                            <i class="ph-bold ph-pencil-simple text-lg"></i>
                                        </a>

                                        <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete"
                                                class="p-2 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/50 dark:hover:text-red-300 transition">
                                                <i class="ph-bold ph-trash text-lg"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-slate-500">Tidak ada pelanggan ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div
                class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">{{ $customers->firstItem() ?? 0 }}</span> sampai <span
                        class="font-bold text-slate-800 dark:text-white">{{ $customers->lastItem() ?? 0 }}</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">{{ $customers->total() }}</span> pelanggan
                </p>
                <div class="flex gap-2 items-center">
                    {{ $customers->links('vendor.pagination.hanania') }}
                </div>
            </div>
        </div>
        <script>
            document.querySelectorAll('.delete-form').forEach(function(form){
                form.addEventListener('submit', function(e){
                    if(!confirm('Yakin ingin menghapus pelanggan ini?')){
                        e.preventDefault();
                    }
                });
            });
        </script>
    </section>
@endsection
