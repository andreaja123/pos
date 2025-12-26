@extends('layouts.admin')

@section('title', 'Buat Faktur Baru - Hanania POS')

@section('content')
    <section class="max-w-7xl mx-auto pb-12">

        {{-- Form Tag Mulai Disini --}}
        <form action="{{ route('invoices.store') }}" method="POST">
            @csrf

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="font-display font-bold text-2xl text-slate-800 dark:text-white">
                        Faktur Penjualan Baru
                    </h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                        Buat transaksi baru dan kirim tagihan ke pelanggan.
                    </p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('invoices.index') }}"
                        class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-800 transition text-center">
                        Batal
                    </a>

                    {{-- Tombol Save Draft (name=status value=draft) --}}
                    <button type="submit" name="status" value="draft"
                        class="px-5 py-2.5 rounded-xl border border-indigo-200 text-indigo-700 bg-indigo-50 font-bold text-sm hover:bg-indigo-100 transition flex items-center gap-2">
                        <i class="ph-bold ph-floppy-disk"></i>
                        Simpan Draft
                    </button>
                </div>
            </div>

            {{-- Error Validation Alert --}}
            @if ($errors->any())
                <div class="mb-6 bg-red-50 text-red-500 p-4 rounded-xl border border-red-200 text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-xl shadow-slate-200/20 dark:shadow-none overflow-hidden">

                <div class="p-6 md:p-8 border-b border-slate-100 dark:border-slate-700">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                        <div class="lg:col-span-1 space-y-4">
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300">
                                Pembayaran Kepada (Pelanggan)
                            </label>

                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="ph-bold ph-magnifying-glass text-slate-400 group-focus-within:text-indigo-500"></i>
                                </div>
                                {{-- Input Customer Name --}}
                                <input type="text" name="customer_name" value="{{ old('customer_name') }}"
                                    class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition text-sm text-slate-800 dark:text-white placeholder-slate-400"
                                    placeholder="Cari nama pelanggan...">
                            </div>

                            <div class="p-4 rounded-2xl border border-dashed border-slate-300 dark:border-slate-600 bg-slate-50/50 dark:bg-slate-800/30">
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 flex items-center justify-center font-bold text-sm">
                                        UM
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-slate-800 dark:text-white text-sm">Umum / Walk-in</h4>
                                        {{-- Input Customer Address --}}
                                        <textarea name="customer_address"
                                            class="w-full mt-2 bg-transparent border-none text-xs text-slate-500 dark:text-slate-400 p-0 focus:ring-0 resize-none"
                                            rows="2" placeholder="Detail alamat pelanggan (opsional)...">{{ old('customer_address') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wider">
                                        Nomor Faktur
                                    </label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400 font-bold text-sm">#</span>
                                        {{-- Input Invoice Number (prefilled from controller) --}}
                                        <input type="text" name="invoice_number" value="{{ old('invoice_number', $invNumber ?? 'INV-NEW') }}"
                                            class="w-full pl-8 pr-4 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-1 focus:ring-indigo-500 text-sm font-mono font-bold text-slate-800 dark:text-white">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wider">
                                        Referensi (PO)
                                    </label>
                                    {{-- Input PO Ref --}}
                                    <input type="text" name="po_reference" value="{{ old('po_reference') }}" placeholder="Contoh: PO-0992"
                                        class="w-full px-4 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-1 focus:ring-indigo-500 text-sm text-slate-800 dark:text-white">
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wider">
                                        Tanggal Faktur
                                    </label>
                                    {{-- Input Date --}}
                                    <input type="date" name="invoice_date" value="{{ old('invoice_date', date('Y-m-d')) }}"
                                        class="w-full px-4 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-1 focus:ring-indigo-500 text-sm text-slate-800 dark:text-white">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wider">
                                        Jatuh Tempo
                                    </label>
                                    {{-- Input Due Date --}}
                                    <input type="date" name="due_date" value="{{ old('due_date') }}"
                                        class="w-full px-4 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-1 focus:ring-indigo-500 text-sm text-slate-800 dark:text-white">
                                </div>
                            </div>

                            <div class="md:col-span-2 grid grid-cols-2 gap-5 pt-2">
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5">
                                        Pajak Global (%)
                                    </label>
                                    {{-- Input Global Tax --}}
                                    <input type="number" name="global_tax_percent" value="{{ old('global_tax_percent') }}" placeholder="0"
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5">
                                        Catatan Admin
                                    </label>
                                    {{-- Input Admin Note --}}
                                    <input type="text" name="admin_note" value="{{ old('admin_note') }}" placeholder="Internal note..."
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-b border-slate-100 dark:border-slate-700">
                    <div class="overflow-x-auto">
                        {{-- Tabel Item --}}
                        <table class="w-full min-w-[1000px] text-left text-sm" id="itemsTable">
                            <thead class="bg-slate-50 dark:bg-slate-800 text-slate-500 dark:text-slate-400 font-display">
                                <tr>
                                    <th class="px-6 py-4 font-bold w-[30%]">Item & Deskripsi</th>
                                    <th class="px-4 py-4 font-bold w-[10%]">Qty</th>
                                    <th class="px-4 py-4 font-bold w-[15%]">Harga Satuan</th>
                                    <th class="px-4 py-4 font-bold w-[10%]">Pajak</th>
                                    <th class="px-4 py-4 font-bold w-[10%]">Diskon</th>
                                    <th class="px-6 py-4 font-bold w-[15%] text-right">Jumlah</th>
                                    <th class="px-4 py-4 font-bold w-[5%] text-center"><i class="ph-bold ph-trash"></i></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                                {{-- Baris Item ke-0 (Untuk input array) --}}
                                <tr class="group hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition">
                                    <td class="px-6 py-4 align-top space-y-2">
                                        <input type="text" name="items[0][item_name]" placeholder="Nama Barang / Jasa" required
                                            class="w-full px-3 py-2 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-1 focus:ring-indigo-500 font-bold text-slate-800 dark:text-white placeholder-slate-400">
                                        <textarea name="items[0][description]" placeholder="Deskripsi produk (opsional)" rows="1"
                                            class="w-full px-3 py-1.5 bg-transparent border-0 border-b border-dashed border-slate-200 dark:border-slate-700 focus:ring-0 text-xs text-slate-500 focus:border-indigo-500 resize-none"></textarea>
                                    </td>
                                    <td class="px-4 py-4 align-top">
                                        <input type="number" name="items[0][qty]" value="1" min="1" required
                                            class="item-qty w-full px-3 py-2 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-1 focus:ring-indigo-500 text-center">
                                    </td>
                                    <td class="px-4 py-4 align-top">
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-2 flex items-center text-xs text-slate-400">Rp</span>
                                            <input type="number" name="items[0][unit_price]" placeholder="0" min="0" required
                                                class="item-price w-full pl-8 pr-2 py-2 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-1 focus:ring-indigo-500 text-right">
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 align-top">
                                        <div class="flex gap-1">
                                            <input type="number" name="items[0][tax_percent]" placeholder="%"
                                                class="w-14 px-1 py-2 text-center bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-1 focus:ring-indigo-500 text-xs">
                                            {{-- Field Hitungan Display Only --}}
                                            <input type="text" disabled placeholder="Rp 0"
                                                class="item-tax w-full px-2 py-2 bg-slate-50 dark:bg-slate-800 border-none rounded-lg text-xs text-right text-slate-500 cursor-not-allowed">
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 align-top">
                                        <input type="number" name="items[0][discount_percent]" placeholder="%"
                                            class="item-discount w-full px-2 py-2 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-1 focus:ring-indigo-500 text-right text-xs">
                                    </td>
                                    <td class="px-6 py-4 align-top text-right">
                                        <span class="font-bold text-slate-800 dark:text-white block py-2">Rp 0</span>
                                    </td>
                                    <td class="px-4 py-4 align-top text-center">
                                        <button type="button" class="p-2 text-slate-400 hover:text-red-500 transition">
                                            <i class="ph-bold ph-x"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="p-4 bg-slate-50 dark:bg-slate-800/50 border-t border-slate-100 dark:border-slate-700">
                        {{-- Tombol ini butuh JS untuk duplikasi <tr> --}}
                        <button type="button" id="addItemRow"
                            class="flex items-center gap-2 text-indigo-600 dark:text-indigo-400 font-bold text-sm hover:text-indigo-700 hover:underline">
                            <i class="ph-bold ph-plus-circle text-lg"></i>
                            Tambah Baris / Produk
                        </button>
                    </div>
                </div>

                <div class="p-6 md:p-8 bg-white dark:bg-darkCard">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                                    Catatan Untuk Pelanggan
                                </label>
                                <textarea name="customer_note"
                                    class="w-full p-4 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-2 focus:ring-indigo-500 text-sm text-slate-800 dark:text-white placeholder-slate-400"
                                    rows="4" placeholder="Terima kasih atas bisnis Anda...">{{ old('customer_note') }}</textarea>
                            </div>
                        </div>

                        <div class="bg-slate-50 dark:bg-slate-800/50 rounded-2xl p-6 border border-slate-100 dark:border-slate-700/50">
                            {{-- Section Totals (Display Only di Frontend, Calculated di Backend) --}}
                            <div class="space-y-3">
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-slate-500 dark:text-slate-400 font-medium">Subtotal</span>
                                    <span id="subtotalText" class="text-slate-800 dark:text-white font-bold">Rp 0</span>
                                </div>

                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-slate-500 dark:text-slate-400 font-medium">Total Pajak</span>
                                    <span id="totalTaxText" class="text-slate-800 dark:text-white font-bold">Rp 0</span>
                                </div>

                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-slate-500 dark:text-slate-400 font-medium">Total Diskon Item</span>
                                    <span id="totalDiscountText" class="text-red-500 font-bold">- Rp 0</span>
                                </div>

                                <hr class="border-slate-200 dark:border-slate-700 my-2">

                                <div class="flex justify-between items-center gap-4">
                                    <span class="text-slate-600 dark:text-slate-300 text-sm font-bold">Biaya Kirim</span>
                                    <div class="w-40 relative">
                                        <span class="absolute inset-y-0 left-3 flex items-center text-slate-400 text-xs">Rp</span>
                                        <input type="number" name="shipping_cost" value="{{ old('shipping_cost') }}"
                                            class="w-full pl-8 pr-3 py-1.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-600 rounded-lg text-right text-sm focus:ring-indigo-500"
                                            placeholder="0">
                                    </div>
                                </div>

                                <div class="flex justify-between items-center gap-4">
                                    <span class="text-slate-600 dark:text-slate-300 text-sm font-bold">Diskon Tambahan</span>
                                    <div class="w-40 relative">
                                        <span class="absolute inset-y-0 left-3 flex items-center text-slate-400 text-xs">Rp</span>
                                        <input type="number" name="additional_discount" value="{{ old('additional_discount') }}"
                                            class="w-full pl-8 pr-3 py-1.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-600 rounded-lg text-right text-sm focus:ring-indigo-500 text-red-500"
                                            placeholder="0">
                                    </div>
                                </div>

                                <hr class="border-slate-200 dark:border-slate-700 my-4">

                                <div class="flex justify-between items-center">
                                    <span class="text-slate-800 dark:text-white text-lg font-display font-bold">Total Tagihan</span>
                                    {{-- Ini hanya display, real calculation ada di controller --}}
                                    <input type="text" id="grandTotalText" readonly value="Rp 0"
                                        class="w-1/2 text-right bg-transparent border-none text-2xl font-display font-bold text-indigo-600 dark:text-indigo-400 p-0 focus:ring-0">
                                </div>
                            </div>

                            {{-- Submit Button (name=status value=published) --}}
                            <button type="submit" name="status" value="published"
                                class="w-full mt-6 py-4 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl font-bold text-lg shadow-lg shadow-emerald-200/50 dark:shadow-none transition transform active:scale-95 flex justify-center items-center gap-2">
                                <i class="ph-bold ph-paper-plane-right"></i>
                                Hasilkan Faktur
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script>
document.addEventListener('input', calculateInvoice);
document.addEventListener('click', handleRowAction);

function rupiah(number) {
    return 'Rp ' + number.toLocaleString('id-ID');
}

function calculateInvoice() {
    let subtotal = 0;
    let totalTax = 0;
    let totalDiscount = 0;

    document.querySelectorAll('#itemsTable tbody tr').forEach(row => {
        const qty = parseFloat(row.querySelector('.item-qty')?.value) || 0;
        const price = parseFloat(row.querySelector('.item-price')?.value) || 0;
        const taxPercent = parseFloat(row.querySelector('.item-tax')?.value) || 0;
        const discountPercent = parseFloat(row.querySelector('.item-discount')?.value) || 0;

        const baseAmount = qty * price;
        const discountAmount = baseAmount * (discountPercent / 100);
        const taxableAmount = baseAmount - discountAmount;
        const taxAmount = taxableAmount * (taxPercent / 100);

        subtotal += baseAmount;
        totalDiscount += discountAmount;
        totalTax += taxAmount;

        // Update jumlah per item (kolom "Jumlah")
        const totalCell = row.querySelector('td:nth-child(6) span');
        if (totalCell) {
            totalCell.innerText = rupiah(taxableAmount + taxAmount);
        }
    });

    const globalTaxPercent = parseFloat(document.querySelector('[name="global_tax_percent"]')?.value) || 0;
    const globalTax = (subtotal - totalDiscount) * (globalTaxPercent / 100);

    const shipping = parseFloat(document.querySelector('[name="shipping_cost"]')?.value) || 0;
    const additionalDiscount = parseFloat(document.querySelector('[name="additional_discount"]')?.value) || 0;

    const grandTotal =
        (subtotal - totalDiscount) +
        totalTax +
        globalTax +
        shipping -
        additionalDiscount;

    document.getElementById('subtotalText').innerText = rupiah(subtotal);
    document.getElementById('totalDiscountText').innerText = '- ' + rupiah(totalDiscount);
    document.getElementById('totalTaxText').innerText = rupiah(totalTax + globalTax);
    document.getElementById('grandTotalText').value = rupiah(Math.max(grandTotal, 0));
}

function handleRowAction(e) {
    if (e.target.closest('.ph-x')) {
        const row = e.target.closest('tr');
        if (document.querySelectorAll('#itemsTable tbody tr').length > 1) {
            row.remove();
            calculateInvoice();
        }
    }
}

// Jalankan sekali saat load
calculateInvoice();
</script>

@endsection
