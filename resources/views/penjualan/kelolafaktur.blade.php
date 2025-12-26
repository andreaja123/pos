@extends('layouts.admin')

@section('title', 'Kelola Faktur - Hanania POS')

@section('content')
    <section class="page-section active max-w-7xl mx-auto relative">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="font-display text-2xl font-bold text-slate-800 dark:text-white">
                    Kelola Faktur
                </h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Pantau dan kelola semua tagihan pelanggan Anda
                </p>
            </div>
            <div class="flex gap-3">
                <button
                    class="px-5 py-2.5 bg-white dark:bg-slate-700 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-600 font-bold text-sm rounded-xl hover:bg-slate-50 dark:hover:bg-slate-600 transition flex items-center gap-2">
                    <i class="ph-bold ph-microsoft-excel-logo text-lg text-emerald-600"></i>
                    Ekspor Excel
                </button>
                <a href="{{ route('invoices.create') }}"
                    class="px-5 py-2.5 bg-indigo-600 text-white font-bold text-sm rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 dark:shadow-none flex items-center gap-2">
                    <i class="ph-bold ph-plus"></i>
                    Buat Faktur
                </a>
            </div>
        </div>

        {{-- FORM PENCARIAN & FILTER --}}
        <form method="GET" action="{{ route('invoices.index') }}" class="bg-white dark:bg-darkCard p-4 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm mb-6">
            <div class="flex flex-col md:flex-row gap-4 justify-between">
                <div class="relative w-full md:w-96">
                    <i class="ph-bold ph-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari No Faktur, Pelanggan..."
                        class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border-none rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 focus:ring-2 focus:ring-indigo-500 placeholder-slate-400">
                </div>

                <div class="flex gap-3 overflow-x-auto pb-2 md:pb-0">
                    <select name="status" onchange="this.form.submit()"
                        class="px-4 py-3 bg-slate-50 dark:bg-slate-800 border-none rounded-xl text-sm font-bold text-slate-600 dark:text-slate-300 cursor-pointer focus:ring-2 focus:ring-indigo-500">
                        <option value="">Semua Status</option>
                        <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Lunas</option>
                        <option value="unpaid" {{ request('status') == 'unpaid' ? 'selected' : '' }}>Belum Bayar</option>
                        <option value="overdue" {{ request('status') == 'overdue' ? 'selected' : '' }}>Jatuh Tempo</option>
                    </select>
                    <input type="date" name="date" value="{{ request('date') }}" onchange="this.form.submit()"
                        class="px-4 py-3 bg-slate-50 dark:bg-slate-800 border-none rounded-xl text-sm font-bold text-slate-600 dark:text-slate-300 cursor-pointer focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>
        </form>

        <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">Kode Unik</th>
                            <th class="px-6 py-4 font-bold">Pelanggan</th>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 font-bold">Jumlah Bayar</th>
                            <th class="px-6 py-4 font-bold">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        @forelse ($invoices as $index => $invoice)
                            <tr onclick="fetchAndOpenDetail('{{ $invoice->id }}')"
                                class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition cursor-pointer group">
                                <td class="px-6 py-4">
                                    {{ $invoices->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4 font-mono font-bold text-indigo-600 dark:text-indigo-400">
                                    #{{ $invoice->invoice_number }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300 flex items-center justify-center font-bold text-xs uppercase">
                                            {{ substr($invoice->customer_name, 0, 2) }}
                                        </div>
                                        <span class="font-bold text-slate-800 dark:text-slate-200">
                                            {{ $invoice->customer_name }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($invoice->invoice_date)->translatedFormat('d M Y') }}
                                </td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                    Rp {{ number_format($invoice->grand_total, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $statusClass = match($invoice->status) {
                                            'paid' => 'bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 border-emerald-200 dark:border-emerald-500/30',
                                            'overdue' => 'bg-red-100 dark:bg-red-500/20 text-red-700 dark:text-red-400 border-red-200 dark:border-red-500/30',
                                            default => 'bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400 border-amber-200 dark:border-amber-500/30',
                                        };
                                        $statusLabel = match($invoice->status) {
                                            'paid' => 'Lunas',
                                            'overdue' => 'Lewat Waktu',
                                            default => 'Belum Bayar',
                                        };
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-xs font-bold border {{ $statusClass }}">
                                        {{ $statusLabel }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button
                                        class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 hover:bg-indigo-50 dark:hover:bg-indigo-900/50 hover:text-indigo-600 transition flex items-center justify-center ml-auto">
                                        <i class="ph-bold ph-caret-right"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-slate-500">
                                    Tidak ada data faktur ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{-- PAGINATION --}}
            <div class="p-6 border-t border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <p class="text-xs text-slate-500">
                    Menampilkan {{ $invoices->firstItem() }}-{{ $invoices->lastItem() }} dari {{ $invoices->total() }} data
                </p>
                <div class="flex gap-2">
                    {{-- Custom Pagination Links sesuai style --}}
                    @if ($invoices->onFirstPage())
                        <button disabled class="px-3 py-1 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-300 text-xs cursor-not-allowed">Prev</button>
                    @else
                        <a href="{{ $invoices->previousPageUrl() }}" class="px-3 py-1 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 text-xs hover:bg-slate-50 dark:hover:bg-slate-700">Prev</a>
                    @endif

                    {{-- Current Page --}}
                    <button class="px-3 py-1 rounded-lg bg-indigo-500 text-white text-xs">{{ $invoices->currentPage() }}</button>

                    @if ($invoices->hasMorePages())
                        <a href="{{ $invoices->nextPageUrl() }}" class="px-3 py-1 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 text-xs hover:bg-slate-50 dark:hover:bg-slate-700">Next</a>
                    @else
                        <button disabled class="px-3 py-1 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-300 text-xs cursor-not-allowed">Next</button>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- SIDEBAR DETAIL FAKTUR --}}
    <div id="invoiceDetailPanel" class="fixed inset-0 z-50 invisible transition-all duration-300 ease-in-out">
        <div id="backdrop" onclick="closeInvoiceDetail()"
            class="absolute inset-0 bg-slate-900/20 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

        <div id="panelContent"
            class="absolute top-0 right-0 h-full w-full md:w-[600px] bg-white dark:bg-slate-800 shadow-2xl transform translate-x-full transition-transform duration-300 flex flex-col">

            {{-- HEADER SIDEBAR --}}
            <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center bg-white dark:bg-slate-800 z-10">
                <div>
                    <div class="flex items-center gap-3 mb-1">
                        {{-- ID untuk JS: detail-inv-number --}}
                        <h2 id="detail-inv-number" class="font-display font-bold text-2xl text-slate-800 dark:text-white">Loading...</h2>
                        {{-- ID untuk JS: detail-status-badge --}}
                        <span id="detail-status-badge" class="px-3 py-1 rounded-full text-xs font-bold border">...</span>
                    </div>
                    {{-- ID untuk JS: detail-meta --}}
                    <p id="detail-meta" class="text-sm text-slate-500">...</p>
                </div>
                <button onclick="closeInvoiceDetail()"
                    class="w-10 h-10 rounded-xl bg-slate-50 dark:bg-slate-700 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-600 transition flex items-center justify-center">
                    <i class="ph-bold ph-x text-lg"></i>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-6 space-y-6">
                <div class="grid grid-cols-2 gap-3">
                    <button
                        class="p-4 rounded-2xl bg-indigo-600 text-white hover:bg-indigo-700 transition flex flex-col items-center justify-center gap-2 group">
                        <i class="ph-bold ph-money text-2xl group-hover:scale-110 transition"></i>
                        <span class="font-bold text-sm">Bayar Sekarang</span>
                    </button>
                    {{-- Tombol Edit Dinamis --}}
                    <a id="btn-edit-invoice" href="#"
                        class="p-4 rounded-2xl bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-600 transition flex flex-col items-center justify-center gap-2">
                        <i class="ph-bold ph-pencil-simple text-2xl"></i>
                        <span class="font-bold text-sm">Edit Faktur</span>
                    </a>
                </div>

                {{-- ... Bagian static lainnya tetap sama ... --}}
                {{-- Agar kode tidak terlalu panjang, bagian tombol cetak dan komunikasi saya hide namun tetap ada di implementasi asli Anda --}}
                
                <div>
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Administrasi</h3>
                    {{-- ... --}}
                    <div class="space-y-2">
                        <div class="p-3 bg-slate-50 dark:bg-slate-700/50 rounded-xl border border-slate-100 dark:border-slate-700">
                             <div class="flex justify-between text-sm mb-1">
                                <span class="text-slate-500">Total Tagihan</span>
                                {{-- ID untuk JS --}}
                                <span id="detail-total" class="font-bold text-slate-800 dark:text-white">Rp 0</span>
                            </div>
                        </div>
                    </div>
                    {{-- ... --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        const panel = document.getElementById('invoiceDetailPanel');
        const backdrop = document.getElementById('backdrop');
        const content = document.getElementById('panelContent');

        // Elements to update
        const elInvNumber = document.getElementById('detail-inv-number');
        const elStatusBadge = document.getElementById('detail-status-badge');
        const elMeta = document.getElementById('detail-meta');
        const elTotal = document.getElementById('detail-total');
        const btnEdit = document.getElementById('btn-edit-invoice');

        // Function to Fetch Data & Open Panel
        function fetchAndOpenDetail(id) {
            // 1. Reset / Loading State
            elInvNumber.innerText = "Loading...";
            panel.classList.remove('invisible');
            
            // Animasi masuk
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                content.classList.remove('translate-x-full');
            }, 10);

            // 2. Fetch Data dari Controller
            fetch(`/invoices/${id}`)
                .then(response => response.json())
                .then(data => {
                    // 3. Update DOM
                    elInvNumber.innerText = '#' + data.invoice_number;
                    elMeta.innerText = `${data.customer_name} • ${data.date_formatted}`;
                    elTotal.innerText = data.grand_total_formatted;
                    btnEdit.href = data.edit_url;

                    // Update Status Badge Colors
                    setStatusBadge(data.status);
                })
                .catch(err => {
                    console.error('Error fetching invoice:', err);
                    elInvNumber.innerText = "Error";
                });
        }

        function setStatusBadge(status) {
            // Reset classes
            elStatusBadge.className = 'px-3 py-1 rounded-full text-xs font-bold border transition';
            
            if(status === 'paid') {
                elStatusBadge.classList.add('bg-emerald-100', 'dark:bg-emerald-500/20', 'text-emerald-700', 'dark:text-emerald-400', 'border-emerald-200', 'dark:border-emerald-500/30');
                elStatusBadge.innerText = 'Lunas';
            } else if (status === 'overdue') {
                elStatusBadge.classList.add('bg-red-100', 'dark:bg-red-500/20', 'text-red-700', 'dark:text-red-400', 'border-red-200', 'dark:border-red-500/30');
                elStatusBadge.innerText = 'Lewat Waktu';
            } else {
                elStatusBadge.classList.add('bg-amber-100', 'dark:bg-amber-500/20', 'text-amber-700', 'dark:text-amber-400', 'border-amber-200', 'dark:border-amber-500/30');
                elStatusBadge.innerText = 'Belum Bayar';
            }
        }

        function closeInvoiceDetail() {
            backdrop.classList.add('opacity-0');
            content.classList.add('translate-x-full');

            setTimeout(() => {
                panel.classList.add('invisible');
            }, 300);
        }
    </script>

@endsection