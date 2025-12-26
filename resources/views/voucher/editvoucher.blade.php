@extends('layouts.admin')

@section('title', 'Edit Voucher - Hanania POS')

@section('content')
    <section id="edit-voucher" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Edit Voucher
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Perbarui detail voucher dan target akun.
                </p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('vouchers.index') }}" class="px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition">Kembali</a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2">
                <div
                    class="bg-white dark:bg-darkCard p-6 md:p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">

                    <form action="{{ route('vouchers.update', $voucher) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            <div class="mb-4">
                                <div class="rounded-lg bg-red-50 border border-red-100 text-red-700 px-4 py-3">
                                    <ul class="list-disc list-inside text-sm">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <div class="space-y-6">

                            <div>
                                <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-2">
                                    Nama Kupon <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="ph-bold ph-tag text-slate-400 text-lg"></i>
                                    </div>
                                    <input type="text" name="coupon_name" value="{{ old('coupon_name', $voucher->name) }}" placeholder="Contoh: DISKON MERDEKA"
                                        class="w-full pl-11 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition placeholder-slate-400 dark:placeholder-slate-500"
                                        required>
                                    @error('coupon_name')
                                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <p class="text-xs text-slate-400 mt-1">Kode voucher akan dibuat otomatis berdasarkan nama.</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-2">
                                        Nilai Potongan <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <span class="text-slate-400 font-bold text-sm">Rp</span>
                                        </div>
                                        <input type="number" name="coupon_value" value="{{ old('coupon_value', $voucher->value) }}" placeholder="0"
                                            class="w-full pl-11 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition placeholder-slate-400 dark:placeholder-slate-500"
                                            required>
                                        @error('coupon_value')
                                            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-2">
                                        Jumlah Kuota <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="ph-bold ph-stack text-slate-400 text-lg"></i>
                                        </div>
                                        <input type="number" name="quantity" value="{{ old('quantity', $voucher->quantity) }}" placeholder="100"
                                            class="w-full pl-11 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition placeholder-slate-400 dark:placeholder-slate-500"
                                            required>
                                        @error('quantity')
                                            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-2">
                                    Berlaku Sampai <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="ph-bold ph-calendar-blank text-slate-400 text-lg"></i>
                                    </div>
                                    <input type="date" name="valid_until" value="{{ old('valid_until', $voucher->valid_until?->format('Y-m-d')) }}"
                                        class="w-full pl-11 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition placeholder-slate-400 dark:placeholder-slate-500"
                                        required>
                                    @error('valid_until')
                                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <hr class="border-slate-100 dark:border-slate-700 my-2">

                            <div
                                class="bg-indigo-50 dark:bg-indigo-500/10 p-5 rounded-2xl border border-indigo-100 dark:border-indigo-500/20">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <h4 class="font-bold text-slate-800 dark:text-white text-sm">Target Spesifik</h4>
                                        <p class="text-xs text-slate-500 dark:text-slate-400">Batasi penggunaan voucher
                                            untuk akun tertentu.</p>
                                    </div>

                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="link_account" value="1" class="sr-only peer" {{ old('link_account', $voucher->account_id ? 1 : 0) ? 'checked' : '' }}>
                                        <div
                                            class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600">
                                        </div>
                                        <span class="ml-3 text-sm font-medium text-slate-700 dark:text-slate-300">Tautkan
                                            Akun</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-2">
                                        Pilih Akun Pelanggan
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="ph-bold ph-user text-slate-400 text-lg"></i>
                                        </div>
                                        <select name="account_id" id="account_id" {{ old('link_account', $voucher->account_id ? 1 : 0) ? '' : 'disabled' }}
                                            class="w-full pl-11 pr-10 py-3 rounded-xl bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition appearance-none cursor-pointer">
                                            <option value="">Pilih pelanggan (opsional)</option>
                                            @foreach($customers as $cust)
                                                <option value="{{ $cust->id }}" {{ old('account_id', $voucher->account_id) == $cust->id ? 'selected' : '' }}>{{ $cust->name }} {{ $cust->email ? '('.$cust->email.')' : '' }}</option>
                                            @endforeach
                                        </select>
                                        @error('account_id')
                                            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                                        @enderror
                                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                            <i class="ph-bold ph-caret-down text-slate-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4">
                                <button type="submit"
                                    class="w-full py-4 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-base shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 transition duration-300 flex items-center justify-center gap-2">
                                    <i class="ph-bold ph-check-circle text-xl"></i>
                                    Simpan Perubahan
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function(){
                    const linkCheckbox = document.querySelector('input[name="link_account"]');
                    const accountSelect = document.getElementById('account_id');
                    const nameInput = document.querySelector('input[name="coupon_name"]');
                    const valueInput = document.querySelector('input[name="coupon_value"]');
                    const dateInput = document.querySelector('input[name="valid_until"]');

                    const previewValue = document.getElementById('preview-value');
                    const previewCode = document.getElementById('preview-code');
                    const previewUntil = document.getElementById('preview-until');
                    const previewAccountRow = document.getElementById('preview-account-row');
                    const previewAccount = document.getElementById('preview-account');

                    function toggleAccount(){
                        if(!linkCheckbox || !accountSelect) return;
                        accountSelect.disabled = !linkCheckbox.checked;
                        if(!linkCheckbox.checked){
                            accountSelect.classList.add('opacity-50');
                            previewAccountRow.style.display = 'none';
                        } else {
                            accountSelect.classList.remove('opacity-50');
                            previewAccountRow.style.display = accountSelect.value ? 'flex' : 'none';
                        }
                    }

                    function formatNumber(num){
                        num = Number(num) || 0;
                        return new Intl.NumberFormat('id-ID', { maximumFractionDigits: 0 }).format(num);
                    }

                    function generateCodeFromName(name){
                        let base = (name || '').toUpperCase().trim().replace(/[^A-Z0-9]+/g,'_').replace(/^_|_$/g,'');
                        if(!base) base = Math.random().toString(36).slice(2,8).toUpperCase();
                        if(base.length > 20) base = base.slice(0,20);
                        return base;
                    }

                    function formatDateLocal(val){
                        if(!val) return '--/--/----';
                        const d = new Date(val + 'T00:00:00');
                        if(Number.isNaN(d.getTime())) return '--/--/----';
                        return d.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
                    }

                    function updatePreview(){
                        previewValue.textContent = formatNumber(valueInput.value);
                        previewCode.textContent = generateCodeFromName(nameInput.value);
                        previewUntil.textContent = formatDateLocal(dateInput.value);

                        if(linkCheckbox.checked && accountSelect.value){
                            previewAccount.textContent = accountSelect.options[accountSelect.selectedIndex].text;
                            previewAccountRow.style.display = 'flex';
                        } else {
                            previewAccountRow.style.display = 'none';
                        }
                    }

                    // initial setup
                    toggleAccount();
                    updatePreview();

                    // listeners
                    if(linkCheckbox) linkCheckbox.addEventListener('change', () => { toggleAccount(); updatePreview(); });
                    if(accountSelect) accountSelect.addEventListener('change', updatePreview);
                    if(nameInput) nameInput.addEventListener('input', updatePreview);
                    if(valueInput) valueInput.addEventListener('input', updatePreview);
                    if(dateInput) dateInput.addEventListener('change', updatePreview);
                });
            </script>

            <div class="lg:col-span-1">
                <div class="sticky top-6">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-4">
                        Preview Voucher
                    </h3>

                    <div
                        class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-3xl p-6 text-white shadow-xl relative overflow-hidden group hover:scale-105 transition duration-500">
                        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white/10 blur-2xl"></div>
                        <div class="absolute bottom-0 left-0 -ml-8 -mb-8 w-32 h-32 rounded-full bg-white/10 blur-2xl"></div>

                        <div class="relative z-10 flex flex-col h-full justify-between min-h-[220px]">
                            <div>
                                <div class="flex justify-between items-start">
                                    <span
                                        class="bg-white/20 backdrop-blur-md px-3 py-1 rounded-lg text-xs font-bold border border-white/10">
                                        Voucher
                                    </span>
                                    <i class="ph-fill ph-ticket text-3xl opacity-80"></i>
                                </div>
                                <h2 class="mt-4 text-3xl font-display font-bold tracking-tight">
                                    Rp <span id="preview-value">0</span>
                                </h2>
                                <p class="text-indigo-100 text-sm mt-1">Potongan Harga</p>
                            </div>

                            <div class="pt-6 mt-6 border-t border-white/20 border-dashed relative">
                                <div class="absolute -left-9 -top-3 w-6 h-6 rounded-full bg-[#f8fafc] dark:bg-[#1e293b]">
                                </div>
                                <div class="absolute -right-9 -top-3 w-6 h-6 rounded-full bg-[#f8fafc] dark:bg-[#1e293b]">
                                </div>

                                <div class="space-y-1">
                                    <p class="text-xs text-indigo-200 font-medium uppercase tracking-wider">Kode Voucher</p>
                                    <p class="text-xl font-mono font-bold tracking-wide" id="preview-code">KODE...</p>
                                </div>
                                <div class="mt-3 flex items-center gap-2 text-xs text-indigo-100">
                                    <i class="ph-fill ph-clock"></i>
                                    <span>Berlaku hingga: <span class="font-bold" id="preview-until">--/--/----</span></span>
                                </div>

                                <div class="mt-2 text-xs text-indigo-100 flex items-center gap-2" id="preview-account-row" style="display:none;">
                                    <i class="ph-fill ph-user"></i>
                                    <span id="preview-account" class="font-medium">Tidak terkait</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="mt-6 bg-slate-50 dark:bg-slate-700/30 p-5 rounded-2xl border border-slate-100 dark:border-slate-700/50">
                        <h4 class="font-bold text-slate-800 dark:text-white text-sm mb-2 flex items-center gap-2">
                            <i class="ph-fill ph-info text-indigo-500"></i> Catatan
                        </h4>
                        <ul class="text-xs text-slate-500 dark:text-slate-400 space-y-2 list-disc list-inside">
                            <li>Voucher akan otomatis aktif setelah dibuat.</li>
                            <li>Jika ditautkan ke akun, voucher tidak bisa dipakai user lain.</li>
                            <li>Pastikan tanggal berlaku minimal H+1 dari hari ini.</li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
