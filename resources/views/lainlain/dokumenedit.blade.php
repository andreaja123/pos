@extends('layouts.admin')

@section('title', 'Edit Dokumen - Hanania POS')

@section('content')
    <section class="page-section max-w-3xl mx-auto">
        <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg p-6">
            <h3 class="text-lg font-bold mb-4">Edit Dokumen</h3>

            <form action="{{ route('documents.update', $document) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Judul</label>
                    <input name="title" value="{{ old('title', $document->title) }}" type="text" class="w-full rounded-xl border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm py-2.5 px-4" required>
                    @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Kategori</label>
                    <input name="category" value="{{ old('category', $document->category) }}" type="text" class="w-full rounded-xl border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm py-2.5 px-4">
                    @error('category')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Ganti File (opsional)</label>
                    <input name="file" type="file" class="w-full text-sm">
                    <p class="text-xs text-slate-500 mt-1">File saat ini: <strong>{{ $document->original_name }}</strong></p>
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
