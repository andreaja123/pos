@extends('layouts.admin')

@section('title', 'Laporan Akun - Hanania POS')

@section('content')
    <section id="laporan-akun" class="page-section active max-w-7xl mx-auto space-y-6">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Laporan Akun
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm">
                    Lihat riwayat mutasi dan saldo akun keuangan.
                </p>
            </div>
            <div class="flex gap-3">
                <button
                    class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition shadow-sm">
                    <i class="ph-bold ph-file-pdf text-red-500 text-lg"></i>
                    <span class="hidden sm:inline">PDF</span>
                </button>
                <button
                    class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 font-bold rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition shadow-sm">
                    <i class="ph-bold ph-file-xls text-green-600 text-lg"></i>
                    <span class="hidden sm:inline">Excel</span>
                </button>
                <button
                    class="flex items-center gap-2 px-4 py-2.5 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200/50 dark:shadow-none">
                    <i class="ph-bold ph-printer text-lg"></i>
                    <span>Cetak</span>
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none">
            <form class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-5 items-end">

                <div class="lg:col-span-3">
                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 uppercase tracking-wider">
                        Pilih Akun
                    </label>
                    <div class="relative">
                        <select
                            class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-slate-200 font-medium focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none cursor-pointer">
                            <option value="all">Semua Akun</option>
                            <option value="cash">Kas Tunai</option>
                            <option value="bank_bca">Bank BCA</option>
                            <option value="bank_mandiri">Bank Mandiri</option>
                        </select>
                        <i class="ph-fill ph-wallet absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                        <i class="ph-bold ph-caret-down absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 uppercase tracking-wider">
                        Tipe
                    </label>
                    <div class="relative">
                        <select
                            class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-slate-200 font-medium focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition appearance-none cursor-pointer">
                            <option value="all">Semua</option>
                            <option value="debit">Pemasukan (Debit)</option>
                            <option value="credit">Pengeluaran (Kredit)</option>
                        </select>
                        <i
                            class="ph-fill ph-arrows-left-right absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                        <i class="ph-bold ph-caret-down absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 uppercase tracking-wider">
                        Dari Tanggal
                    </label>
                    <div class="relative">
                        <input type="date"
                            class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-slate-200 font-medium focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            value="{{ date('Y-m-01') }}">
                        <i
                            class="ph-fill ph-calendar-blank absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 uppercase tracking-wider">
                        Sampai Tanggal
                    </label>
                    <div class="relative">
                        <input type="date"
                            class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-700 dark:text-slate-200 font-medium focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            value="{{ date('Y-m-d') }}">
                        <i
                            class="ph-fill ph-calendar-blank absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <button type="button"
                        class="w-full py-3 bg-slate-800 dark:bg-slate-600 text-white font-bold rounded-xl hover:bg-slate-700 dark:hover:bg-slate-500 transition flex items-center justify-center gap-2">
                        <i class="ph-bold ph-magnifying-glass"></i>
                        Tampilkan Laporan
                    </button>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div
                class="bg-white dark:bg-darkCard p-5 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center">
                    <i class="ph-fill ph-arrow-down-left text-2xl"></i>
                </div>
                <div>
                    <p class="text-slate-500 dark:text-slate-400 text-xs font-bold mb-0.5">Total Pemasukan</p>
                    <h3 class="text-xl font-display font-bold text-slate-800 dark:text-white">Rp 45.200.000</h3>
                </div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-5 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-red-50 dark:bg-red-500/20 text-red-600 dark:text-red-400 rounded-2xl flex items-center justify-center">
                    <i class="ph-fill ph-arrow-up-right text-2xl"></i>
                </div>
                <div>
                    <p class="text-slate-500 dark:text-slate-400 text-xs font-bold mb-0.5">Total Pengeluaran</p>
                    <h3 class="text-xl font-display font-bold text-slate-800 dark:text-white">Rp 12.500.000</h3>
                </div>
            </div>

            <div
                class="bg-indigo-600 dark:bg-indigo-900 p-5 rounded-3xl shadow-lg shadow-indigo-200/50 dark:shadow-none flex items-center gap-4 text-white">
                <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center">
                    <i class="ph-fill ph-equals text-2xl"></i>
                </div>
                <div>
                    <p class="text-indigo-100 text-xs font-bold mb-0.5">Saldo Periode Ini</p>
                    <h3 class="text-xl font-display font-bold">Rp 32.700.000</h3>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display border-b border-slate-100 dark:border-slate-700">
                        <tr>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Tanggal</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">No. Ref</th>
                            <th class="px-6 py-4 font-bold w-1/3">Keterangan</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Akun</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap text-right">Nominal</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap text-right">Saldo</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-slate-500">16 Des 2023 <br><span
                                    class="text-xs opacity-70">10:30 WIB</span></td>
                            <td class="px-6 py-4 font-mono text-indigo-600 dark:text-indigo-400 font-bold">#TRX-001</td>
                            <td class="px-6 py-4 font-medium text-slate-800 dark:text-slate-200">
                                Penjualan Harian POS
                                <span class="block text-xs font-normal text-slate-400 mt-0.5">Shift Pagi - Kasir A</span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded text-xs font-bold border border-slate-200 dark:border-slate-600">Kas
                                    Tunai</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-emerald-600 dark:text-emerald-400 font-bold">+ Rp 2.500.000</span>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-slate-800 dark:text-white">Rp 15.500.000</td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-slate-500">15 Des 2023 <br><span
                                    class="text-xs opacity-70">14:15 WIB</span></td>
                            <td class="px-6 py-4 font-mono text-indigo-600 dark:text-indigo-400 font-bold">#EXP-099</td>
                            <td class="px-6 py-4 font-medium text-slate-800 dark:text-slate-200">
                                Pembelian Stok Barang
                                <span class="block text-xs font-normal text-slate-400 mt-0.5">Vendor: PT Maju Jaya</span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 rounded text-xs font-bold border border-blue-100 dark:border-blue-800">Bank
                                    BCA</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-red-500 dark:text-red-400 font-bold">- Rp 5.200.000</span>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-slate-800 dark:text-white">Rp 13.000.000</td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-slate-500">14 Des 2023 <br><span
                                    class="text-xs opacity-70">09:00 WIB</span></td>
                            <td class="px-6 py-4 font-mono text-indigo-600 dark:text-indigo-400 font-bold">#TRX-002</td>
                            <td class="px-6 py-4 font-medium text-slate-800 dark:text-slate-200">
                                Setoran Modal Awal
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-yellow-50 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 rounded text-xs font-bold border border-yellow-100 dark:border-yellow-800">Bank
                                    Mandiri</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-emerald-600 dark:text-emerald-400 font-bold">+ Rp 10.000.000</span>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-slate-800 dark:text-white">Rp 18.200.000</td>
                        </tr>
                    </tbody>
                    <tfoot class="bg-slate-50 dark:bg-slate-700/50 border-t border-slate-200 dark:border-slate-600">
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-right font-bold text-slate-500 dark:text-slate-400">
                                Total Mutasi Halaman Ini</td>
                            <td class="px-6 py-4 text-right font-bold text-indigo-600 dark:text-indigo-400">Rp 7.300.000
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="p-4 border-t border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <span class="text-xs text-slate-500">Menampilkan 1-3 dari 45 data</span>
                <div class="flex gap-2">
                    <button
                        class="w-8 h-8 rounded-lg flex items-center justify-center border border-slate-200 dark:border-slate-600 hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-500 transition"><i
                            class="ph-bold ph-caret-left"></i></button>
                    <button
                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-indigo-600 text-white font-bold text-xs shadow-md shadow-indigo-200/50 dark:shadow-none">1</button>
                    <button
                        class="w-8 h-8 rounded-lg flex items-center justify-center border border-slate-200 dark:border-slate-600 hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-500 transition">2</button>
                    <button
                        class="w-8 h-8 rounded-lg flex items-center justify-center border border-slate-200 dark:border-slate-600 hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-500 transition"><i
                            class="ph-bold ph-caret-right"></i></button>
                </div>
            </div>
        </div>

    </section>
@endsection
