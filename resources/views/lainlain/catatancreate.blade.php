@extends('layouts.admin')

@section('title', 'Tambah Catatan - Hanania POS')

@section('content')
    <section id="create-note" class="page-section active max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Tambah Catatan</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">Buat catatan operasional atau pengingat.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('notes.index') }}" class="px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition">Batal</a>
            </div>
        </div>

        <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 p-6 md:p-8 shadow-sm">
            <form action="{{ route('notes.store') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-2">Judul <span class="text-red-500">*</span></label>
                        <input name="title" value="{{ old('title') }}" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        @error('title') <p class="text-xs text-red-500 mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-600 dark:text-slate-300 mb-2">Isi Catatan</label>
                        <textarea name="body" rows="6" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-darkCard px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('body') }}</textarea>
                        @error('body') <p class="text-xs text-red-500 mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
