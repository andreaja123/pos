@extends('layouts.admin')

@section('title', 'Kelola Akun - Hanania POS')

@section('content')
    <section id="manage-accounts" class="page-section active max-w-7xl mx-auto">

        <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Kelola Akun</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm">Monitor aset keuangan dan daftar rekening.</p>
            </div>
            <div class="flex items-center gap-2 text-sm text-slate-500">
                <span>Dashboard</span>
                <i class="ph-bold ph-caret-right text-xs"></i>
                <span class="text-indigo-600 font-bold">Akun</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300 relative overflow-hidden">
                <div class="relative z-10 flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">
                            Total Keseimbangan
                        </p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                            Rp 145.250.000
                        </h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-emerald-50 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-wallet text-2xl"></i>
                    </div>
                </div>
                <div class="relative z-10">
                    <p class="text-slate-500 text-xs font-bold flex items-center gap-1">
                        <span
                            class="bg-slate-100 dark:bg-slate-700 px-2 py-1 rounded-lg text-slate-600 dark:text-slate-300">
                            Semua Aset
                        </span>
                    </p>
                </div>
                <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-emerald-500/5 rounded-full blur-2xl"></div>
            </div>

            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300 relative overflow-hidden">
                <div class="relative z-10 flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">
                            Jumlah Akun Terdaftar
                        </p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                            8 <span class="text-lg font-normal text-slate-400">Akun</span>
                        </h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-blue-50 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-bank text-2xl"></i>
                    </div>
                </div>
                <div class="relative z-10 flex gap-3">
                    <p class="text-slate-500 text-xs font-bold flex items-center gap-1">
                        <span class="bg-blue-50 dark:bg-blue-500/10 px-2 py-1 rounded text-blue-600 dark:text-blue-400">
                            3 Bank
                        </span>
                    </p>
                    <p class="text-slate-500 text-xs font-bold flex items-center gap-1">
                        <span
                            class="bg-orange-50 dark:bg-orange-500/10 px-2 py-1 rounded text-orange-600 dark:text-orange-400">
                            2 E-Wallet
                        </span>
                    </p>
                    <p class="text-slate-500 text-xs font-bold flex items-center gap-1">
                        <span
                            class="bg-slate-100 dark:bg-slate-700/50 px-2 py-1 rounded text-slate-600 dark:text-slate-400">
                            3 Kas
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">

            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col lg:flex-row justify-between items-center gap-4">

                <div class="relative w-full lg:w-96 group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i
                            class="ph-bold ph-magnifying-glass text-slate-400 group-focus-within:text-indigo-500 transition"></i>
                    </div>
                    <input type="text"
                        class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 dark:border-slate-600 rounded-xl leading-5 bg-slate-50 dark:bg-slate-700/50 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition sm:text-sm"
                        placeholder="Cari nama akun atau no rekening...">
                </div>

                <div class="flex items-center gap-3 w-full lg:w-auto">
                    <button
                        class="flex-1 lg:flex-none flex items-center justify-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 text-sm font-bold rounded-xl hover:bg-slate-50 dark:hover:bg-slate-600 hover:border-slate-300 transition group">
                        <i
                            class="ph-bold ph-microsoft-excel-logo text-emerald-600 text-lg group-hover:scale-110 transition"></i>
                        Export Excel
                    </button>
                    <button
                        class="flex-1 lg:flex-none flex items-center justify-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl shadow-lg shadow-indigo-200/50 dark:shadow-none transition hover:-translate-y-0.5">
                        <i class="ph-bold ph-plus text-lg"></i>
                        Tambah Akun
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">Informasi Akun</th>
                            <th class="px-6 py-4 font-bold">Tipe</th>
                            <th class="px-6 py-4 font-bold">Keseimbangan</th>
                            <th class="px-6 py-4 font-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono">1</td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800 dark:text-white text-base">BCA Utama</span>
                                    <span class="font-mono text-xs text-slate-400">8293-1239-4455</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 rounded-lg text-xs font-bold border border-blue-100 dark:border-blue-500/20">
                                    Bank Transfer
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-slate-800 dark:text-white">Rp 85.000.000</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 rounded-lg transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-500/20 rounded-lg transition"
                                        title="Edit">
                                        <i class="ph-bold ph-pencil-simple text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-500/20 rounded-lg transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono">2</td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800 dark:text-white text-base">Kas Besar Toko</span>
                                    <span class="font-mono text-xs text-slate-400">CASH-001</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 rounded-lg text-xs font-bold border border-emerald-100 dark:border-emerald-500/20">
                                    Tunai / Cash
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-slate-800 dark:text-white">Rp 12.450.000</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 rounded-lg transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-500/20 rounded-lg transition"
                                        title="Edit">
                                        <i class="ph-bold ph-pencil-simple text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-500/20 rounded-lg transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono">3</td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800 dark:text-white text-base">Mandiri
                                        Operasional</span>
                                    <span class="font-mono text-xs text-slate-400">133-00-9821-221</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 rounded-lg text-xs font-bold border border-blue-100 dark:border-blue-500/20">
                                    Bank Transfer
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-slate-800 dark:text-white">Rp 45.000.000</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 rounded-lg transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-500/20 rounded-lg transition"
                                        title="Edit">
                                        <i class="ph-bold ph-pencil-simple text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-500/20 rounded-lg transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono">4</td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800 dark:text-white text-base">GoPay Merchant</span>
                                    <span class="font-mono text-xs text-slate-400">0812-3456-7890</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-orange-50 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 rounded-lg text-xs font-bold border border-orange-100 dark:border-orange-500/20">
                                    E-Wallet
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-slate-800 dark:text-white">Rp 2.800.000</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 rounded-lg transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-500/20 rounded-lg transition"
                                        title="Edit">
                                        <i class="ph-bold ph-pencil-simple text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-500/20 rounded-lg transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div
                class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">1</span> sampai <span
                        class="font-bold text-slate-800 dark:text-white">4</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">8</span> akun
                </p>
                <div class="flex items-center gap-2">
                    <button
                        class="px-4 py-2 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition text-sm font-bold disabled:opacity-50"
                        disabled>
                        Sebelumnya
                    </button>
                    <div class="hidden sm:flex gap-1">
                        <button
                            class="w-10 h-10 rounded-xl bg-indigo-600 text-white font-bold text-sm shadow-lg shadow-indigo-200/50 dark:shadow-none">1</button>
                        <button
                            class="w-10 h-10 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-400 font-bold text-sm transition">2</button>
                    </div>
                    <button
                        class="px-4 py-2 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition text-sm font-bold">
                        Selanjutnya
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
