@extends('layouts.admin')

@section('title', 'Pelanggan Baru - Hanania POS')

@section('content')
    <section id="new-customer" class="max-w-7xl mx-auto pb-10">

        <form action="{{ route('customers.store') }}" method="POST" id="main-form">
            @csrf
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-2xl font-display font-bold text-slate-800 dark:text-white flex items-center gap-3">
                        <a href="#"
                            class="w-10 h-10 rounded-xl bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 flex items-center justify-center text-slate-500 hover:text-indigo-600 hover:border-indigo-200 transition">
                            <i class="ph-bold ph-arrow-left"></i>
                        </a>
                        Tambah Pelanggan Baru
                    </h1>
                    <p class="text-slate-500 dark:text-slate-400 text-sm mt-1 ml-14">
                        Isi informasi lengkap untuk mendaftarkan pelanggan ke database.
                    </p>
                </div>

                <div class="hidden md:flex gap-3">
                    <button type="button" onclick="history.back()"
                        class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 bg-indigo-600 text-white font-bold text-sm rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-200/50 dark:shadow-none transition flex items-center gap-2">
                        <i class="ph-bold ph-check"></i>
                        Simpan Pelanggan
                    </button>
                </div>
            </div>

            <div id="customers-container">
                @if($errors->any())
                    <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700">
                        <strong>Ada beberapa kesalahan pada input:</strong>
                        <ul class="mt-2 list-disc ml-5">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @php
                    $oldCustomers = old('customers', [ [] ]);
                @endphp

                @foreach($oldCustomers as $index => $customer)
                    <div class="customer-card-group mb-10 border-b-2 border-dashed border-slate-200 dark:border-slate-700 pb-10 last:border-0" data-index="{{ $index }}">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                            <div class="bg-white dark:bg-darkCard p-6 md:p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none h-fit">
                                <div class="flex items-center gap-3 mb-6 pb-6 border-b border-slate-100 dark:border-slate-700">
                                    <div class="w-10 h-10 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-xl flex items-center justify-center">
                                        <i class="ph-fill ph-receipt text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                                            Alamat Tagihan
                                        </h3>
                                        <p class="text-xs text-slate-500 dark:text-slate-400">Informasi utama penagihan pelanggan</p>
                                    </div>
                                </div>

                                <div class="space-y-5">
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Lengkap</label>
                                        <input type="text" name="customers[{{ $index }}][name]" placeholder="Contoh: Budi Santoso"
                                            value="{{ old("customers.$index.name", $customer['name'] ?? '') }}"
                                            class="billing-name w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition placeholder:text-slate-400" required />
                                        @error("customers.$index.name")
                                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                        <div>
                                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Perusahaan</label>
                                            <input type="text" name="customers[{{ $index }}][company]" placeholder="PT. Maju Jaya"
                                                value="{{ old("customers.$index.company", $customer['company'] ?? '') }}"
                                                class="billing-company w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition placeholder:text-slate-400" />
                                            @error("customers.$index.company")
                                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Telepon</label>
                                            <input type="tel" name="customers[{{ $index }}][phone]" placeholder="+62 812..."
                                                value="{{ old("customers.$index.phone", $customer['phone'] ?? '') }}"
                                                class="billing-phone w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition placeholder:text-slate-400" />
                                            @error("customers.$index.phone")
                                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Alamat Email</label>
                                        <input type="email" name="customers[{{ $index }}][email]" placeholder="email@domain.com"
                                            value="{{ old("customers.$index.email", $customer['email'] ?? '') }}"
                                            class="billing-email w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition placeholder:text-slate-400" />
                                        @error("customers.$index.email")
                                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Alamat Jalan</label>
                                        <textarea name="customers[{{ $index }}][billing_address]" rows="3" placeholder="Nama jalan, nomor gedung, dll."
                                            class="billing-address w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition placeholder:text-slate-400 resize-none">{{ old("customers.$index.billing_address", $customer['billing_address'] ?? '') }}</textarea>
                                        @error("customers.$index.billing_address")
                                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                        <div>
                                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kota</label>
                                            <input type="text" name="customers[{{ $index }}][billing_city]" placeholder="Jakarta Selatan"
                                                value="{{ old("customers.$index.billing_city", $customer['billing_city'] ?? '') }}"
                                                class="billing-city w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition placeholder:text-slate-400" />
                                            @error("customers.$index.billing_city")
                                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Wilayah/Provinsi</label>
                                            <input type="text" name="customers[{{ $index }}][billing_state]" placeholder="DKI Jakarta"
                                                value="{{ old("customers.$index.billing_state", $customer['billing_state'] ?? '') }}"
                                                class="billing-region w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition placeholder:text-slate-400" />
                                            @error("customers.$index.billing_state")
                                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                        <div>
                                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Negara</label>
                                            <select name="customers[{{ $index }}][billing_country]"
                                                class="billing-country w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition appearance-none">
                                                <option value="ID" {{ old("customers.$index.billing_country", $customer['billing_country'] ?? 'ID') == 'ID' ? 'selected' : '' }}>Indonesia</option>
                                                <option value="MY" {{ old("customers.$index.billing_country", $customer['billing_country'] ?? '') == 'MY' ? 'selected' : '' }}>Malaysia</option>
                                                <option value="SG" {{ old("customers.$index.billing_country", $customer['billing_country'] ?? '') == 'SG' ? 'selected' : '' }}>Singapore</option>
                                            </select>
                                            @error("customers.$index.billing_country")
                                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kode Pos</label>
                                            <input type="text" name="customers[{{ $index }}][billing_postcode]" placeholder="12xxx"
                                                value="{{ old("customers.$index.billing_postcode", $customer['billing_postcode'] ?? '') }}"
                                                class="billing-zip w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition placeholder:text-slate-400" />
                                            @error("customers.$index.billing_postcode")
                                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col gap-6">
                                <div class="bg-white dark:bg-darkCard p-6 md:p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none h-fit">
                                    <div class="flex items-center justify-between mb-6 pb-6 border-b border-slate-100 dark:border-slate-700">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-orange-50 dark:bg-orange-500/20 text-orange-600 dark:text-orange-400 rounded-xl flex items-center justify-center">
                                                <i class="ph-fill ph-truck text-xl"></i>
                                            </div>
                                            <div>
                                                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                                                    Alamat Pengiriman
                                                </h3>
                                                <p class="text-xs text-slate-500 dark:text-slate-400">Lokasi tujuan pengiriman barang</p>
                                            </div>
                                        </div>
                                        <button type="button" onclick="copyBillingToShipping(this)"
                                            class="text-xs font-bold text-indigo-600 hover:text-indigo-700 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-500/10 px-3 py-1.5 rounded-lg border border-indigo-100 dark:border-indigo-500/20 transition">
                                            Salin dari Tagihan
                                        </button>
                                    </div>

                                    <div class="space-y-5">
                                        <div>
                                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Penerima</label>
                                            <input type="text" name="customers[{{ $index }}][shipping_name]" placeholder="Nama penerima paket"
                                                value="{{ old("customers.$index.shipping_name", $customer['shipping_name'] ?? '') }}"
                                                class="shipping-name w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-orange-500/50 focus:border-orange-500 transition placeholder:text-slate-400" />
                                            @error("customers.$index.shipping_name")
                                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                            <div>
                                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Telepon</label>
                                                <input type="tel" name="customers[{{ $index }}][shipping_phone]" placeholder="+62..."
                                                    value="{{ old("customers.$index.shipping_phone", $customer['shipping_phone'] ?? '') }}"
                                                    class="shipping-phone w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-orange-500/50 focus:border-orange-500 transition placeholder:text-slate-400" />
                                                @error("customers.$index.shipping_phone")
                                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Email</label>
                                                <input type="email" name="customers[{{ $index }}][shipping_email]" placeholder="email@..."
                                                    value="{{ old("customers.$index.shipping_email", $customer['shipping_email'] ?? '') }}"
                                                    class="shipping-email w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-orange-500/50 focus:border-orange-500 transition placeholder:text-slate-400" />
                                                @error("customers.$index.shipping_email")
                                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Alamat Jalan</label>
                                            <textarea name="customers[{{ $index }}][shipping_address]" rows="3" placeholder="Detail alamat pengiriman..."
                                                class="shipping-address w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-orange-500/50 focus:border-orange-500 transition placeholder:text-slate-400 resize-none">{{ old("customers.$index.shipping_address", $customer['shipping_address'] ?? '') }}</textarea>
                                            @error("customers.$index.shipping_address")
                                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                            <div>
                                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kota</label>
                                                <input type="text" name="customers[{{ $index }}][shipping_city]"
                                                    value="{{ old("customers.$index.shipping_city", $customer['shipping_city'] ?? '') }}"
                                                    class="shipping-city w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-orange-500/50 focus:border-orange-500 transition placeholder:text-slate-400" />
                                                @error("customers.$index.shipping_city")
                                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Wilayah</label>
                                                <input type="text" name="customers[{{ $index }}][shipping_state]"
                                                    value="{{ old("customers.$index.shipping_state", $customer['shipping_state'] ?? '') }}"
                                                    class="shipping-region w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-orange-500/50 focus:border-orange-500 transition placeholder:text-slate-400" />
                                                @error("customers.$index.shipping_state")
                                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                            <div>
                                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Negara</label>
                                                <select name="customers[{{ $index }}][shipping_country]"
                                                    class="shipping-country w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-orange-500/50 focus:border-orange-500 transition appearance-none">
                                                    <option value="ID" {{ old("customers.$index.shipping_country", $customer['shipping_country'] ?? 'ID') == 'ID' ? 'selected' : '' }}>Indonesia</option>
                                                    <option value="MY" {{ old("customers.$index.shipping_country", $customer['shipping_country'] ?? '') == 'MY' ? 'selected' : '' }}>Malaysia</option>
                                                    <option value="SG" {{ old("customers.$index.shipping_country", $customer['shipping_country'] ?? '') == 'SG' ? 'selected' : '' }}>Singapore</option>
                                                </select>
                                                @error("customers.$index.shipping_country")
                                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kode Pos</label>
                                                <input type="text" name="customers[{{ $index }}][shipping_postcode]"
                                                    value="{{ old("customers.$index.shipping_postcode", $customer['shipping_postcode'] ?? '') }}"
                                                    class="shipping-zip w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-600 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 outline-none focus:ring-2 focus:ring-orange-500/50 focus:border-orange-500 transition placeholder:text-slate-400" />
                                                @error("customers.$index.shipping_postcode")
                                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none sticky bottom-4 z-10">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="text-center md:text-left">
                        <h4 class="font-bold text-slate-800 dark:text-white">Aksi Bulk</h4>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Tambah form baru atau simpan semua data.</p>
                    </div>
                    <div class="flex items-center gap-4 w-full md:w-auto">
                        <button type="button" onclick="resetForm()"
                            class="flex-1 md:flex-none px-6 py-3 rounded-xl border border-red-200 dark:border-red-900/30 text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-500/10 font-bold text-sm hover:bg-red-100 dark:hover:bg-red-500/20 transition flex items-center justify-center gap-2">
                            <i class="ph-bold ph-trash"></i>
                            Reset Form
                        </button>

                        <button type="button" id="add-customer-btn"
                            class="flex-1 md:flex-none px-8 py-3 bg-indigo-600 text-white font-bold text-sm rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300 flex items-center justify-center gap-2">
                            <i class="ph-bold ph-plus"></i>
                            Tambahkan Pelanggan Lain
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <script>
        // 1. Fungsi Salin Tagihan ke Pengiriman
        function copyBillingToShipping(btn) {
            // Cari elemen pembungkus terdekat (customer-card-group)
            const cardGroup = btn.closest('.customer-card-group');

            // Ambil value dari form billing
            const name = cardGroup.querySelector('.billing-name').value;
            const phone = cardGroup.querySelector('.billing-phone').value;
            const email = cardGroup.querySelector('.billing-email').value;
            const address = cardGroup.querySelector('.billing-address').value;
            const city = cardGroup.querySelector('.billing-city').value;
            const region = cardGroup.querySelector('.billing-region').value;
            const country = cardGroup.querySelector('.billing-country').value;
            const zip = cardGroup.querySelector('.billing-zip').value;

            // Set value ke form shipping
            cardGroup.querySelector('.shipping-name').value = name;
            cardGroup.querySelector('.shipping-phone').value = phone;
            cardGroup.querySelector('.shipping-email').value = email;
            cardGroup.querySelector('.shipping-address').value = address;
            cardGroup.querySelector('.shipping-city').value = city;
            cardGroup.querySelector('.shipping-region').value = region;
            cardGroup.querySelector('.shipping-country').value = country;
            cardGroup.querySelector('.shipping-zip').value = zip;
        }

        // 2. Fungsi Tambah Pelanggan (Duplikat Card)
        document.getElementById('add-customer-btn').addEventListener('click', function() {
            const container = document.getElementById('customers-container');
            const template = container.firstElementChild; // Ambil elemen pertama sebagai template

            // Clone elemen
            const newCard = template.cloneNode(true);

            // Update Index Array (agar name="customers[0]" menjadi name="customers[1]")
            const newIndex = container.children.length;
            newCard.setAttribute('data-index', newIndex);

            // Reset nilai input di card baru & update atribut name
            const inputs = newCard.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.value = ''; // Kosongkan nilai

                // Ganti index di attribute name
                const name = input.getAttribute('name');
                if (name) {
                    input.setAttribute('name', name.replace(/\[\d+\]/, `[${newIndex}]`));
                }
            });

            // Tambahkan ke container
            container.appendChild(newCard);

            // Scroll ke elemen baru
            newCard.scrollIntoView({ behavior: 'smooth' });
        });

        // 3. Fungsi Reset (Opsional)
        function resetForm() {
            if(confirm('Apakah Anda yakin ingin menghapus semua data input?')) {
                document.getElementById('main-form').reset();
                // Hapus elemen tambahan jika ada (kembali ke 1 form)
                const container = document.getElementById('customers-container');
                while (container.children.length > 1) {
                    container.removeChild(container.lastChild);
                }
            }
        }
    </script>
@endsection
