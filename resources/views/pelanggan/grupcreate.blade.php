@extends('layouts.admin')

@section('title', 'Tambah Grup Pelanggan - Hanania POS')

@section('content')
    <section class="max-w-3xl mx-auto pb-10">
        <form action="{{ route('groups.store') }}" method="POST">
            @csrf
            <div class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold mb-2">Nama Grup</label>
                        <input name="name" value="{{ old('name') }}" class="w-full px-4 py-3 rounded-xl border" required />
                        @error('name')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold mb-2">Deskripsi</label>
                        <textarea name="description" class="w-full px-4 py-3 rounded-xl" rows="3">{{ old('description') }}</textarea>
                        @error('description')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold mb-2">Diskon (%)</label>
                            <input name="discount_percentage" value="{{ old('discount_percentage') }}" class="w-full px-4 py-3 rounded-xl" />
                            @error('discount_percentage')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
                        </div>
                        <div class="flex items-center gap-3">
                            <input type="checkbox" name="active" value="1" {{ old('active', true) ? 'checked' : '' }} />
                            <label class="text-sm">Aktif</label>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('groups.index') }}" class="px-4 py-2 rounded-xl border">Batal</a>
                        <button type="submit" class="px-6 py-2 rounded-xl bg-indigo-600 text-white">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
