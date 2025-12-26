@extends('layouts.admin')

@section('title', 'Absensi - Hanania POS')

@section('content')
    <section id="absensi" class="page-section active max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Absensi Karyawan
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Kelola data kehadiran dan jam kerja tim.
                </p>
            </div>
            <div class="flex gap-3 w-full md:w-auto">
                <div
                    class="hidden md:flex items-center bg-white dark:bg-darkCard border border-slate-200 dark:border-slate-700 rounded-xl px-4 py-2 text-sm text-slate-600 dark:text-slate-300">
                    <i class="ph-bold ph-calendar-blank mr-2 text-lg"></i>
                    <span>Hari Ini: 16 Des 2025</span>
                </div>

                <button
                    class="flex-1 md:flex-none flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl font-bold transition shadow-lg shadow-indigo-200 dark:shadow-none">
                    <i class="ph-bold ph-plus"></i>
                    <span>Catat Absensi</span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div
                class="bg-white dark:bg-darkCard p-4 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm flex items-center gap-4">
                <div
                    class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 flex items-center justify-center">
                    <i class="ph-fill ph-check-circle text-xl"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-bold">Hadir</p>
                    <p class="text-lg font-bold text-slate-800 dark:text-white">18</p>
                </div>
            </div>
            <div
                class="bg-white dark:bg-darkCard p-4 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm flex items-center gap-4">
                <div
                    class="w-10 h-10 rounded-xl bg-orange-50 dark:bg-orange-500/10 text-orange-600 flex items-center justify-center">
                    <i class="ph-fill ph-clock-countdown text-xl"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-bold">Terlambat</p>
                    <p class="text-lg font-bold text-slate-800 dark:text-white">3</p>
                </div>
            </div>
            <div
                class="bg-white dark:bg-darkCard p-4 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm flex items-center gap-4">
                <div
                    class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-500/10 text-blue-600 flex items-center justify-center">
                    <i class="ph-fill ph-coffee text-xl"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-bold">Izin/Cuti</p>
                    <p class="text-lg font-bold text-slate-800 dark:text-white">2</p>
                </div>
            </div>
            <div
                class="bg-white dark:bg-darkCard p-4 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm flex items-center gap-4">
                <div
                    class="w-10 h-10 rounded-xl bg-red-50 dark:bg-red-500/10 text-red-600 flex items-center justify-center">
                    <i class="ph-fill ph-x-circle text-xl"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-bold">Alpha</p>
                    <p class="text-lg font-bold text-slate-800 dark:text-white">0</p>
                </div>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none overflow-hidden">

            <div
                class="p-5 border-b border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="relative w-full md:w-64">
                    <i class="ph-bold ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" placeholder="Cari karyawan..."
                        class="w-full pl-10 pr-4 py-2 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-
