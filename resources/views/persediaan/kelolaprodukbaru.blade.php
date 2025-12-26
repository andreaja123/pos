@extends('layouts.admin')

@section('title', 'Kelola Produk - Hanania POS')

@section('content')
<style>
@media print {
    /* Menghilangkan margin browser dan header/footer otomatis */
    @page {
        margin: 0;
        size: auto;
    }
    
    html, body {
        margin: 0;
        padding: 0;
    }

    body * { visibility: hidden; }
    #printArea, #printArea * { visibility: visible; }
    
    #printArea {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        display: grid !important;
        grid-template-columns: repeat(2, 1fr); /* Tetap 2 kolom */
        gap: 0; /* Menghilangkan jarak antar label */
        margin: 0;
        padding: 0;
    }

    .barcode-card {
        border: 0.1pt solid #eee; /* Garis sangat tipis sebagai panduan potong saja */
        padding: 4px 2px;
        text-align: center;
        background: white;
        height: 30mm; /* Sesuaikan dengan tinggi fisik label Anda */
        box-sizing: border-box; /* Memastikan padding tidak menambah tinggi */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        page-break-inside: avoid;
    }

    .brand-name {
        font-size: 7px;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 1px;
    }

    .product-name {
        font-size: 9px;
        font-weight: bold;
        line-height: 1;
        max-height: 18px;
        overflow: hidden;
        margin-bottom: 2px;
    }

    .barcode-img {
        width: 95% !important;
        height: 40px !important; /* Memaksimalkan tinggi barcode */
    }

    .price-tag {
        font-size: 12px;
        font-weight: bold;
        background: #000;
        color: #fff;
        width: 100%;
        margin-top: 2px;
        padding: 1px 0;
    }
}
#printArea { display: none; }
</style>
    <section class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h1 class="font-display font-bold text-2xl text-slate-800 dark:text-white">Kelola Produk</h1>
                <p class="text-slate-500 dark:text-slate-400 text-sm">Manajemen stok, harga, dan laporan produk.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('products.export') }}"
                    class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-emerald-600 dark:text-emerald-400 rounded-xl hover:bg-emerald-50 dark:hover:bg-slate-600 transition font-bold text-sm shadow-sm">
                    <i class="ph-bold ph-microsoft-excel-logo text-lg"></i>
                    <span>Export Excel</span>
                </a>
                <a href="{{ route('products.create') }}"
                    class="flex items-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl transition font-bold text-sm shadow-lg shadow-indigo-200 dark:shadow-none">
                    <i class="ph-bold ph-plus text-lg"></i>
                    <span>Tambah Produk</span>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Total Stok Fisik</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                            {{ number_format($totalStock) }} <span class="text-sm text-slate-400 font-medium">Items</span>
                        </h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-blue-50 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-package text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-2 overflow-hidden">
                    <div class="bg-blue-500 h-1.5 rounded-full" style="width: 80%"></div>
                </div>
                <p class="text-slate-400 text-xs font-medium">Akumulasi seluruh gudang</p>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Stok Menipis / Habis</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                            {{ number_format($lowStockCount) }} <span
                                class="text-sm text-slate-400 font-medium">Items</span>
                        </h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-red-50 dark:bg-red-500/20 text-red-600 dark:text-red-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-warning-circle text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-2 overflow-hidden">
                    <div class="bg-red-500 h-1.5 rounded-full" style="width: {{ $lowStockCount > 0 ? '45%' : '0%' }}"></div>
                </div>
                <p class="text-red-500 text-xs font-bold">Perlu Restock Segera</p>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">Total Nilai Aset</p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                            Rp {{ number_format($totalAssetValue / 1000000, 1) }} Jt
                        </h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-money text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-2 overflow-hidden">
                    <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 65%"></div>
                </div>
                <p class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                    Berdasarkan Harga Beli (HPP)
                </p>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">

            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">Daftar Inventory</h3>
                    <span
                        class="px-2.5 py-0.5 rounded-full bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-xs font-bold border border-slate-200 dark:border-slate-600">
                        Total {{ $products->total() }}
                    </span>
                </div>

                <form action="{{ route('products.index') }}" method="GET" class="relative w-full sm:w-72">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama, kode, atau barcode..."
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition dark:text-white placeholder-slate-400">
                    <button type="submit" class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                        <i class="ph-bold ph-magnifying-glass text-lg"></i>
                    </button>
                </form>
            </div>

            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display text-xs uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4 font-bold text-center w-16">No</th>
                            <th class="px-6 py-4 font-bold min-w-[200px]">Produk</th>
                            <th class="px-6 py-4 font-bold">Kategori</th>
                            <th class="px-6 py-4 font-bold text-center">Stok</th>
                            <th class="px-6 py-4 font-bold">Harga Beli</th>
                            <th class="px-6 py-4 font-bold">Harga Jual</th>
                            <th class="px-6 py-4 font-bold">Laba/Unit</th>
                            <th class="px-6 py-4 font-bold">Total Aset</th>
                            <th class="px-6 py-4 font-bold text-center min-w-[180px]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        @forelse($products as $index => $product)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition group">
                                <td class="px-6 py-4 text-center font-bold">
                                    {{ $products->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-800 dark:text-white text-base">
                                            {{ $product->name }}
                                        </span>
                                        <div class="flex items-center gap-2 mt-1">
                                            <span
                                                class="font-mono text-xs bg-slate-100 dark:bg-slate-800 px-1.5 py-0.5 rounded border border-slate-200 dark:border-slate-600">
                                                {{ $product->code ?? '-' }}
                                            </span>
                                            @if ($product->barcode)
                                                <span class="font-mono text-xs text-slate-400">||||
                                                    {{ $product->barcode }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 bg-purple-50 dark:bg-purple-900/30 text-purple-600 dark:text-purple-300 rounded-lg text-xs font-bold">
                                        {{ $product->category->name ?? 'Uncategorized' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @php $totalStock = $product->stocks_sum_quantity ?? 0; @endphp

                                    @if ($totalStock <= 5)
                                        <div class="flex items-center justify-center gap-1">
                                            <span class="font-bold text-red-500">{{ number_format($totalStock) }}</span>
                                            <i class="ph-fill ph-warning-circle text-red-500" title="Stok Menipis"></i>
                                        </div>
                                    @else
                                        <span
                                            class="font-bold text-slate-800 dark:text-white">{{ number_format($totalStock) }}</span>
                                    @endif
                                    <span class="text-xs block text-slate-400">{{ $product->unit->name ?? 'pcs' }}</span>
                                </td>
                                <td class="px-6 py-4 text-slate-500">Rp
                                    {{ number_format($product->cost_price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 font-bold text-indigo-600 dark:text-indigo-400">Rp
                                    {{ number_format($product->sell_price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-emerald-600 font-bold">
                                    Rp {{ number_format($product->sell_price - $product->cost_price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                    Rp {{ number_format($totalStock * $product->cost_price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    <div
                                        class="flex items-center justify-center gap-2 opacity-100 sm:opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('products.show', $product->id) }}"
                                            class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 hover:bg-blue-100 flex items-center justify-center transition"
                                            title="Lihat Detail">
                                            <i class="ph-bold ph-eye"></i>
                                        </a>
                                        <button type="button" 
    onclick="openBarcodeModal('{{ $product->name }}', '{{ $product->barcode }}', '{{ number_format($product->sell_price, 0, ',', '.') }}')"
    class="w-8 h-8 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 hover:bg-slate-200 flex items-center justify-center transition"
    title="Print Barcode">
    <i class="ph-bold ph-barcode"></i>
</button>
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="w-8 h-8 rounded-lg bg-orange-50 dark:bg-orange-500/20 text-orange-600 dark:text-orange-400 hover:bg-orange-100 flex items-center justify-center transition"
                                            title="Edit">
                                            <i class="ph-bold ph-pencil-simple"></i>
                                        </a>

                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus produk ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-8 h-8 rounded-lg bg-red-50 dark:bg-red-500/20 text-red-600 dark:text-red-400 hover:bg-red-100 flex items-center justify-center transition"
                                                title="Hapus">
                                                <i class="ph-bold ph-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-8">
                                    <div class="flex flex-col items-center justify-center">
                                        <div
                                            class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mb-3">
                                            <i class="ph-duotone ph-package text-3xl text-slate-400"></i>
                                        </div>
                                        <p class="text-slate-500 font-bold">Tidak ada produk ditemukan</p>
                                        <p class="text-sm text-slate-400">Coba kata kunci lain atau tambahkan produk baru.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div
                class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span
                        class="font-bold text-slate-800 dark:text-white">{{ $products->firstItem() ?? 0 }}</span> sampai
                    <span class="font-bold text-slate-800 dark:text-white">{{ $products->lastItem() ?? 0 }}</span> dari
                    <span class="font-bold text-slate-800 dark:text-white">{{ $products->total() }}</span> hasil
                </p>

                @if ($products->hasPages())
                    <div class="flex items-center gap-2">
                        @if ($products->onFirstPage())
                            <button disabled
                                class="px-4 py-2 text-sm font-bold text-slate-400 bg-slate-50 border border-slate-200 rounded-xl cursor-not-allowed">
                                Previous
                            </button>
                        @else
                            <a href="{{ $products->previousPageUrl() }}"
                                class="px-4 py-2 text-sm font-bold text-slate-500 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 dark:bg-slate-800 dark:border-slate-700 dark:text-slate-400">
                                Previous
                            </a>
                        @endif

                        @foreach ($products->getUrlRange(max(1, $products->currentPage() - 1), min($products->lastPage(), $products->currentPage() + 1)) as $page => $url)
                            @if ($page == $products->currentPage())
                                <span
                                    class="px-4 py-2 text-sm font-bold text-white bg-indigo-600 border border-indigo-600 rounded-xl shadow-sm">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                    class="px-4 py-2 text-sm font-bold text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 dark:bg-slate-800 dark:border-slate-700 dark:text-slate-400">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        @if ($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}"
                                class="px-4 py-2 text-sm font-bold text-slate-500 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 dark:bg-slate-800 dark:border-slate-700 dark:text-slate-400">
                                Next
                            </a>
                        @else
                            <button disabled
                                class="px-4 py-2 text-sm font-bold text-slate-400 bg-slate-50 border border-slate-200 rounded-xl cursor-not-allowed">
                                Next
                            </button>
                        @endif
                    </div>
                @endif
            </div>

        </div>
    </section>
    <div id="barcodeModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeBarcodeModal()"></div>
        
        <div class="relative bg-white dark:bg-slate-800 rounded-3xl shadow-2xl max-w-md w-full p-8 overflow-hidden">
            <div class="text-center mb-6">
                <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-2">Cetak Barcode</h3>
                <p id="modalProductName" class="text-slate-500 text-sm font-medium"></p>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jumlah Barcode</label>
                    <input type="number" id="printQty" value="1" min="1" max="100"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
                </div>
                
                <div class="flex gap-3 mt-8">
                    <button onclick="closeBarcodeModal()" class="flex-1 px-4 py-3 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold rounded-xl hover:bg-slate-200 transition">
                        Batal
                    </button>
                    <button onclick="generatePrint()" class="flex-1 px-4 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-200 dark:shadow-none transition">
                        Cetak Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="printArea" class="hidden text-black"></div>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
<script>
    let currentBarcode = '';
let currentName = '';
let currentPrice = '';

function openBarcodeModal(name, barcode, price) {
    if (!barcode || barcode === "") {
        alert('Produk ini tidak memiliki kode barcode!');
        return;
    }
    currentName = name;
    currentBarcode = barcode;
    currentPrice = price;
    
    document.getElementById('modalProductName').innerText = name;
    document.getElementById('barcodeModal').classList.remove('hidden');
}

function closeBarcodeModal() {
    document.getElementById('barcodeModal').classList.add('hidden');
}

function generatePrint() {
    const qty = document.getElementById('printQty').value;
    const printArea = document.getElementById('printArea');
    printArea.innerHTML = ''; 

    for (let i = 0; i < qty; i++) {
        const card = document.createElement('div');
        card.className = 'barcode-card';
        
        card.innerHTML = `
            <div class="product-name">${currentName}</div>
            <svg class="barcode-img" id="barcode-${i}"></svg>
            <div class="price-tag">Rp ${currentPrice}</div>
        `;
        
        printArea.appendChild(card);

        // Setting Barcode Profesional
        JsBarcode(`#barcode-${i}`, currentBarcode, {
            format: "CODE128",
            width: 1.2,        // Ketebalan garis
            height: 35,         // Tinggi garis
            displayValue: true, // Tampilkan angka di bawah garis
            fontSize: 9,
            fontOptions: "bold",
            margin: 0,
            background: "#ffffff"
        });
    }

    // Eksekusi Print
    setTimeout(() => {
        window.print();
        closeBarcodeModal();
    }, 700);
}
</script>
@endsection
