@extends('layouts.admin')

@section('title', 'Kelola Pesanan - Hanania POS')

@section('content')
    <section id="kelola-pesanan" class="page-section active max-w-7xl mx-auto space-y-6">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Kelola Pesanan
                </h1>
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Manajemen data pemesanan dan riwayat transaksi supplier.
                </p>
            </div>

            <a href="{{ route('purchase-orders.create') }}"
                class="group flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-bold transition-all shadow-lg shadow-indigo-200 dark:shadow-none hover:-translate-y-0.5">
                <i class="ph-bold ph-plus text-lg"></i>
                <span>Pesanan Baru</span>
            </a>
        </div>

        <div class="bg-white dark:bg-darkCard p-5 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">

                <div class="md:col-span-5 grid grid-cols-2 gap-3">
                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 ml-1">Dari Tanggal</label>
                        <div class="relative">
                            <i class="ph-bold ph-calendar absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="date" name="from_date" value="{{ request('from_date') }}"
                                class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition">
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 ml-1">Sampai Tanggal</label>
                        <div class="relative">
                            <i class="ph-bold ph-calendar absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="date" name="to_date" value="{{ request('to_date') }}"
                                class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition">
                        </div>
                    </div>
                </div>

                <div class="md:col-span-5 space-y-1.5">
                    <label class="text-xs font-bold text-slate-500 dark:text-slate-400 ml-1">Cari Pesanan</label>
                    <div class="relative">
                        <i class="ph-bold ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="text" placeholder="Cari No Order, Supplier..." name="search" value="{{ request('search') }}"
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition">
                    </div>
                </div>

                <div class="md:col-span-2">
                    <button type="submit"
                        class="w-full py-2.5 px-4 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-500/20 rounded-xl font-bold text-sm hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition flex items-center justify-center gap-2">
                        <i class="ph-bold ph-file-xls text-lg"></i>
                        Export Excel
                    </button>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">No Order</th>
                            <th class="px-6 py-4 font-bold">Supplier</th>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 font-bold">Jumlah Bayar</th>
                            <th class="px-6 py-4 font-bold">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        @foreach ($orders as $order)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">{{ $loop->iteration + ($orders->currentPage()-1)*$orders->perPage() }}</td>
                            <td class="px-6 py-4 font-mono font-medium text-slate-700 dark:text-slate-300">#{{ $order->reference_no }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 flex items-center justify-center">
                                        <i class="ph-fill ph-buildings"></i>
                                    </div>
                                    <span class="font-bold text-slate-700 dark:text-slate-200">{{ $order->supplier->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ $order->order_date }}</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $statusColor = match($order->status) {
                                        'completed' => 'emerald',
                                        'pending' => 'amber',
                                        'cancelled' => 'red',
                                        default => 'slate',
                                    };
                                @endphp

                                <span class="px-3 py-1 bg-{{ $statusColor }}-100 text-{{ $statusColor }}-700 rounded-full text-xs font-bold">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('purchase-orders.show', $order) }}"
                                        class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 transition"
                                        title="Detail">
                                        <i class="ph-bold ph-eye"></i>
                                </a>
                                    <a href="{{ route('purchase-orders.edit', $order) }}"
                                        class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-orange-500 hover:bg-orange-50 dark:hover:bg-orange-500/20 transition"
                                        title="Edit">
                                        <i class="ph-bold ph-pencil-simple"></i>
                                    </a>
                                    <form method="POST" action="{{ route('purchase-orders.destroy', $order) }}">
                @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus pesanan?')"
                                        class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-500/20 transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div
                class="p-4 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">{{ $orders->firstItem() }}</span> sampai <span
                        class="font-bold text-slate-800 dark:text-white">{{ $orders->lastItem() }}</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">{{ $orders->total() }}</span> pesanan
                </p>
                {{ $orders->links('vendor.pagination.hanania') }}

            </div>
        </div>

    </section>
@endsection
