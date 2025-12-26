@extends('layouts.admin')

@section('title', 'Buat Catatan Kredit - Hanania POS')

@section('content')
    <section class="page-section active max-w-7xl mx-auto">
        <div class="flex items-center gap-4 mb-8">
            <a href="#"
                class="w-10 h-10 bg-white dark:bg-darkCard rounded-xl border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-600 hover:bg-slate-50 transition shadow-sm">
                <i class="ph-bold ph-arrow-left"></i>
            </a>
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Buat Catatan Kredit</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">Isi formulir berikut untuk membuat nota kredit baru</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-3 space-y-6">

                <div
                    class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                    <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-5 flex items-center gap-2">
                        <i class="ph-fill ph-user-circle text-indigo-500"></i> Informasi Nota
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="space-y-4">
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5 uppercase">Pelanggan</label>
                                <div class="relative">
                                    <input type="text" placeholder="Cari Pelanggan..."
                                        class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white transition">
                                    <i
                                        class="ph-bold ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                </div>
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5 uppercase">Gudang</label>
                                <select
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white transition cursor-pointer appearance-none">
                                    <option>Gudang Utama (Semarang)</option>
                                    <option>Gudang Cabang</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label
                                    class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5 uppercase">Referensi
                                    (No. Nota)</label>
                                <input type="text" placeholder="#REF-2025-XXX"
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white transition">
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5 uppercase">Tgl
                                    Pemesanan</label>
                                <input type="date"
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-600 dark:text-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5 uppercase">Jatuh
                                    Tempo</label>
                                <input type="date"
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm text-slate-600 dark:text-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                    <div class="flex justify-between items-center mb-5">
                        <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white flex items-center gap-2">
                            <i class="ph-fill ph-package text-indigo-500"></i> Item Pesanan
                        </h3>
                    </div>

                    <div class="overflow-x-auto mb-4 border border-slate-100 dark:border-slate-700 rounded-2xl">
                        <table class="w-full text-left text-sm min-w-[900px]">
                            <thead class="bg-slate-50 dark:bg-slate-800 text-slate-500 font-bold text-xs uppercase">
                                <tr>
                                    <th class="px-4 py-3 min-w-[200px]">Nama Barang</th>
                                    <th class="px-4 py-3 w-24">Qty</th>
                                    <th class="px-4 py-3 w-24">Satuan</th>
                                    <th class="px-4 py-3 w-32">Harga (Rp)</th>
                                    <th class="px-4 py-3 w-20">Pajak %</th>
                                    <th class="px-4 py-3 w-28">Total Pajak</th>
                                    <th class="px-4 py-3 w-28">Diskon</th>
                                    <th class="px-4 py-3 w-32">Subtotal</th>
                                    <th class="px-4 py-3 w-10 text-center"><i class="ph-bold ph-trash"></i></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-700 bg-white dark:bg-darkCard">
                                <tr>
                                    <td class="p-3">
                                        <input type="text" placeholder="Cari produk..."
                                            class="w-full px-3 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    </td>
                                    <td class="p-3">
                                        <input type="number" value="1"
                                            class="w-full px-3 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm text-center focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    </td>
                                    <td class="p-3">
                                        <input type="text" value="Pcs" readonly
                                            class="w-full px-3 py-2 bg-slate-100 dark:bg-slate-900 border-none rounded-lg text-sm text-center text-slate-500">
                                    </td>
                                    <td class="p-3">
                                        <input type="number" placeholder="0"
                                            class="w-full px-3 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm text-right focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    </td>
                                    <td class="p-3">
                                        <input type="number" value="11"
                                            class="w-full px-3 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm text-center focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    </td>
                                    <td class="p-3">
                                        <input type="text" readonly value="0"
                                            class="w-full px-3 py-2 bg-slate-100 dark:bg-slate-900 border-none rounded-lg text-sm text-right text-slate-500">
                                    </td>
                                    <td class="p-3">
                                        <input type="number" placeholder="0"
                                            class="w-full px-3 py-2 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm text-right focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    </td>
                                    <td class="p-3">
                                        <input type="text" readonly value="0"
                                            class="w-full px-3 py-2 bg-slate-100 dark:bg-slate-900 border-none rounded-lg text-sm text-right font-bold text-slate-700">
                                    </td>
                                    <td class="p-3 text-center">
                                        <button class="text-red-400 hover:text-red-600 transition"><i
                                                class="ph-fill ph-x-circle text-xl"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <button
                        class="w-full py-3 border-2 border-dashed border-slate-300 dark:border-slate-600 rounded-2xl text-slate-500 hover:border-indigo-500 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition font-bold text-sm flex items-center justify-center gap-2">
                        <i class="ph-bold ph-plus"></i> Tambah Baris
                    </button>
                </div>

                <div
                    class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
                    <div class="flex flex-col md:flex-row gap-8 justify-end">

                        <div class="flex-1">
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-2 uppercase">Catatan
                                Pesanan</label>
                            <textarea rows="4"
                                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                                placeholder="Tambahkan catatan..."></textarea>
                        </div>

                        <div class="w-full md:w-96 space-y-3">
                            <div class="flex justify-between items-center text-sm text-slate-600 dark:text-slate-400">
                                <span>Total Pajak</span>
                                <span class="font-mono font-bold">Rp 0</span>
                            </div>
                            <div class="flex justify-between items-center text-sm text-slate-600 dark:text-slate-400">
                                <span>Total Diskon</span>
                                <span class="font-mono font-bold text-red-500">- Rp 0</span>
                            </div>

                            <div
                                class="flex justify-between items-center text-sm text-slate-600 dark:text-slate-400 py-2 border-t border-dashed border-slate-200 dark:border-slate-700">
                                <span class="font-bold">Biaya Kirim</span>
                                <div class="w-32">
                                    <input type="number" placeholder="0"
                                        class="w-full px-3 py-1.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm text-right focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>
                            </div>

                            <div
                                class="flex justify-between items-center py-4 border-t border-slate-200 dark:border-slate-700">
                                <span class="text-lg font-bold text-slate-800 dark:text-white">Total Keseluruhan</span>
                                <span class="text-2xl font-display font-bold text-indigo-600 dark:text-indigo-400">Rp
                                    0</span>
                            </div>

                            <button type="submit"
                                class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-bold text-lg shadow-lg shadow-indigo-200 dark:shadow-none transition flex items-center justify-center gap-2">
                                <i class="ph-bold ph-check-circle"></i>
                                Hasilkan Pesanan
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
