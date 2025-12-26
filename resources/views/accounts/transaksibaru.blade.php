@extends('layouts.admin')

@section('title', 'Transaksi Baru - Hanania POS')

@section('content')
    <section id="new-transaction" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Transaksi Baru
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm">
                    Input data transaksi pemasukan atau pengeluaran baru.
                </p>
            </div>
            <a href="{{ url('/dashboard') }}"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition shadow-sm">
                <i class="ph-bold ph-arrow-left"></i>
                Kembali
            </a>
        </div>

        <form action="" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @csrf

            <div class="lg:col-span-2 space-y-6">

                <div
                    class="bg-white dark:bg-darkCard p-6 md:p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-6 flex items-center gap-2">
                        <i class="ph-duotone ph-identification-card text-indigo-500 text-xl"></i>
                        Identitas Kontak
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Jenis
                                Kontak</label>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="cursor-pointer">
                                    <input type="radio" name="contact_type" value="customer" class="peer sr-only" checked>
                                    <div
                                        class="flex items-center justify-center gap-2 p-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-slate-500 peer-checked:bg-indigo-50 peer-checked:border-indigo-500 peer-checked:text-indigo-600 dark:peer-checked:bg-indigo-500/20 dark:peer-checked:text-indigo-400 transition-all">
                                        <i class="ph-bold ph-user"></i>
                                        <span class="font-bold text-sm">Pelanggan</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="contact_type" value="supplier" class="peer sr-only">
                                    <div
                                        class="flex items-center justify-center gap-2 p-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-slate-500 peer-checked:bg-orange-50 peer-checked:border-orange-500 peer-checked:text-orange-600 dark:peer-checked:bg-orange-500/20 dark:peer-checked:text-orange-400 transition-all">
                                        <i class="ph-bold ph-truck"></i>
                                        <span class="font-bold text-sm">Supplier</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama / No.
                                HP</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <i class="ph-bold ph-magnifying-glass"></i>
                                </span>
                                <input type="text" placeholder="Cari nama atau input nomor HP..."
                                    class="w-full pl-11 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">C/o (Care
                                of)</label>
                            <input type="text" placeholder="Contoh: Titip ke Satpam / Dropship A"
                                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-darkCard p-6 md:p-8 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-6 flex items-center gap-2">
                        <i class="ph-duotone ph-receipt text-indigo-500 text-xl"></i>
                        Detail Pembayaran
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Tanggal</label>
                            <input type="date" value="{{ date('Y-m-d') }}"
                                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Akun
                                Keuangan</label>
                            <div class="relative">
                                <select
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                                    <option>Kas Tunai</option>
                                    <option>Bank BCA</option>
                                    <option>Bank Mandiri</option>
                                    <option>E-Wallet (Ovo/Gopay)</option>
                                </select>
                                <i
                                    class="ph-bold ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Tipe
                                Transaksi</label>
                            <div class="relative">
                                <select
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                                    <option value="income">Pemasukan (Income)</option>
                                    <option value="expense">Pengeluaran (Expense)</option>
                                </select>
                                <i
                                    class="ph-bold ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kategori</label>
                            <div class="relative">
                                <select
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                                    <option>Penjualan Produk</option>
                                    <option>Jasa Layanan</option>
                                    <option>Pembelian Stok</option>
                                    <option>Operasional</option>
                                </select>
                                <i
                                    class="ph-bold ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Metode
                                Pembayaran</label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                <label class="cursor-pointer text-center">
                                    <input type="radio" name="payment_method" value="cash" class="peer sr-only" checked>
                                    <div
                                        class="p-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 hover:bg-slate-100 peer-checked:bg-emerald-50 peer-checked:border-emerald-500 peer-checked:text-emerald-700 dark:peer-checked:bg-emerald-500/20 dark:peer-checked:text-emerald-400 transition-all">
                                        <i class="ph-bold ph-money text-xl mb-1 block"></i>
                                        <span class="text-xs font-bold">Tunai</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer text-center">
                                    <input type="radio" name="payment_method" value="transfer" class="peer sr-only">
                                    <div
                                        class="p-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 hover:bg-slate-100 peer-checked:bg-blue-50 peer-checked:border-blue-500 peer-checked:text-blue-700 dark:peer-checked:bg-blue-500/20 dark:peer-checked:text-blue-400 transition-all">
                                        <i class="ph-bold ph-bank text-xl mb-1 block"></i>
                                        <span class="text-xs font-bold">Transfer</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer text-center">
                                    <input type="radio" name="payment_method" value="qris" class="peer sr-only">
                                    <div
                                        class="p-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 hover:bg-slate-100 peer-checked:bg-purple-50 peer-checked:border-purple-500 peer-checked:text-purple-700 dark:peer-checked:bg-purple-500/20 dark:peer-checked:text-purple-400 transition-all">
                                        <i class="ph-bold ph-qr-code text-xl mb-1 block"></i>
                                        <span class="text-xs font-bold">QRIS</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer text-center">
                                    <input type="radio" name="payment_method" value="credit" class="peer sr-only">
                                    <div
                                        class="p-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 hover:bg-slate-100 peer-checked:bg-rose-50 peer-checked:border-rose-500 peer-checked:text-rose-700 dark:peer-checked:bg-rose-500/20 dark:peer-checked:text-rose-400 transition-all">
                                        <i class="ph-bold ph-credit-card text-xl mb-1 block"></i>
                                        <span class="text-xs font-bold">Kredit</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Catatan
                                (Opsional)</label>
                            <textarea rows="3" placeholder="Tambahkan detail atau keterangan tambahan..."
                                class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all resize-none"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-6 space-y-6">

                    <div
                        class="bg-indigo-600 dark:bg-indigo-600 rounded-3xl p-6 md:p-8 text-white shadow-xl shadow-indigo-200/50 dark:shadow-none relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                        <div class="absolute -left-4 -bottom-4 w-32 h-32 bg-indigo-900/20 rounded-full blur-2xl"></div>

                        <label class="block text-indigo-100 text-sm font-bold mb-2 relative z-10">Jumlah Bayar</label>
                        <div class="relative z-10">
                            <span
                                class="absolute left-0 top-1/2 -translate-y-1/2 text-indigo-200 text-2xl font-bold">Rp</span>
                            <input type="number" placeholder="0"
                                class="w-full bg-transparent border-b-2 border-indigo-400/30 text-4xl font-display font-bold text-white placeholder-indigo-300/50 focus:outline-none focus:border-white pl-10 py-2">
                        </div>
                        <p class="mt-4 text-xs text-indigo-200 relative z-10">
                            *Pastikan nominal yang diinput sudah benar sebelum menyimpan.
                        </p>
                    </div>

                    <div
                        class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
                        <h4 class="font-bold text-slate-800 dark:text-white mb-4">Konfirmasi</h4>
                        <div class="space-y-3">
                            <button type="submit"
                                class="w-full py-3.5 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-lg shadow-indigo-200/50 dark:shadow-none transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                <i class="ph-bold ph-check-circle text-lg"></i>
                                Tambahkan Transaksi
                            </button>
                            <button type="button"
                                class="w-full py-3.5 px-6 bg-slate-50 dark:bg-slate-700/50 hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-600 rounded-xl font-bold transition-all">
                                Batal / Reset
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    </section>
@endsection
