@extends('layouts.admin')

@section('title', 'Dashboard - Hanania POS')

@section('content')

    <section class="pb-6 px-4 max-w-[1600px] mx-auto h-screen flex flex-col lg:flex-row gap-6">

        <div class="w-full lg:w-[65%] flex flex-col gap-4 h-full">

            <div
                class="bg-white dark:bg-darkCard p-4 rounded-3xl border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col md:flex-row gap-4 items-center justify-between">
                <div class="flex-1 w-full relative">
                    <i class="ph-bold ph-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" id="customerSearch" placeholder="Cari Pelanggan / Member..."
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/50 text-sm">
                </div>
                <button onclick="toggleModal('memberModal')"
                    class="flex items-center justify-center gap-2 px-4 py-2.5 bg-indigo-50 dark:bg-indigo-500/10 text-primary rounded-xl font-bold text-sm hover:bg-indigo-100 dark:hover:bg-indigo-500/20 transition whitespace-nowrap w-full md:w-auto">
                    <i class="ph-bold ph-plus"></i> Member Baru
                </button>
                <button onclick="toggleModal('propertyModal')"
                    class="p-2.5 text-slate-500 hover:text-primary border border-slate-200 dark:border-slate-600 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition"
                    title="Properti Faktur">
                    <i class="ph-bold ph-gear text-lg"></i>
                </button>
            </div>

            <div
                class="bg-white dark:bg-darkCard flex-1 rounded-3xl border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col overflow-hidden relative">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead
                            class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-400 font-display border-b border-slate-200 dark:border-slate-700">
                            <tr>
                                <th class="px-4 py-3 font-bold w-[30%]">Produk</th>
                                <th class="px-2 py-3 font-bold w-[12%]">Qty</th>
                                <th class="px-2 py-3 font-bold w-[18%]">Harga</th>
                                <th class="px-2 py-3 font-bold w-[10%]">Disc %</th>
                                <th class="px-2 py-3 font-bold w-[10%]">Pajak</th>
                                <th class="px-4 py-3 font-bold w-[15%] text-right">Total</th>
                                <th class="px-2 py-3 font-bold w-[5%]"></th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="flex-1 overflow-y-auto pos-scroll p-0">
                    <table class="w-full text-left text-sm">
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700" id="cartItems">
                            </tbody>
                    </table>
                </div>

                <div class="p-4 bg-slate-50 dark:bg-slate-800/50 border-t border-slate-200 dark:border-slate-700 text-sm">
                    <div class="flex flex-col gap-2 mb-4">
                        <div class="flex justify-between items-center text-slate-500 dark:text-slate-400">
                            <span>Subtotal</span>
                            <span id="display-subtotal">Rp 0</span>
                        </div>
                        <div class="flex justify-between items-center text-slate-500 dark:text-slate-400">
                            <span>Total Pajak</span>
                            <span id="display-tax">Rp 0</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-slate-500 dark:text-slate-400">Biaya Kirim</span>
                            <input type="number" id="input-shipping" oninput="updateCalculations()"
                                class="w-24 text-right bg-transparent border-b border-slate-300 focus:border-primary focus:outline-none py-0.5 text-slate-700 dark:text-slate-200"
                                value="0">
                        </div>
                        <div class="flex justify-between items-center text-green-600 dark:text-green-400">
                            <span>Diskon Tambahan</span>
                            <div class="flex items-center gap-1">
                                <span>-</span>
                                <input type="number" id="input-additional-discount" oninput="updateCalculations()"
                                    class="w-24 text-right bg-transparent border-b border-green-300 focus:border-green-600 focus:outline-none py-0.5"
                                    value="0">
                            </div>
                        </div>
                        <div
                            class="flex justify-between items-center pt-3 mt-1 border-t border-slate-200 dark:border-slate-700">
                            <span class="font-bold text-lg text-slate-800 dark:text-white">Total Akhir</span>
                            <span class="font-bold text-2xl text-primary" id="display-grand-total">Rp 0</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-3">
                        <button onclick="saveInvoice('draft')"
                            class="col-span-1 py-3 rounded-xl border border-slate-300 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-bold hover:bg-slate-100 dark:hover:bg-slate-700 transition flex flex-col items-center justify-center gap-1">
                            <i class="ph-bold ph-file-text"></i> Draft
                        </button>
                        <button onclick="toggleModal('couponModal')"
                            class="col-span-1 py-3 rounded-xl bg-orange-50 dark:bg-orange-500/10 border border-orange-200 dark:border-orange-500/30 text-orange-600 dark:text-orange-400 font-bold hover:bg-orange-100 dark:hover:bg-orange-500/20 transition flex flex-col items-center justify-center gap-1">
                            <i class="ph-bold ph-ticket"></i> Kupon
                        </button>
                        <button onclick="openPaymentModal()"
                            class="col-span-2 py-3 rounded-xl bg-primary text-white font-display font-bold text-lg hover:bg-indigo-700 shadow-lg shadow-indigo-500/30 transition flex items-center justify-center gap-2">
                            <i class="ph-bold ph-wallet"></i> BAYAR
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-[35%] flex flex-col gap-4 h-full">
            <div class="bg-white dark:bg-darkCard p-4 rounded-3xl border border-slate-200 dark:border-slate-700 shadow-sm">
                <div class="relative mb-3">
                    <i class="ph-bold ph-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" id="productSearch" autofocus placeholder="Cari nama produk / SKU..."
                        class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/50 text-sm">
                </div>
                <div class="flex gap-2 overflow-x-auto pb-1 no-scrollbar">
                    <button class="px-3 py-1.5 rounded-lg bg-slate-800 text-white text-xs font-bold whitespace-nowrap">Semua</button>
                    </div>
            </div>

            <div class="flex-1 overflow-y-auto pos-scroll pr-1">
                <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-4 pb-20" id="productGrid">
                    @foreach($products as $product)
                    <div onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->sell_price }}, {{ $product->tax_rate }}, {{ $product->discount_rate }})"
                        class="bg-white dark:bg-darkCard rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden hover:shadow-md hover:border-primary/50 cursor-pointer transition group relative">
                        <div class="aspect-square bg-slate-100 dark:bg-slate-700 relative overflow-hidden">
                            @php 
                                $primaryImage = $product->images->where('is_primary', true)->first();
                                $imagePath = $primaryImage ? asset('storage/' . $primaryImage->image_path) : 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?auto=format&fit=crop&q=80&w=300';
                            @endphp
                            <img src="{{ $imagePath }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute top-2 right-2 bg-white/90 dark:bg-black/60 backdrop-blur px-2 py-0.5 rounded text-[10px] font-bold text-slate-800 dark:text-white border border-slate-200 dark:border-slate-600">
                                {{ $product->stocks->sum('quantity') }} Stok
                            </div>
                        </div>
                        <div class="p-3">
                            <h4 class="font-bold text-slate-800 dark:text-white text-sm line-clamp-1">{{ $product->name }}</h4>
                            <p class="text-primary font-bold text-sm mt-1">Rp {{ number_format($product->sell_price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div id="memberModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity opacity-0 modal-bg"
            onclick="toggleModal('memberModal')"></div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-lg bg-white dark:bg-darkCard rounded-3xl shadow-2xl transform scale-95 opacity-0 transition-all modal-content p-6 border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold font-display text-slate-800 dark:text-white">Member Baru</h3>
                <button onclick="toggleModal('memberModal')"
                    class="p-2 bg-slate-100 dark:bg-slate-700 rounded-full hover:bg-slate-200 transition"><i
                        class="ph-bold ph-x"></i></button>
            </div>
            <form id="formMember" class="space-y-4">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-500">Nama Lengkap</label>
                        <input type="text" name="name" required
                            class="w-full p-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 focus:ring-2 focus:ring-primary/50 outline-none text-sm">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-500">No. Telepon</label>
                        <input type="tel" name="phone" required
                            class="w-full p-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 focus:ring-2 focus:ring-primary/50 outline-none text-sm">
                    </div>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-500">Email</label>
                    <input type="email" name="email"
                        class="w-full p-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 focus:ring-2 focus:ring-primary/50 outline-none text-sm">
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-500">Alamat</label>
                    <textarea name="billing_address" rows="2"
                        class="w-full p-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 focus:ring-2 focus:ring-primary/50 outline-none text-sm"></textarea>
                </div>
                <button type="submit"
                    class="w-full py-3 mt-2 bg-primary text-white font-bold rounded-xl hover:bg-indigo-700 transition">Simpan Member</button>
            </form>
        </div>
    </div>

    <div id="propertyModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity opacity-0 modal-bg"
            onclick="toggleModal('propertyModal')"></div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-lg bg-white dark:bg-darkCard rounded-3xl shadow-2xl transform scale-95 opacity-0 transition-all modal-content p-6 border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold font-display text-slate-800 dark:text-white">Properti Faktur</h3>
                <button onclick="toggleModal('propertyModal')"
                    class="p-2 bg-slate-100 dark:bg-slate-700 rounded-full hover:bg-slate-200 transition"><i
                        class="ph-bold ph-x"></i></button>
            </div>
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-500">Nomor Faktur</label>
                        <input type="text" id="prop-invoice-number" value="AUTO-GENERATE" readonly
                            class="w-full p-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-100 dark:bg-slate-800 text-slate-500 text-sm">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-500">Referensi PO</label>
                        <input type="text" id="prop-reference"
                            class="w-full p-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 text-sm">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-500">Tanggal Faktur</label>
                        <input type="date" id="prop-date" value="{{ date('Y-m-d') }}"
                            class="w-full p-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 text-sm">
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-500">Jatuh Tempo</label>
                        <input type="date" id="prop-due-date"
                            class="w-full p-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 text-sm">
                    </div>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-500">Catatan Internal</label>
                    <textarea id="prop-note" rows="3"
                        class="w-full p-2.5 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 text-sm"></textarea>
                </div>
                <button onclick="toggleModal('propertyModal')"
                    class="w-full py-3 mt-2 bg-slate-800 dark:bg-slate-700 text-white font-bold rounded-xl hover:bg-slate-700 transition">Simpan Pengaturan</button>
            </div>
        </div>
    </div>

    <div id="paymentModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity opacity-0 modal-bg"
            onclick="toggleModal('paymentModal')"></div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-2xl bg-white dark:bg-darkCard rounded-3xl shadow-2xl transform scale-95 opacity-0 transition-all modal-content p-0 border border-slate-100 dark:border-slate-700 overflow-hidden">
            <div class="flex h-full flex-col md:flex-row">
                <div class="w-full md:w-1/3 bg-slate-50 dark:bg-slate-800 p-6 flex flex-col justify-between border-r border-slate-200 dark:border-slate-700">
                    <div>
                        <h4 class="text-slate-500 text-xs font-bold uppercase mb-4">Total Tagihan</h4>
                        <div class="text-3xl font-display font-bold text-slate-800 dark:text-white mb-1" id="pay-grand-total">Rp 0</div>
                        <div class="text-xs text-slate-400">Termasuk Pajak & Biaya Layanan</div>
                    </div>
                    <div class="space-y-3 mt-6">
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-500">Kurang Bayar</span>
                            <span class="font-bold text-red-500" id="pay-remains">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-500">Kembalian</span>
                            <span class="font-bold text-green-500" id="pay-change">Rp 0</span>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-2/3 p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold font-display text-slate-800 dark:text-white">Pembayaran</h3>
                        <button onclick="toggleModal('paymentModal')"
                            class="p-2 bg-slate-100 dark:bg-slate-700 rounded-full hover:bg-slate-200 transition"><i
                                class="ph-bold ph-x"></i></button>
                    </div>

                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" class="pay-method-btn py-2 px-4 rounded-xl border-2 border-primary bg-indigo-50 dark:bg-indigo-500/20 text-primary font-bold text-sm flex items-center justify-center gap-2" data-method="cash">
                                <i class="ph-fill ph-money"></i> Tunai
                            </button>
                            <button type="button" class="pay-method-btn py-2 px-4 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold text-sm flex items-center justify-center gap-2" data-method="card">
                                <i class="ph-fill ph-credit-card"></i> Debit/Kredit
                            </button>
                        </div>

                        <div class="space-y-1 mt-4">
                            <label class="text-xs font-bold text-slate-500">Jumlah Uang Diterima</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 font-bold text-slate-400">Rp</span>
                                <input type="number" id="input-payment-amount" oninput="calculateChange()"
                                    class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 focus:ring-2 focus:ring-primary/50 outline-none text-lg font-bold">
                            </div>
                        </div>

                        <button onclick="saveInvoice('paid')"
                            class="w-full py-3.5 mt-4 bg-emerald-500 text-white font-bold rounded-xl hover:bg-emerald-600 transition shadow-lg shadow-emerald-500/20">
                            Proses Pembayaran
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data State
        let cart = [];
        let totals = {
            subtotal: 0,
            tax: 0,
            shipping: 0,
            discount: 0,
            grandTotal: 0
        };

        // UI Helpers
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            const bg = modal.querySelector('.modal-bg');
            const content = modal.querySelector('.modal-content');

            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    bg.classList.remove('opacity-0');
                    content.classList.remove('opacity-0', 'scale-95');
                    content.classList.add('scale-100');
                }, 10);
            } else {
                bg.classList.add('opacity-0');
                content.classList.remove('scale-100');
                content.classList.add('opacity-0', 'scale-95');
                setTimeout(() => modal.classList.add('hidden'), 300);
            }
        }

        // Cart Logic
        function addToCart(id, name, price, taxRate, discRate) {
            const existing = cart.find(i => i.id === id);
            if (existing) {
                existing.qty++;
            } else {
                cart.push({ id, name, price, taxRate, discRate, qty: 1 });
            }
            renderCart();
        }

        function removeFromCart(id) {
            cart = cart.filter(i => i.id !== id);
            renderCart();
        }

        function updateQty(id, newQty) {
            const item = cart.find(i => i.id === id);
            if (item) {
                item.qty = parseInt(newQty) || 1;
                renderCart();
            }
        }

        function renderCart() {
            const tbody = document.getElementById('cartItems');
            tbody.innerHTML = '';

            cart.forEach(item => {
                const itemSubtotal = item.price * item.qty;
                const itemDisc = itemSubtotal * (item.discRate / 100);
                const itemTax = (itemSubtotal - itemDisc) * (item.taxRate / 100);
                const itemTotal = itemSubtotal - itemDisc + itemTax;

                tbody.innerHTML += `
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/30 group">
                        <td class="px-4 py-3">
                            <div class="font-bold text-slate-800 dark:text-slate-200">${item.name}</div>
                        </td>
                        <td class="px-2 py-3">
                            <input type="number" value="${item.qty}" onchange="updateQty(${item.id}, this.value)"
                                class="w-16 px-2 py-1 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-center focus:ring-2 focus:ring-primary/50 focus:outline-none">
                        </td>
                        <td class="px-2 py-3 text-slate-600 dark:text-slate-300">Rp ${item.price.toLocaleString()}</td>
                        <td class="px-2 py-3 text-xs text-slate-500">${item.discRate}%</td>
                        <td class="px-2 py-3 text-xs text-slate-500">${item.taxRate}%</td>
                        <td class="px-4 py-3 text-right font-bold text-slate-800 dark:text-white">Rp ${itemTotal.toLocaleString()}</td>
                        <td class="px-2 py-3 text-center">
                            <button onclick="removeFromCart(${item.id})" class="text-red-500 opacity-0 group-hover:opacity-100 transition">
                                <i class="ph-bold ph-trash text-lg"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
            updateCalculations();
        }

        function updateCalculations() {
            let subtotal = 0;
            let totalTax = 0;
            let totalItemDisc = 0;

            cart.forEach(item => {
                const s = item.price * item.qty;
                const d = s * (item.discRate / 100);
                const t = (s - d) * (item.taxRate / 100);
                subtotal += s;
                totalItemDisc += d;
                totalTax += t;
            });

            const shipping = parseFloat(document.getElementById('input-shipping').value) || 0;
            const addDiscount = parseFloat(document.getElementById('input-additional-discount').value) || 0;
            const grandTotal = (subtotal - totalItemDisc) + totalTax + shipping - addDiscount;

            totals = { subtotal, tax: totalTax, itemDiscount: totalItemDisc, shipping, additionalDiscount: addDiscount, grandTotal };
            console.log(totals);
            
            document.getElementById('display-subtotal').innerText = `Rp ${subtotal.toLocaleString()}`;
            document.getElementById('display-tax').innerText = `Rp ${totalTax.toLocaleString()}`;
            document.getElementById('display-grand-total').innerText = `Rp ${grandTotal.toLocaleString()}`;
            
        }

        // Payment Logic
        function openPaymentModal() {
            if (cart.length === 0) return alert('Keranjang masih kosong!');
            document.getElementById('pay-grand-total').innerText = `Rp ${totals.grandTotal.toLocaleString()}`;
            calculateChange();
            toggleModal('paymentModal');
        }

        function calculateChange() {
            const received = parseFloat(document.getElementById('input-payment-amount').value) || 0;
            const remains = Math.max(0, totals.grandTotal - received);
            const change = Math.max(0, received - totals.grandTotal);

            document.getElementById('pay-remains').innerText = `Rp ${remains.toLocaleString()}`;
            document.getElementById('pay-change').innerText = `Rp ${change.toLocaleString()}`;
        }

        // Final Save (Backend Sync)
        async function saveInvoice(status) {
    if (cart.length === 0) {
        alert('Keranjang masih kosong!');
        return;
    }

    const payload = {
        _token: '{{ csrf_token() }}',
        status: status,
        invoice_date: document.getElementById('prop-date').value,
        due_date: document.getElementById('prop-due-date').value,
        po_reference: document.getElementById('prop-reference').value,
        admin_note: document.getElementById('prop-note').value,
        
        // Ambil nama pelanggan dari input pencarian pelanggan
        customer_name: document.getElementById('customerSearch').value || 'Umum',
        customer_address: '', // Bisa ditambahkan jika ada input alamat
        
        subtotal: totals.subtotal,
        total_tax: totals.tax,
        total_item_discount: totals.itemDiscount,
        shipping_cost: totals.shipping,
        additional_discount: totals.additionalDiscount,
        grand_total: totals.grandTotal,
        
        // Pastikan key di sini SAMA dengan yang dipanggil di Controller
        items: cart.map(i => ({
            product_id: i.id,
            name: i.name,
            qty: i.qty,
            price: i.price,
            taxRate: i.taxRate,
            discRate: i.discRate,
            amount: (i.price * i.qty)
        }))
    };

    try {
        const response = await fetch('/penjualan/simpan-faktur', {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/json', 
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(payload)
        });
        
        const result = await response.json();
        
        if (response.ok) {
            alert(result.message);
            window.location.reload();
        } else {
            alert('Error: ' + result.message);
        }
    } catch (e) {
        console.error(e);
        alert('Terjadi kesalahan koneksi');
    }
}
        
    </script>
@endsection