@extends('layouts.admin')

@section('title', 'Tambah Dokumen - Hanania POS')

@section('content')
    <section class="page-section max-w-3xl mx-auto">
        <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg p-6">
            <h3 class="text-lg font-bold mb-4">Tambah Dokumen</h3>

            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Judul</label>
                    <input name="title" value="{{ old('title') }}" type="text" class="w-full rounded-xl border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm py-2.5 px-4" required>
                    @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Kategori</label>
                    <input name="category" value="{{ old('category') }}" type="text" class="w-full rounded-xl border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm py-2.5 px-4">
                    @error('category')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">File</label>
                    <input name="file" type="file" class="w-full text-sm">
                    @error('file')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('documents.index') }}" class="px-4 py-2 rounded-xl bg-white border">Batal</a>
                    <button class="px-4 py-2 rounded-xl bg-indigo-600 text-white">Simpan</button>
                </div>
            </form>
        </div>
    </section>
@endsection
