@extends('layouts.admin')

@section('title', 'Edit Pesanan - ' . $purchaseOrder->reference_no)

@section('content')
    <section class="page-section active max-w-7xl mx-auto pb-20">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Edit Pesanan</h2>
                <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
                    <span>Purchase Order</span>
                    <i class="ph-bold ph-caret-right text-xs"></i>
                    <span class="font-mono text-indigo-600 font-bold">{{ $purchaseOrder->reference_no }}</span>
                </div>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('purchase-orders.index') }}"
                    class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition flex items-center gap-2">
                    <i class="ph-bold ph-arrow-left"></i> Kembali
                </a>
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

        <form id="orderForm" action="{{ route('purchase-orders.update', $purchaseOrder->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                {{-- Kiri: Info Supplier & Order --}}
                <div
                    class="lg:col-span-2 bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                        <i class="ph-fill ph-users text-indigo-500"></i> Informasi Utama
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        {{-- Supplier --}}
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Supplier</label>
                            <select name="supplier_id" id="supplierSelect" required class="w-full">
                                <option value="">Pilih Supplier</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}"
                                        {{ $purchaseOrder->supplier_id == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->name }} - {{ $supplier->company }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Warehouse --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Gudang Tujuan</label>
                            <select name="warehouse_id"
                                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl focus:outline-none focus:border-indigo-500 text-slate-700 dark:text-slate-200">
                                @foreach ($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}"
                                        {{ $purchaseOrder->warehouse_id == $warehouse->id ? 'selected' : '' }}>
                                        {{ $warehouse->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Status Order (Khusus Edit) --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Status Pesanan</label>
                            <select name="status"
                                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl focus:outline-none focus:border-indigo-500 text-slate-700 dark:text-slate-200">
                                <option value="pending" {{ $purchaseOrder->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ $purchaseOrder->status == 'completed' ? 'selected' : '' }}>Completed (Selesai)</option>
                                <option value="cancelled" {{ $purchaseOrder->status == 'cancelled' ? 'selected' : '' }}>Cancelled (Batal)</option>
                            </select>
                        </div>

                        {{-- Dates --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">Tgl. Order</label>
                            <input type="date" name="order_date" value="{{ $purchaseOrder->order_date }}"
                                class="w-full px-3 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm text-slate-600 dark:text-slate-300">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2">No. Referensi</label>
                            <input type="text" name="reference_no" value="{{ $purchaseOrder->reference_no }}" readonly
                                class="w-full px-3 py-2.5 bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl text-sm text-slate-500 cursor-not-allowed">
                        </div>
                    </div>
                </div>

                {{-- Kanan: Note & Extra --}}
                <div class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                        <i class="ph-fill ph-notebook text-orange-500"></i> Catatan
                    </h3>
                    <div>
                        <textarea name="note" rows="4" placeholder="Tambahkan catatan untuk supplier atau internal..."
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:outline-none focus:border-indigo-500">{{ $purchaseOrder->note }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Table Items --}}
            <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm mb-6 overflow-hidden">
                <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">Daftar Barang</h3>
                    <button type="button" onclick="addProductRow()"
                        class="px-4 py-2 bg-indigo-500 text-white text-sm font-bold rounded-xl hover:bg-indigo-600 transition shadow-lg shadow-indigo-500/30 flex items-center gap-2">
                        <i class="ph-bold ph-plus"></i> Tambah Baris
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display text-xs uppercase tracking-wider">
                            <tr>
                                <th class="p-4 font-bold min-w-[250px]">Produk / Deskripsi</th>
                                <th class="p-4 font-bold w-[120px]">Kuantitas</th>
                                <th class="p-4 font-bold w-[150px]">Harga Satuan</th>
                                <th class="p-4 font-bold w-[180px]">Pajak & Diskon (%)</th>
                                <th class="p-4 font-bold w-[150px] text-right">Subtotal</th>
                                <th class="p-4 font-bold w-[50px] text-center"><i class="ph-bold ph-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody id="productTableBody" class="divide-y divide-slate-100 dark:divide-slate-700 text-sm">
                            {{-- Loop Existing Items --}}
                            @foreach ($purchaseOrder->items as $index => $detail)
                                <tr class="group hover:bg-slate-50 dark:hover:bg-slate-700/30 transition">
                                    <td class="p-4 align-top">
                                        <div class="space-y-2">
                                            <div class="relative">
                                                <i class="ph-bold ph-barcode absolute left-3 top-3 text-slate-400"></i>
                                                <select name="items[{{ $index }}][product_id]" class="product-select w-full">
                                                    <option value="">Pilih Produk</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}" data-price="{{ $product->cost_price }}"
                                                            {{ $detail->product_id == $product->id ? 'selected' : '' }}>
                                                            {{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4 align-top">
                                        <input type="number" value="{{ $detail->qty }}" min="1" name="items[{{ $index }}][qty]"
                                            class="qty-input w-full px-3 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl text-center font-bold text-slate-700 dark:text-white focus:outline-none focus:border-indigo-500">
                                    </td>
                                    <td class="p-4 align-top">
                                        <div class="relative">
                                            <span class="absolute left-3 top-2.5 text-slate-400 text-xs">Rp</span>
                                            <input type="number" value="{{ $detail->price }}" name="items[{{ $index }}][price]"
                                                class="price-input w-full pl-8 pr-3 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl text-right font-medium text-slate-700 dark:text-white focus:outline-none focus:border-indigo-500">
                                        </div>
                                    </td>
                                    <td class="p-4 align-top space-y-2">
                                        <div class="flex items-center gap-2">
                                            <span class="text-xs font-bold text-slate-400 w-8">Tax</span>
                                            <input type="number" value="{{ $detail->tax }}" placeholder="%" name="items[{{ $index }}][tax]"
                                                class="tax-input w-full px-2 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-lg text-xs text-right">
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="text-xs font-bold text-slate-400 w-8">Disc</span>
                                            <input type="number" value="{{ $detail->discount }}" placeholder="%" name="items[{{ $index }}][discount]"
                                                class="discount-input w-full px-2 py-1.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-lg text-xs text-right">
                                        </div>
                                    </td>
                                    <td class="p-4 align-top text-right">
                                        <div class="py-2.5 font-bold text-slate-800 dark:text-white subtotal-display">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</div>
                                    </td>
                                    <td class="p-4 align-top text-center">
                                        <button type="button" onclick="removeRow(this)"
                                            class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition">
                                            <i class="ph-fill ph-x-circle text-xl"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Totals & Submit --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-1"></div>
                <div class="lg:col-span-2 bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                    <div class="space-y-3 pb-6 border-b border-slate-100 dark:border-slate-700 mb-6">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-slate-500 dark:text-slate-400 font-medium">Subtotal</span>
                            <span id="subtotalText" class="font-bold text-slate-800 dark:text-white">Rp 0</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-slate-500 dark:text-slate-400 font-medium">Total Pajak</span>
                            <span id="taxText" class="font-bold text-slate-800 dark:text-white">Rp 0</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-slate-500 dark:text-slate-400 font-medium">Total Diskon</span>
                            <span id="discountText" class="font-bold text-red-500">- Rp 0</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-slate-500 dark:text-slate-400 font-medium text-sm">Biaya Kirim</span>
                            <div class="w-32 relative">
                                <span class="absolute left-3 top-2 text-slate-400 text-xs">Rp</span>
                                <input type="number" name="shipping_cost" id="shippingCost" value="{{ $purchaseOrder->shipping_cost }}"
                                    class="w-full pl-8 pr-3 py-1.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-lg text-right text-sm focus:outline-none focus:border-indigo-500">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-8">
                        <span class="font-display font-bold text-xl text-slate-800 dark:text-white">Total Keseluruhan</span>
                        <span id="grandTotalText" class="font-display font-bold text-2xl text-indigo-600 dark:text-indigo-400">Rp 0</span>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center justify-end gap-4">
                        <button type="submit"
                            class="w-full sm:w-auto px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 hover:-translate-y-1 transition duration-300 flex items-center justify-center gap-2">
                            <i class="ph-bold ph-floppy-disk text-xl"></i>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    {{-- Gunakan Script yang sama dengan Create, namun tambahkan init di akhir --}}
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
                // Hitung tax/disk berdasarkan persentase dari subtotal baris
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

            document.getElementById('subtotalText').innerText = formatRupiah(subtotal);
            document.getElementById('taxText').innerText = formatRupiah(totalTax);
            document.getElementById('discountText').innerText = '- ' + formatRupiah(totalDiscount);
            document.getElementById('grandTotalText').innerText = formatRupiah(grandTotal);
        }

        document.addEventListener('input', function(e) {
            if (e.target.classList.contains('qty-input') ||
                e.target.classList.contains('price-input') ||
                e.target.classList.contains('tax-input') ||
                e.target.classList.contains('discount-input') ||
                e.target.id === 'shippingCost') {
                calculateAll();
            }
        });

        // Add Row Logic (Clone first row logic adjusted for array index)
        let rowCount = {{ count($purchaseOrder->items) }}; // Start count based on existing items

        function addProductRow() {
            const tbody = document.getElementById('productTableBody');
            // Clone row pertama (pastikan ada minimal 1 row hidden atau visible sebagai template idealnya,
            // tapi disini kita clone row pertama yang ada)
            const firstRow = tbody.querySelector('tr');
            const newRow = firstRow.cloneNode(true);

            // Update array index attributes
            newRow.querySelectorAll('[name]').forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    input.setAttribute('name', name.replace(/\[\d+\]/, `[${rowCount}]`));
                }
                input.value = ''; // Reset value
            });

            // Reset specific fields default
            newRow.querySelector('.qty-input').value = 1;
            newRow.querySelector('.subtotal-display').innerText = 'Rp 0';

            // Re-init TomSelect (Destroy clone's tomselect structure first if copied)
            const selectContainer = newRow.querySelector('.ts-wrapper');
            if(selectContainer){
                selectContainer.remove(); // Hapus wrapper TomSelect yang ikut ke-clone
                // Buat ulang element select native
                const select = document.createElement('select');
                select.name = `items[${rowCount}][product_id]`;
                select.className = 'product-select w-full';
                select.innerHTML = firstRow.querySelector('select.product-select').innerHTML; // Copy options
                newRow.querySelector('.relative').appendChild(select); // Append ke parent
                initProductSelect(select);
            } else {
                // Fallback jika clone node select murni
                initProductSelect(newRow.querySelector('.product-select'));
            }

            tbody.appendChild(newRow);
            rowCount++;
            calculateAll();
        }

        function removeRow(btn) {
            const tbody = document.getElementById('productTableBody');
            if (tbody.rows.length > 1) {
                btn.closest('tr').remove();
                calculateAll();
            } else {
                alert('Minimal satu baris produk harus ada.');
            }
        }
    </script>
    <script>
        new TomSelect("#supplierSelect", {
            placeholder: "Cari supplier...",
            allowEmptyOption: true,
        });

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

        // Init semua select yang ada saat load page
        document.querySelectorAll('.product-select').forEach(initProductSelect);

        // Hitung total saat load page pertama kali
        calculateAll();
    </script>
@endsection
