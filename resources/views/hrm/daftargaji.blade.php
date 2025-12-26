@extends('layouts.admin')

@section('title', 'Daftar Gaji - Hanania POS')

@section('content')
    <section id="salary-list" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Daftar Gaji
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Kelola data penggajian dan riwayat transaksi karyawan
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <button
                    class="px-4 py-2.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-500/20 text-sm font-bold rounded-xl hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition flex items-center justify-center gap-2">
                    <i class="ph-fill ph-file-xls text-lg"></i>
                    <span>Excel</span>
                </button>

                <button
                    class="px-4 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-200 dark:shadow-none transition flex items-center justify-center gap-2">
                    <i class="ph-bold ph-plus"></i>
                    <span>Tambah Departemen</span>
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">

            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="relative w-full md:w-72">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="ph-bold ph-magnifying-glass text-slate-400"></i>
                    </span>
                    <input type="text"
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 dark:text-white placeholder-slate-400 transition"
                        placeholder="Cari karyawan atau akun...">
                </div>

                <div class="flex items-center gap-2 w-full md:w-auto">
                    <select
                        class="w-full md:w-auto px-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm text-slate-600 dark:text-slate-300 focus:outline-none cursor-pointer">
                        <option>Bulan Ini</option>
                        <option>Bulan Lalu</option>
                        <option>Tahun Ini</option>
                    </select>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Tanggal</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Karyawan</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Account</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Debet</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Kredit</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap">Metode</th>
                            <th class="px-6 py-4 font-bold whitespace-nowrap text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400 whitespace-nowrap">
                                16 Des 2025
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=random"
                                        class="w-8 h-8 rounded-full object-cover">
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-slate-200">Budi Santoso</p>
                                        <p class="text-xs text-slate-400">Staff Gudang</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-xs font-bold border border-slate-200 dark:border-slate-600">
                                    Gaji Pokok
                                </span>
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white whitespace-nowrap">
                                Rp 4.500.000
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-400 whitespace-nowrap">
                                -
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 rounded-full text-xs font-bold border border-blue-100 dark:border-blue-500/20">
                                    Transfer
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button
                                        class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 transition"
                                        title="Edit">
                                        <i class="ph-bold ph-pencil-simple"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/20 transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400 whitespace-nowrap">
                                16 Des 2025
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Siti+Aminah&background=random"
                                        class="w-8 h-8 rounded-full object-cover">
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-slate-200">Siti Aminah</p>
                                        <p class="text-xs text-slate-400">Kasir</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-xs font-bold border border-slate-200 dark:border-slate-600">
                                    Bonus Target
                                </span>
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white whitespace-nowrap">
                                Rp 500.000
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-400 whitespace-nowrap">
                                -
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 rounded-full text-xs font-bold border border-amber-100 dark:border-amber-500/20">
                                    Tunai
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button
                                        class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 transition">
                                        <i class="ph-bold ph-pencil-simple"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/20 transition">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400 whitespace-nowrap">
                                15 Des 2025
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Rina+Melati&background=random"
                                        class="w-8 h-8 rounded-full object-cover">
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-slate-200">Rina Melati</p>
                                        <p class="text-xs text-slate-400">Sales</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-xs font-bold border border-slate-200 dark:border-slate-600">
                                    Kasbon
                                </span>
                            </td>
                            <td class="px-6 py-4 font-mono text-slate-400 whitespace-nowrap">
                                -
                            </td>
                            <td class="px-6 py-4 font-bold text-red-500 whitespace-nowrap">
                                Rp 200.000
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 rounded-full text-xs font-bold border border-amber-100 dark:border-amber-500/20">
                                    Tunai
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button
                                        class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 transition">
                                        <i class="ph-bold ph-pencil-simple"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/20 transition">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div
                class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">1-10</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">45</span> data
                </p>

                <div class="flex items-center gap-2">
                    <button
                        class="w-10 h-10 rounded-xl border border-slate-200 dark:border-slate-600 flex items-center justify-center text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition disabled:opacity-50">
                        <i class="ph-bold ph-caret-left"></i>
                    </button>
                    <button
                        class="w-10 h-10 rounded-xl bg-indigo-600 text-white font-bold flex items-center justify-center shadow-lg shadow-indigo-200 dark:shadow-none transition">
                        1
                    </button>
                    <button
                        class="w-10 h-10 rounded-xl border border-slate-200 dark:border-slate-600 flex items-center justify-center text-slate-600 dark:text-slate-300 font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        2
                    </button>
                    <button
                        class="w-10 h-10 rounded-xl border border-slate-200 dark:border-slate-600 flex items-center justify-center text-slate-600 dark:text-slate-300 font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        3
                    </button>
                    <button
                        class="w-10 h-10 rounded-xl border border-slate-200 dark:border-slate-600 flex items-center justify-center text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        <i class="ph-bold ph-caret-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
