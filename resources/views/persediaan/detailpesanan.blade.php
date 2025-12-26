@extends('layouts.admin')

@section('title', 'Detail Pesanan - ' . $purchaseOrder->reference_no)

@section('content')
    <section class="max-w-7xl mx-auto pb-20">

        {{-- Header Navigation --}}
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('purchase-orders.index') }}"
                class="w-10 h-10 rounded-xl bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                <i class="ph-bold ph-arrow-left text-lg"></i>
            </a>
            <div>
                <h1 class="font-display font-bold text-2xl text-slate-800 dark:text-white">Detail Pesanan</h1>
                <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
                    <span>Purchase Order</span>
                    <i class="ph-bold ph-caret-right text-xs"></i>
                    <span class="font-mono">{{ $purchaseOrder->reference_no }}</span>
                </div>
            </div>

            <div class="ml-auto flex gap-3">
                <a href="#" onclick="window.print()" class="px-5 py-2.5 rounded-xl bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 transition flex items-center gap-2">
                    <i class="ph-bold ph-printer"></i> Print
                </a>
                {{-- Cara Paling Aman --}}
<a href="{{ route('purchase-orders.edit', $purchaseOrder) }}"
   class="px-5 py-2.5 rounded-xl bg-indigo-600 text-white font-bold text-sm hover:bg-indigo-700 shadow-lg shadow-indigo-200 dark:shadow-none flex items-center gap-2 transition">
    <i class="ph-bold ph-pencil-simple"></i> Edit Pesanan
