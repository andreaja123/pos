@extends('layouts.admin')

@section('title', 'Detail Produk - ' . $product->name)

@section('content')
    <section class="max-w-7xl mx-auto pb-20">
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('products.index') }}"
                class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:bg-slate-50 transition">
                <i class="ph-bold ph-arrow-left text-lg"></i>
            </a>
            <div>
                <h1 class="font-display font-bold text-2xl text-slate-800 dark:text-white">Detail Produk</h1>
                <div class="flex items-center gap-2 text-sm text-slate-500">
                    <span>Inventory</span>
                    <i class="ph-bold ph-caret-right text-xs"></i>
                    <span>{{ $product->name }}</span>
                </div>
            </div>
            <div class="ml-auto flex gap-3">
                <a href="{{ route('products.edit', $product->id) }}"
                    class="px-5 py-2.5 rounded-xl bg-indigo-600 text-white font-bold text-sm hover:bg-indigo-700 shadow-lg flex items-center gap-2">
                    <i class="ph-bold ph-pencil-simple"></i> Edit Produk
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <div
                    class="bg-white dark:bg-darkCard p-8 rounded-3xl border border-slate-100 shadow-sm flex flex-col md:flex-row gap-8">
                    <div class="w-full md:w-1/3">
                        <div class="aspect-square rounded-2xl bg-slate-50 overflow-hidden border border-slate-100">
                            @php $img = $product->images->where('is_primary', true)->first(); @endphp
                            <img src="{{ $img ? $img->image_url : asset('images/placeholder.png') }}"
                                class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <span
                                    class="inline-block px-2.5 py-1 rounded-lg bg-purple-50 text-purple-600 text-xs font-bold mb-2">
                                    {{ $product->category->name ?? '-' }}
                                </span>
                                <h2 class="text-2xl font-bold text-slate-800 mb-1">{{ $product->name }}</h2>
                                <p class="text-slate-500 font-mono text-sm">{{ $product->code ?? 'No Code' }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-slate-400 font-bold uppercase">Harga Jual</p>
                                <p class="text-2xl font-bold text-indigo-600">Rp
                                    {{ number_format($product->sell_price, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6 mt-8 border-t border-slate-100 pt-6">
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase mb-1">Harga Beli (HPP)</p>
                                <p class="text-slate-700 font-bold">Rp
                                    {{ number_format($product->cost_price, 0, ',', '.') }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase mb-1">Margin / Laba</p>
                                <p class="text-emerald-600 font-bold">+ Rp
                                    {{ number_format($product->sell_price - $product->cost_price, 0, ',', '.') }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase mb-1">Barcode</p>
                                <p class="font-mono text-slate-700">{{ $product->barcode ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase mb-1">Total Stok</p>
                                <p class="text-slate-800 font-bold text-lg">{{ $product->stocks->sum('quantity') }} <span
                                        class="text-xs font-normal text-slate-500">{{ $product->unit->name ?? 'pcs' }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 shadow-sm">
                    <h3 class="font-bold text-lg text-slate-800 mb-4">Stok per Gudang</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-slate-50 text-slate-500 font-bold">
                                <tr>
                                    <th class="px-4 py-3 rounded-l-xl">Nama Gudang</th>
                                    <th class="px-4 py-3 text-center">Jumlah Stok</th>
                                    <th class="px-4 py-3 text-center rounded-r-xl">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach ($product->stocks as $stock)
                                    <tr>
                                        <td class="px-4 py-3 font-medium text-slate-700">{{ $stock->warehouse->name }}</td>
                                        <td class="px-4 py-3 text-center font-bold">{{ $stock->quantity }}</td>
                                        <td class="px-4 py-3 text-center">
                                            @if ($stock->quantity <= $stock->alert_limit)
                                                <span
                                                    class="text-red-500 text-xs font-bold bg-red-50 px-2 py-1 rounded">Stok
                                                    Menipis</span>
                                            @else
                                                <span
                                                    class="text-emerald-500 text-xs font-bold bg-emerald-50 px-2 py-1 rounded">Aman</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="space-y-8">
                <div class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 shadow-sm">
                    <h3 class="font-bold text-lg text-slate-800 mb-4">Varian Produk</h3>
                    @forelse($product->variants as $variant)
                        <div class="flex justify-between items-center py-3 border-b border-slate-50 last:border-0">
                            <div>
                                <p class="font-bold text-slate-700 text-sm">{{ $variant->full_name }}</p>
                                <p class="text-xs text-slate-400">{{ $variant->brand }}</p>
                            </div>
                            <span
                                class="bg-slate-100 text-slate-600 px-2 py-1 rounded text-xs font-bold">{{ $variant->stock }}
                                pcs</span>
                        </div>
                    @empty
                        <p class="text-slate-400 text-sm italic">Tidak ada variasi.</p>
                    @endforelse
                </div>

                <div class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 shadow-sm">
                    <h3 class="font-bold text-lg text-slate-800 mb-4">Serial Numbers</h3>
                    <div class="flex flex-wrap gap-2">
                        @forelse($product->serials as $serial)
                            <span
                                class="px-2 py-1 border border-slate-200 rounded-lg text-xs font-mono text-slate-600 bg-slate-50">
                                {{ $serial->serial_number }}
                            </span>
                        @empty
                            <p class="text-slate-400 text-sm italic">Tidak ada serial number.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
