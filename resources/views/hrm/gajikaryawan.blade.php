@extends('layouts.admin')

@section('title', 'Gaji Karyawan - Hanania POS')

@section('content')
    <section id="employee-salary" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Kelola Gaji Karyawan
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                    Atur penggajian, bonus, dan status pembayaran tim.
                </p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition font-bold text-sm shadow-sm">
                    <i class="ph-bold ph-microsoft-excel-logo text-green-600 text-lg"></i>
                    Export Excel
                </button>

                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl transition font-bold text-sm shadow-lg shadow-indigo-200/50 dark:shadow-none">
                    <i class="ph-bold ph-plus text-lg"></i>
                    Tambah Data
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none overflow-hidden">

            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="relative w-full sm:w-72">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="ph-bold ph-magnifying-glass text-slate-400 text-lg"></i>
                    </div>
                    <input type="text"
                        class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 dark:border-slate-600 rounded-xl leading-5 bg-slate-50 dark:bg-slate-700/50 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition sm:text-sm"
                        placeholder="Cari nama atau role...">
                </div>

                <div class="flex items-center gap-2">
                    <span
                        class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Filter:</span>
                    <select
                        class="px-3 py-2 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-lg text-sm text-slate-600 dark:text-slate-300 focus:outline-none focus:border-indigo-500 cursor-pointer">
                        <option value="">Semua Status</option>
                        <option value="paid">Lunas</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display uppercase tracking-wider text-xs">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">Nama Karyawan</th>
                            <th class="px-6 py-4 font-bold">Role / Jabatan</th>
                            <th class="px-6 py-4 font-bold">Total Gaji</th>
                            <th class="px-6 py-4 font-bold">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono text-slate-500">01</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300 flex items-center justify-center font-bold text-sm">
                                        SS
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-white">Siti Sarah</p>
                                        <p class="text-xs text-slate-500">siti.sarah@email.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-700 dark:text-slate-300">
                                Kasir Utama
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white font-mono">
                                Rp 3.200.000
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Dibayarkan
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 rounded-lg transition"
                                        title="Lihat Detail">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-500/20 rounded-lg transition"
                                        title="Nonaktifkan">
                                        <i class="ph-bold ph-prohibit text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/20 rounded-lg transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono text-slate-500">02</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-orange-100 dark:bg-orange-900/50 text-orange-600 dark:text-orange-300 flex items-center justify-center font-bold text-sm">
                                        BP
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-white">Budi Pratama</p>
                                        <p class="text-xs text-slate-500">budi.p@email.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-700 dark:text-slate-300">
                                Staff Gudang
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white font-mono">
                                Rp 2.800.000
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400 rounded-full text-xs font-bold border border-amber-200 dark:border-amber-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                    Pending
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 rounded-lg transition">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-500/20 rounded-lg transition">
                                        <i class="ph-bold ph-prohibit text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/20 rounded-lg transition">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 font-mono text-slate-500">03</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=100"
                                        class="w-10 h-10 rounded-full object-cover border border-slate-200 dark:border-slate-600">
                                    <div>
                                        <p class="font-bold text-slate-800 dark:text-white">Ahmad Rozak</p>
                                        <p class="text-xs text-slate-500">ahmad.r@email.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-700 dark:text-slate-300">
                                Supervisor
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white font-mono">
                                Rp 5.500.000
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Dibayarkan
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-500/20 rounded-lg transition">
                                        <i class="ph-bold ph-eye text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-500/20 rounded-lg transition">
                                        <i class="ph-bold ph-prohibit text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/20 rounded-lg transition">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div
                class="p-6 border-t border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">1-3</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">24</span> data
                </p>
                <div class="flex items-center gap-2">
                    <button
                        class="px-4 py-2 text-sm font-bold text-slate-400 bg-slate-100 dark:bg-slate-700/50 rounded-xl cursor-not-allowed">
                        Sebelumnya
                    </button>
                    <button
                        class="px-4 py-2 text-sm font-bold text-indigo-600 bg-indigo-50 dark:bg-indigo-500/20 dark:text-indigo-300 rounded-xl hover:bg-indigo-100 dark:hover:bg-indigo-500/30 transition">
                        Selanjutnya
                    </button>
                </div>
            </div>

        </div>
    </section>
@endsection
