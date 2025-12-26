@extends('layouts.admin')

@section('title', 'Kelola Liburan - Hanania POS')

@section('content')
    <section id="liburan" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Kelola Liburan
                </h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">
                    Daftar pengajuan dan riwayat libur karyawan.
                </p>
            </div>
            <button
                class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg shadow-indigo-200 dark:shadow-none transition duration-300 transform hover:-translate-y-0.5">
                <i class="ph-bold ph-plus text-lg"></i>
                <span>Tambah Baru</span>
            </button>
        </div>

        <div class="bg-white dark:bg-darkCard p-4 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm mb-6">
            <div class="flex flex-col md:flex-row justify-between gap-4">
                <div class="relative w-full md:w-96">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="ph-bold ph-magnifying-glass text-slate-400 text-lg"></i>
                    </div>
                    <input type="text"
                        class="block w-full pl-10 pr-3 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition"
                        placeholder="Cari nama atau catatan...">
                </div>

                <div class="flex gap-3">
                    <button
                        class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-600 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-600 transition">
                        <i class="ph-bold ph-microsoft-excel-logo text-emerald-600 text-lg"></i>
                        <span class="hidden sm:inline">Ekspor Excel</span>
                    </button>
                    <button
                        class="px-3 py-2.5 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-600 transition">
                        <i class="ph-bold ph-funnel text-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display uppercase tracking-wider text-xs">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16 text-center">No</th>
                            <th class="px-6 py-4 font-bold min-w-[140px]">Dari</th>
                            <th class="px-6 py-4 font-bold min-w-[140px]">Untuk</th>
                            <th class="px-6 py-4 font-bold">Durasi</th>
                            <th class="px-6 py-4 font-bold w-1/3">Catatan</th>
                            <th class="px-6 py-4 font-bold text-right">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 text-center font-bold text-slate-400">1</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="ph-fill ph-calendar-blank text-slate-400"></i>
                                    <span class="font-mono font-medium text-slate-700 dark:text-slate-200">12 Des
                                        2025</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="ph-fill ph-calendar-blank text-slate-400"></i>
                                    <span class="font-mono font-medium text-slate-700 dark:text-slate-200">14 Des
                                        2025</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-lg text-xs font-bold border border-indigo-100 dark:border-indigo-500/30">
                                    <i class="ph-bold ph-clock"></i>
                                    3 Hari
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-slate-600 dark:text-slate-400 truncate max-w-xs">
                                    Izin acara keluarga di luar kota (Bandung)
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-2">
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-slate-600 dark:hover:text-indigo-400 transition"
                                        title="Edit">
                                        <i class="ph-bold ph-pencil-simple text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-slate-600 dark:hover:text-red-400 transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                            <td class="px-6 py-4 text-center font-bold text-slate-400">2</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="ph-fill ph-calendar-blank text-slate-400"></i>
                                    <span class="font-mono font-medium text-slate-700 dark:text-slate-200">20 Des
                                        2025</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="ph-fill ph-calendar-blank text-slate-400"></i>
                                    <span class="font-mono font-medium text-slate-700 dark:text-slate-200">20 Des
                                        2025</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-100 dark:bg-slate-600/30 text-slate-600 dark:text-slate-300 rounded-lg text-xs font-bold border border-slate-200 dark:border-slate-600">
                                    <i class="ph-bold ph-clock"></i>
                                    1 Hari
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-slate-600 dark:text-slate-400 truncate max-w-xs">
                                    Sakit demam, surat dokter terlampir
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-2">
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-slate-600 dark:hover:text-indigo-400 transition">
                                        <i class="ph-bold ph-pencil-simple text-lg"></i>
                                    </button>
                                    <button
                                        class="p-2 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-slate-600 dark:hover:text-red-400 transition">
                                        <i class="ph-bold ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div
                class="px-6 py-4 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row items-center justify-between gap-4">
                <span class="text-sm text-slate-500 dark:text-slate-400 text-center md:text-left">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">1-2</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">12</span> data
                </span>

                <div class="flex gap-2">
                    <button
                        class="px-3 py-1 text-sm rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 disabled:opacity-50 disabled:cursor-not-allowed transition">
                        Sebelumnya
                    </button>
                    <button
                        class="px-3 py-1 text-sm rounded-lg bg-indigo-600 text-white font-bold shadow-sm hover:bg-indigo-700 transition">
                        1
                    </button>
                    <button
                        class="px-3 py-1 text-sm rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        2
                    </button>
                    <button
                        class="px-3 py-1 text-sm rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        Selanjutnya
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
