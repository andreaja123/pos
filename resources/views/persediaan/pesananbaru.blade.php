@extends('layouts.admin')

@section('title', 'Pesanan Baru - Hanania POS')

@section('content')
    <section class="page-section active max-w-7xl mx-auto pb-20">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Buat Pesanan Baru</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">Input detail pembelian barang dari supplier</p>
            </div>
            <div class="flex gap-3">
                <button
                    class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition flex items-center gap-2">
                    <i class="ph-bold ph-arrow-left"></i> Kembali
                </button>
            </div>
        </div>
@if ($errors->any())
    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5">
        <div class="flex items-center gap-3 mb-3 text-red-600 font-bold">
            <i class="ph-bold ph-warning-circle text-xl"></i>
            Terjadi kesalahan saat menyimpan pesanan
        </div>

        <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form id="orderForm" action="{{ route('purchase-orders.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

                <div
                    class="lg:col-span-2 bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                        <i class="ph-fill ph-users text-indigo-500"></i> Informasi Supplier
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Cari
                                Supplier</label>
                            <div class="flex gap-2">
                                <div class="relative flex-1">
                                    <i class="ph-bold ph-magnifying-glass absolute left-4 top-3.5 text-slate-400"></i>
                                    <select name="supplier_id" id="supplierSelect" required
    class="w-full">
    <option value="">Pilih Supplier</option>
    @foreach ($suppliers as $supplier)
        <option value="{{ $supplier->id }}">
            {{ $supplier->name }} - {{ $supplier->email }}
        </option>
    @endforeach