</a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Kolom Kiri: Detail Utama --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- Kartu Info Utama --}}
                <div class="bg-white dark:bg-darkCard p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm flex flex-col md:flex-row gap-8 items-start">
                    <div class="flex-1 w-full">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                @php
                                    $statusColor = match($purchaseOrder->status) {
                                        'completed' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                                        'pending' => 'bg-amber-100 text-amber-700 border-amber-200',
                                        'cancelled' => 'bg-red-100 text-red-700 border-red-200',
                                        default => 'bg-slate-100 text-slate-700 border-slate-200',
                                    };
                                @endphp
                                <span class="inline-block px-3 py-1 rounded-lg text-xs font-bold border {{ $statusColor }} uppercase tracking-wider mb-2">
                                    {{ $purchaseOrder->status }}
                                </span>
                                <h2 class="text-3xl font-display font-bold text-slate-800 dark:text-white mb-1">{{ $purchaseOrder->reference_no }}</h2>
                                <p class="text-slate-500 dark:text-slate-400 text-sm flex items-center gap-2">
                                    <i class="ph-bold ph-calendar-blank"></i>
                                    {{ date('d F Y', strtotime($purchaseOrder->order_date)) }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-slate-400 font-bold uppercase mb-1">Total Tagihan</p>
                                <p class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">Rp {{ number_format($purchaseOrder->grand_total, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <hr class="border-slate-100 dark:border-slate-700 my-6">

                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase mb-1">Gudang Tujuan</p>
                                <p class="text-slate-700 dark:text-white font-bold flex items-center gap-2">
                                    <i class="ph-fill ph-warehouse text-indigo-500"></i>
                                    {{ $purchaseOrder->warehouse->name }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase mb-1">Dibuat Oleh</p>
                                <p class="text-slate-700 dark:text-white font-bold flex items-center gap-2">
                                    <i class="ph-fill ph-user-circle text-slate-400"></i>
                                    {{ $purchaseOrder->user->name ?? 'Admin' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tabel Item Barang --}}
                <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-100 dark:border-slate-700">
                        <h3 class="font-bold text-lg text-slate-800 dark:text-white">Item Pembelian</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-bold uppercase text-xs">
                                <tr>
                                    <th class="px-6 py-4">Produk</th>
                                    <th class="px-6 py-4 text-center">Qty</th>
                                    <th class="px-6 py-4 text-right">Harga Satuan</th>
                                    <th class="px-6 py-4 text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                                @foreach ($purchaseOrder->items as $detail)
                                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/20 transition">
                                        <td class="px-6 py-4">
                                            <p class="font-bold text-slate-700 dark:text-white">{{ $detail->product->name }}</p>
                                            <p class="text-xs text-slate-400">{{ $detail->product->code }}</p>
                                        </td>
                                        <td class="px-6 py-4 text-center font-bold text-slate-600 dark:text-slate-300">
                                            {{ $detail->qty }}
                                        </td>
                                        <td class="px-6 py-4 text-right font-mono text-slate-600 dark:text-slate-300">
                                            Rp {{ number_format($detail->price, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 text-right font-bold text-slate-800 dark:text-white">
                                            Rp {{ number_format($detail->subtotal, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Supplier & Summary --}}
            <div class="space-y-8">

                {{-- Info Supplier --}}
                <div class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <i class="ph-duotone ph-buildings text-8xl text-indigo-600"></i>
                    </div>
                    <h3 class="font-bold text-lg text-slate-800 dark:text-white mb-4">Info Supplier</h3>

                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-full bg-indigo-100 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-300 flex items-center justify-center font-bold text-lg">
                            {{ substr($purchaseOrder->supplier->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="font-bold text-slate-800 dark:text-white">{{ $purchaseOrder->supplier->company }}</p>
                            <p class="text-sm text-slate-500 dark:text-slate-400">{{ $purchaseOrder->supplier->name }}</p>
                        </div>
                    </div>

                    <div class="space-y-3 text-sm">
                        <div class="flex items-start gap-3 text-slate-600 dark:text-slate-300">
                            <i class="ph-bold ph-envelope-simple mt-0.5 text-indigo-500"></i>
                            <span>{{ $purchaseOrder->supplier->email }}</span>
                        </div>
                        <div class="flex items-start gap-3 text-slate-600 dark:text-slate-300">
                            <i class="ph-bold ph-phone mt-0.5 text-indigo-500"></i>
                            <span>{{ $purchaseOrder->supplier->phone }}</span>
                        </div>
                        <div class="flex items-start gap-3 text-slate-600 dark:text-slate-300">
                            <i class="ph-bold ph-map-pin mt-0.5 text-indigo-500"></i>
                            <span>{{ $purchaseOrder->supplier->address }}</span>
                        </div>
                    </div>
                </div>

                {{-- Ringkasan Pembayaran --}}
                <div class="bg-indigo-600 rounded-3xl p-6 text-white shadow-lg shadow-indigo-200 dark:shadow-none">
                    <h3 class="font-bold text-lg mb-6 border-b border-indigo-500 pb-4">Ringkasan</h3>

                    <div class="space-y-3 mb-6 text-indigo-100 text-sm">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span class="font-mono">Rp {{ number_format($purchaseOrder->subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Pajak Order</span>
                            <span class="font-mono">+ Rp {{ number_format($purchaseOrder->total_tax, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Diskon Order</span>
                            <span class="font-mono text-indigo-200">- Rp {{ number_format($purchaseOrder->total_discount, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Biaya Kirim</span>
                            <span class="font-mono">+ Rp {{ number_format($purchaseOrder->shipping_cost, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center pt-4 border-t border-indigo-500">
                        <span class="font-bold">Total Akhir</span>
                        <span class="font-bold text-2xl font-display">Rp {{ number_format($purchaseOrder->grand_total, 0, ',', '.') }}</span>
                    </div>
                </div>

                @if($purchaseOrder->note)
                <div class="bg-yellow-50 dark:bg-yellow-500/10 p-5 rounded-2xl border border-yellow-100 dark:border-yellow-500/20">
                    <h4 class="text-xs font-bold text-yellow-600 dark:text-yellow-500 uppercase mb-2 flex items-center gap-2">
                        <i class="ph-bold ph-sticky-note"></i> Catatan
                    </h4>
                    <p class="text-sm text-slate-600 dark:text-slate-300 italic">
                        "{{ $purchaseOrder->note }}"
                    </p>
                </div>
                @endif

            </div>
        </div>
    </section>
@endsection
