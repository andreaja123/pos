@extends('layouts.admin')

@section('title', 'Laporan Akun Pelanggan - Hanania POS')

@section('content')
    <section id="customer-report" class="page-section active max-w-7xl mx-auto pb-10">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Laporan Akun Pelanggan
                </h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Kelola, filter, dan export data pelanggan member & reguler.
                </p>
            </div>
            <div class="flex gap-3">
                <button
                    class="px-5 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 rounded-xl font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition flex items-center gap-2 shadow-sm">
                    <i class="ph-bold ph-printer text-lg"></i>
                    <span>Print</span>
                </button>
                <button
                    class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-indigo-700 transition flex items-center gap-2 shadow-lg shadow-indigo-200/50 dark:shadow-none">
                    <i class="ph-bold ph-file-xls text-lg"></i>
                    <span>Export Excel</span>
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none mb-8">
            <div class="flex items-center gap-2 mb-6">
                <div
                    class="w-8 h-8 rounded-full bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 flex items-center justify-center">
                    <i class="ph-fill ph-faders text-lg"></i>
                </div>
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">Filter Laporan</h3>
            </div>

            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Nama Pelanggan
                        </label>
                        <div class="relative">
                            <input type="text" placeholder="Cari nama atau ID..."
                                class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                            <i class="ph-bold ph-magnifying-glass absolute left-3.5 top-3.5 text-slate-400 text-lg"></i>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Tipe Akun
                        </label>
                        <div class="relative">
                            <select
                                class="w-full pl-10 pr-8 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition appearance-none cursor-pointer">
                                <option value="">Semua Tipe</option>
                                <option value="member">Member VIP</option>
                                <option value="regular">Regular</option>
                                <option value="wholesale">Grosir</option>
                            </select>
                            <i class="ph-bold ph-tag absolute left-3.5 top-3.5 text-slate-400 text-lg"></i>
                            <i
                                class="ph-bold ph-caret-down absolute right-3.5 top-3.5 text-slate-400 text-sm pointer-events-none"></i>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Dari Tanggal
                        </label>
                        <div class="relative">
                            <input type="date"
                                class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                            <i class="ph-bold ph-calendar-blank absolute left-3.5 top-3.5 text-slate-400 text-lg"></i>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Sampai Tanggal
                        </label>
                        <div class="relative">
                            <input type="date"
                                class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                            <i class="ph-bold ph-calendar-check absolute left-3.5 top-3.5 text-slate-400 text-lg"></i>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="button"
                        class="px-6 py-2.5 bg-slate-800 dark:bg-indigo-600 text-white rounded-xl font-bold text-sm hover:bg-slate-700 dark:hover:bg-indigo-700 transition shadow-lg shadow-slate-200/50 dark:shadow-none">
                        Tampilkan Laporan
                    </button>
                </div>
            </form>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/20 grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Total Pelanggan</p>
                    <h4 class="text-xl font-bold text-slate-800 dark:text-white">1,284</h4>
                </div>
                <div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Member Baru (Bulan ini)</p>
                    <h4 class="text-xl font-bold text-emerald-600 dark:text-emerald-400">+45</h4>
                </div>
                <div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Total Transaksi</p>
                    <h4 class="text-xl font-bold text-indigo-600 dark:text-indigo-400">Rp 450 Jt</h4>
                </div>
                <div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Rata-rata Belanja</p>
                    <h4 class="text-xl font-bold text-slate-800 dark:text-white">Rp 350rb</h4>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                        <tr>
                            <th class="px-6 py-4 font-bold">Pelanggan</th>
                            <th class="px-6 py-4 font-bold">Tipe Akun</th>
                            <th class="px-6 py-4 font-bold">Kontak</th>
                            <th class="px-6 py-4 font-bold">Terdaftar Sejak</th>
                            <th class="px-6 py-4 font-bold">Total Belanja</th>
                            <th class="px-6 py-4 font-bold">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-9 h-9 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300 flex items-center justify-center font-bold text-xs">
                                        JD
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-slate-200">Jhon Doe</p>
                                        <p class="text-xs text-slate-400">ID: #CUS-001</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-purple-100 dark:bg-purple-500/20 text-purple-700 dark:text-purple-300 rounded-lg text-xs font-bold border border-purple-200 dark:border-purple-500/30">
                                    Member VIP
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-500 dark:text-slate-400">
                                0812-3456-7890
                            </td>
                            <td class="px-6 py-4">
                                12 Jan 2024
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                Rp 15.450.000
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="flex items-center gap-1.5 text-emerald-600 dark:text-emerald-400 text-xs font-bold">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button
                                    class="p-2 hover:bg-slate-100 dark:hover:bg-slate-600 rounded-lg text-slate-400 hover:text-primary dark:hover:text-primary transition">
                                    <i class="ph-bold ph-eye text-lg"></i>
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-9 h-9 rounded-full bg-orange-100 dark:bg-orange-900/50 text-orange-600 dark:text-orange-300 flex items-center justify-center font-bold text-xs">
                                        SA
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-slate-200">Siti Aminah</p>
                                        <p class="text-xs text-slate-400">ID: #CUS-042</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-slate-100 dark:bg-slate-600/30 text-slate-600 dark:text-slate-300 rounded-lg text-xs font-bold border border-slate-200 dark:border-slate-600">
                                    Regular
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-500 dark:text-slate-400">
                                0857-9988-7766
                            </td>
                            <td class="px-6 py-4">
                                05 Feb 2024
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                Rp 850.000
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="flex items-center gap-1.5 text-emerald-600 dark:text-emerald-400 text-xs font-bold">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button
                                    class="p-2 hover:bg-slate-100 dark:hover:bg-slate-600 rounded-lg text-slate-400 hover:text-primary dark:hover:text-primary transition">
                                    <i class="ph-bold ph-eye text-lg"></i>
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-9 h-9 rounded-full bg-pink-100 dark:bg-pink-900/50 text-pink-600 dark:text-pink-300 flex items-center justify-center font-bold text-xs">
                                        BP
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-slate-200">Budi Pratama</p>
                                        <p class="text-xs text-slate-400">ID: #CUS-089</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-blue-100 dark:bg-blue-500/20 text-blue-700 dark:text-blue-300 rounded-lg text-xs font-bold border border-blue-200 dark:border-blue-500/30">
                                    Grosir
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-500 dark:text-slate-400">
                                0811-2233-4455
                            </td>
                            <td class="px-6 py-4">
                                20 Mar 2024
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                Rp 45.200.000
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="flex items-center gap-1.5 text-slate-400 dark:text-slate-500 text-xs font-bold">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                    Non-Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button
                                    class="p-2 hover:bg-slate-100 dark:hover:bg-slate-600 rounded-lg text-slate-400 hover:text-primary dark:hover:text-primary transition">
                                    <i class="ph-bold ph-eye text-lg"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div
                class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">1-10</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">1,284</span> data
                </p>
                <div class="flex gap-2">
                    <button
                        class="px-4 py-2 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-bold text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 disabled:opacity-50">
                        Previous
                    </button>
                    <button
                        class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200/50 dark:shadow-none">
                        1
                    </button>
                    <button
                        class="px-4 py-2 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-bold text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700">
                        2
                    </button>
                    <button
                        class="px-4 py-2 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-bold text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