</select>

                                </div>
                                <button type="button"
                                    class="px-4 py-3 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-xl hover:bg-indigo-100 transition flex items-center gap-2 font-bold whitespace-nowrap">
                                    <i class="ph-bold ph-plus"></i> Supplier Baru
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Email /
                                Kontak</label>
                            <input type="text" placeholder="Otomatis terisi..." readonly
                                class="w-full px-4 py-3 bg-slate-100 dark:bg-slate-800 border-none rounded-xl text-slate-500 dark:text-slate-400 cursor-not-allowed">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Alamat</label>
                            <input type="text" placeholder="Otomatis terisi..." readonly
                                class="w-full px-4 py-3 bg-slate-100 dark:bg-slate-800 border-none rounded-xl text-slate-500 dark:text-slate-400 cursor-not-allowed">
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                        <i class="ph-fill ph-clipboard-text text-orange-500"></i> Detail Order
                    </h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Gudang
                                Tujuan</label>
                            <select name="warehouse_id"
                                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl focus:outline-none focus:border-indigo-500 text-slate-700 dark:text-slate-200">
                                @foreach ($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">
                                    {{ $warehouse->name }}
                                </option>
                            @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">No.
                                    Referensi</label>
                                <input type="text" value="PO-2025-001" name="reference_no"
                                    class="w-full px-3 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Tgl.
                                    Order</label>
                                <input type="date" name="order_date"
                                    class="w-full px-3 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm text-slate-600 dark:text-slate-300">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Jatuh
                                Tempo</label>
                            <input type="date" name="due_date"
                                class="w-full px-3 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm text-slate-600 dark:text-slate-300">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Order
                                Note</label>
                            <textarea rows="2"
                                class="w-full px-3 py-2 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:outline-none focus:border-indigo-500"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm mb-6 overflow-hidden">
                <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">Daftar Barang</h3>
                    <button type="button" onclick="addProductRow()"
                        class="px-4 py-2 bg-indigo-500 text-white text-sm font-bold rounded-xl hover:bg-indigo-600 transition shadow-lg shadow-indigo-500/30 flex items-center gap-2">
                        <i class="ph-bold ph-plus"></i> Tambah Baris
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead
                            class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display text-xs uppercase tracking-wider">
                            <tr>
                                <th class="p-4 font-bold min-w-[250px]">Produk / Deskripsi</th>
                                <th class="p-4 font-bold w-[120px]">Kuantitas</th>
                                <th class="p-4 font-bold w-[150px]">Harga Satuan</th>
                                <th class="p-4 font-bold w-[180px]">Pajak & Diskon</th>
                                <th class="p-4 font-bold w-[150px] text-right">Subtotal</th>
                                <th class="p-4 font-bold w-[50px] text-center"><i class="ph-bold ph-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody id="productTableBody" class="divide-y divide-slate-100 dark:divide-slate-700 text-sm">
                            <tr class="group hover:bg-slate-50 dark:hover:bg-slate-700/30 transition">
                                <td class="p-4 align-top">
                                    <div class="space-y-2">
                                        <div class="relative">
                                            <i class="ph-bold ph-barcode absolute left-3 top-3 text-slate-400"></i>
                                            <select name="items[0][product_id]"
    class="product-select w-full">
    <option value="">Pilih Produk</option>
    @foreach ($products as $product)
        <option value="{{ $product->id }}"
            data-price="{{ $product->cost_price }}">
            {{ $product->name }}
        </option>
    @endforeach
</select>

                                        </div>
                                        <textarea placeholder="Masukan deskripsi produk (opsional)" rows="1"
                                            class="w-full px-3 py-2 bg-slate-50 dark:bg-slate-800/50 border border-transparent focus:bg-white dark:focus:bg-slate-800 border-slate-100 dark:border-slate-700 rounded-lg text-xs text-slate-500 focus:outline-none transition resize-none"></textarea>
                                    </div>
                                </td>
                                <td class="p-4 align-top">
                                    <input type="number" value="1" min="1" name="items[0][qty]"
                                        class="qty-input w-full px-3 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl text-center font-bold text-slate-700 dark:text-white focus:outline-none focus:border-indigo-500">
                                </td>
                                <td class="p-4 align-top">
                                    <div class="relative">
                                        <span class="absolute left-3 top-2.5 text-slate-400 text-xs">Rp</span>
                                        <input type="number" placeholder="0" name="items[0][price]"
                                            class="price-input w-full pl-8 pr-3 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl text-right font-medium text-slate-700 dark:text-white focus:outline-none focus:border-indigo-500">
                                    </div>
                                </td>
                                <td class="p-4 align-top space-y-2">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-bold text-slate-400 w-8">Tax</span>
                                        <input type="number" placeholder="%" name="items[0][tax]"
                                            class="tax-input w-full px-2 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-lg text-xs text-right">
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-bold text-slate-400 w-8">Disc</span>
                                        <input type="number" placeholder="Rp" name="items[0][discount]"
                                            class="discount-input w-full px-2 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-lg text-xs text-right">
                                    </div>
                                </td>
                                <td class="p-4 align-top text-right">
                                    <div class="py-2.5 font-bold text-slate-800 dark:text-white subtotal-display">Rp 0
                                    </div>
                                </td>
                                <td class="p-4 align-top text-center">
                                    <button type="button" onclick="removeRow(this)"
                                        class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition">
                                        <i class="ph-fill ph-x-circle text-xl"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-1">
                </div>

                <div
                    class="lg:col-span-2 bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                    <div class="space-y-3 pb-6 border-b border-slate-100 dark:border-slate-700 mb-6">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-slate-500 dark:text-slate-400 font-medium">Subtotal</span>
                            <span id="subtotalText" class="font-bold text-slate-800 dark:text-white">Rp 0</span>
                            <input type="hidden" name="subtotal" id="subtotal">
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-slate-500 dark:text-slate-400 font-medium">Total Pajak</span>
                            <span id="taxText" class="font-bold text-slate-800 dark:text-white">Rp 0</span>
                            <input type="hidden" name="total_tax" id="total_tax">
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-slate-500 dark:text-slate-400 font-medium">Total Diskon</span>
                            <span id="discountText" class="font-bold text-red-500">- Rp 0</span>
                            <input type="hidden" name="total_discount" id="total_discount">
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-slate-500 dark:text-slate-400 font-medium text-sm">Biaya Kirim</span>
                            <div class="w-32 relative">
                                <span class="absolute left-3 top-2 text-slate-400 text-xs">Rp</span>
                                <input type="number" placeholder="0" name="shipping_cost" id="shippingCost" value="0"
                                    class="w-full pl-8 pr-3 py-1.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-lg text-right text-sm focus:outline-none focus:border-indigo-500">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-8">
                        <span class="font-display font-bold text-xl text-slate-800 dark:text-white">Total
                            Keseluruhan</span>
                        <span id="grandTotalText" class="font-display font-bold text-2xl text-indigo-600 dark:text-indigo-400">Rp 0</span>
                    </div>

                    <div
                        class="bg-slate-50 dark:bg-slate-800/50 p-4 rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <div
                                class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                <input type="hidden" name="update_stock" value="0">
                                <input type="checkbox" name="update_stock" id="toggle-stock" value="1"
                                    class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-slate-300 checked:right-0 checked:border-emerald-500" />
                                <label for="toggle-stock"
                                    class="toggle-label block overflow-hidden h-6 rounded-full bg-slate-300 cursor-pointer checked:bg-emerald-500"></label>
                            </div>
                            <label for="toggle-stock"
                                class="text-sm font-bold text-slate-600 dark:text-slate-300 cursor-pointer">
                                Perbarui Stok Otomatis
                            </label>
                        </div>

                        <button type="submit"
                            class="w-full sm:w-auto px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 hover:-translate-y-1 transition duration-300 flex items-center justify-center gap-2">
                            <i class="ph-bold ph-check-circle text-xl"></i>
                            Hasilkan Pesanan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <style>
        .toggle-checkbox:checked {
            right: 0;
            border-color: #10b981;
        }

        .toggle-checkbox:checked+.toggle-label {
            background-color: #10b981;
        }

        .toggle-checkbox {
            right: auto;
            left: 0;
            transition: all 0.3s;
        }

        .toggle-label {
            width: 3rem;
            background-color: #cbd5e1;
            transition: background-color 0.3s;
        }
    </style>

    <script>
        // Fungsi Menambah Baris
        function addProductRow() {
            const tableBody = document.getElementById('productTableBody');
            const firstRow = tableBody.rows[0];
            const newRow = firstRow.cloneNode(true);

            // Reset input values pada baris baru
            const inputs = newRow.querySelectorAll('input, textarea');
            inputs.forEach(input => input.value = '');
            inputs.forEach(input => {
                if (input.type === 'number' && input.classList.contains('qty-input')) input.value = 1;
            });

            newRow.querySelector('.subtotal-display').innerText = 'Rp 0';

            tableBody.appendChild(newRow);
        }

        // Fungsi Menghapus Baris
        function removeRow(button) {
            const tableBody = document.getElementById('productTableBody');
            if (tableBody.rows.length > 1) {
                button.closest('tr').remove();
            } else {
                alert('Minimal harus ada satu baris produk.');
            }
        }

        // (Opsional) Listener sederhana untuk update harga visual
        document.addEventListener('input', function(e) {
            if (e.target.classList.contains('qty-input') || e.target.classList.contains('price-input')) {
                const row = e.target.closest('tr');
                const qty = row.querySelector('.qty-input').value || 0;
                const price = row.querySelector('.price-input').value || 0;
                const subtotal = qty * price;

                // Format Rupiah sederhana
                row.querySelector('.subtotal-display').innerText = 'Rp ' + subtotal.toLocaleString('id-ID');
            }
        });
    </script>

    <script>
    function formatRupiah(value) {
        return 'Rp ' + value.toLocaleString('id-ID');
    }

    function calculateAll() {
        let subtotal = 0;
        let totalTax = 0;
        let totalDiscount = 0;

        document.querySelectorAll('#productTableBody tr').forEach(row => {
            const qty = parseFloat(row.querySelector('.qty-input')?.value) || 0;
            const price = parseFloat(row.querySelector('.price-input')?.value) || 0;
            const taxPercent = parseFloat(row.querySelector('.tax-input')?.value) || 0;
            const discountPercent = parseFloat(row.querySelector('.discount-input')?.value) || 0;

            const lineSubtotal = qty * price;
            const tax = (taxPercent / 100) * lineSubtotal;
            const discount = (discountPercent / 100) * lineSubtotal;

            subtotal += lineSubtotal;
            totalTax += tax;
            totalDiscount += discount;

            const rowTotal = lineSubtotal + tax - discount;
            row.querySelector('.subtotal-display').innerText = formatRupiah(rowTotal);
        });

        const shipping = parseFloat(document.getElementById('shippingCost').value) || 0;
        const grandTotal = subtotal + totalTax - totalDiscount + shipping;

        // Update UI
        document.getElementById('subtotalText').innerText = formatRupiah(subtotal);
        document.getElementById('taxText').innerText = formatRupiah(totalTax);
        document.getElementById('discountText').innerText = '- ' + formatRupiah(totalDiscount);
        document.getElementById('grandTotalText').innerText = formatRupiah(grandTotal);

        // Update hidden input (backend)
        document.getElementById('subtotal').value = subtotal;
        document.getElementById('total_tax').value = totalTax;
        document.getElementById('total_discount').value = totalDiscount;
        document.getElementById('grand_total').value = grandTotal;
    }

    // Listener otomatis
    document.addEventListener('input', function(e) {
        if (
            e.target.classList.contains('qty-input') ||
            e.target.classList.contains('price-input') ||
            e.target.classList.contains('tax-input') ||
            e.target.classList.contains('discount-input') ||
            e.target.id === 'shippingCost'
        ) {
            calculateAll();
        }
    });

    // Hitung ulang saat baris ditambah / dihapus
    function addProductRow() {
        const tbody = document.getElementById('productTableBody');
        const row = tbody.rows[0].cloneNode(true);

        row.querySelectorAll('input, textarea').forEach(i => i.value = '');
        row.querySelector('.qty-input').value = 1;
        row.querySelector('.subtotal-display').innerText = 'Rp 0';

        tbody.appendChild(row);
        calculateAll();
        initProductSelect(row.querySelector('.product-select'));
    }

    function removeRow(btn) {
        const tbody = document.getElementById('productTableBody');
        if (tbody.rows.length > 1) {
            btn.closest('tr').remove();
            calculateAll();
        }
    }
</script>
<script>
new TomSelect("#supplierSelect", {
    placeholder: "Cari supplier...",
    allowEmptyOption: true,
    maxOptions: 10,
});
</script>
<script>
function initProductSelect(el) {
    new TomSelect(el, {
        placeholder: "Cari produk...",
        onChange(value) {
            const option = el.options[el.selectedIndex];
            const price = option?.dataset.price || 0;

            const row = el.closest('tr');
            row.querySelector('.price-input').value = price;
            calculateAll();
        }
    });
}

// Init awal
document.querySelectorAll('.product-select').forEach(initProductSelect);
</script>

@endsection
