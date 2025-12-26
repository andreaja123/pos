@extends('layouts.admin')

@section('title', 'Kelola Voucher - Hanania POS')

@section('content')
    <section id="voucher-management" class="page-section active max-w-7xl mx-auto">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Total Voucher</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">{{ $totalVouchers }}</h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-ticket text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden">
                    <div class="bg-indigo-500 h-1.5 rounded-full" style="width: 100%"></div>
                </div>
                <p class="text-slate-400 text-xs font-medium">Semua voucher yang dibuat</p>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Voucher Aktif</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">{{ $activeCount }}</h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-check-circle text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden">
                    <div class="bg-emerald-500 h-1.5 rounded-full" style="width: {{ $activePercent }}%"></div>
                </div>
                <p class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                    <span
                        class="bg-emerald-100 dark:bg-emerald-500/20 px-1.5 py-0.5 rounded text-emerald-600 dark:text-emerald-400">Siap
                        Pakai</span>
                </p>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Sudah Terpakai</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">{{ $usedCount }}</h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-blue-50 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-receipt text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden">
                    <div class="bg-blue-500 h-1.5 rounded-full" style="width: {{ $usedPercent }}%"></div>
                </div>
                <p class="text-slate-400 text-xs font-medium">Klaim user bulan ini</p>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Kadaluarsa</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">{{ $expiredCount }}</h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-red-50 dark:bg-red-500/20 text-red-600 dark:text-red-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-warning-circle text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden">
                    <div class="bg-red-500 h-1.5 rounded-full" style="width: {{ $expiredPercent }}%"></div>
                </div>
                <p class="text-red-500 text-xs font-bold flex items-center gap-1">
                    <span
                        class="bg-red-100 dark:bg-red-500/20 px-1.5 py-0.5 rounded text-red-600 dark:text-red-400">Non-aktif</span>
                </p>
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

            <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">Daftar Voucher</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Kelola kode promo dan diskon toko</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                    <form action="{{ route('vouchers.index') }}" method="GET" class="relative w-full md:w-64">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="ph-bold ph-magnifying-glass text-lg"></i>
                        </span>
                        <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari nama atau kode..."
                            class="w-full pl-10 pr-4 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 text-slate-600 dark:text-slate-300 placeholder-slate-400 transition">
                    </form>

                    <button
                        class="flex items-center justify-center gap-2 px-4 py-2.5 border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-bold text-sm rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        <i class="ph-bold ph-file-xls text-green-600"></i>
                        <span class="hidden sm:inline">Ekspor</span>
                    </button>

                    <a href="{{ route('vouchers.create') }}" class="flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm rounded-xl shadow-lg shadow-indigo-200/50 dark:shadow-none transition">
                        <i class="ph-bold ph-plus"></i>
                        <span>Tambah Voucher</span>
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display uppercase text-xs tracking-wider border-b border-slate-100 dark:border-slate-700">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">Nama Voucher</th>
                            <th class="px-6 py-4 font-bold">Kode</th>
                            <th class="px-6 py-4 font-bold">Nilai Kupon</th>
                            <th class="px-6 py-4 font-bold">Berlaku Hingga</th>
                            <th class="px-6 py-4 font-bold text-center">Tersedia</th>
                            <th class="px-6 py-4 font-bold text-center">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        @forelse($vouchers as $index => $voucher)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition group">
                                <td class="px-6 py-4 font-mono text-slate-400">{{ $vouchers->firstItem() + $index }}</td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">{{ $voucher->name ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <span class="font-mono bg-slate-100 dark:bg-slate-700 px-2 py-1 rounded text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-600">{{ $voucher->code }}</span>
                                </td>
                                <td class="px-6 py-4 text-slate-800 dark:text-slate-200">
                                    @if($voucher->value_type === 'percent')
                                        Diskon <span class="font-bold text-orange-500">{{ rtrim(rtrim(number_format($voucher->value,2), '0'), '.') }}%</span>
                                    @else
                                        Potongan <span class="font-bold text-indigo-600">Rp {{ number_format($voucher->value, 0, ',', '.') }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $voucher->valid_until?->format('d M Y') ?? '-' }}</td>
                                <td class="px-6 py-4 text-center font-bold">{{ $voucher->used_count }} / {{ $voucher->quantity }}</td>
                                <td class="px-6 py-4 text-center">
                                    @if($voucher->active && (!$voucher->valid_until || $voucher->valid_until->isFuture()))
                                        <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30">Aktif</span>
                                    @elseif($voucher->valid_until && $voucher->valid_until->isPast())
                                        <span class="px-3 py-1 bg-slate-200 dark:bg-slate-600 text-slate-500 dark:text-slate-300 rounded-full text-xs font-bold border border-slate-300 dark:border-slate-500">Kadaluarsa</span>
                                    @else
                                        <span class="px-3 py-1 bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400 rounded-full text-xs font-bold border border-amber-200 dark:border-amber-500/30">Menipis</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2 opacity-60 group-hover:opacity-100 transition">
                                        <a href="{{ route('vouchers.edit', $voucher->id ?? $voucher) ?? '#' }}" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-600 rounded-lg text-slate-400 hover:text-indigo-600 transition"><i class="ph-bold ph-pencil-simple"></i></a>
                                        <form action="{{ route('vouchers.destroy', $voucher->id ?? $voucher) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus voucher ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="p-2 hover:bg-red-50 dark:hover:bg-red-500/20 rounded-lg text-slate-400 hover:text-red-600 transition"><i class="ph-bold ph-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-6 text-center text-slate-500">Tidak ada voucher.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div
                class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400 text-center sm:text-left">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">{{ $vouchers->firstItem() ?? 0 }}</span> sampai <span class="font-bold text-slate-800 dark:text-white">{{ $vouchers->lastItem() ?? 0 }}</span> dari <span class="font-bold text-slate-800 dark:text-white">{{ $vouchers->total() }}</span> data
                </p>
                <div class="flex gap-2 items-center">
                    {{ $vouchers->links('vendor.pagination.hanania') }}
                </div>
            </div>
        </div>
    </section>
@endsection
