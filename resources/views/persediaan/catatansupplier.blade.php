@extends('layouts.admin')

@section('title', 'Catatan Supplier - Hanania POS')

@section('content')
    <section class="max-w-7xl mx-auto space-y-6">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-display font-bold text-slate-800 dark:text-white">
                    Catatan Retur Supplier
                </h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Kelola data pengembalian stok ke supplier
                </p>
            </div>
            <button onclick="openModal('create')"
                class="flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-bold transition shadow-lg shadow-indigo-200 dark:shadow-none">
                <i class="ph-bold ph-plus text-lg"></i>
                <span>Buat Retur Baru</span>
            </button>
        </div>

        <div class="bg-white dark:bg-darkCard p-4 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm">
            <div class="flex flex-col lg:flex-row gap-4 justify-between items-center">
                <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                    <div class="relative group w-full sm:w-auto">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ph-bold ph-calendar-blank text-slate-400 group-focus-within:text-indigo-500"></i>
                        </div>
                        <input type="date"
                            class="pl-10 pr-4 py-2.5 w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition"
                            placeholder="Start Date">
                    </div>
                    <span class="hidden sm:flex items-center text-slate-400 font-bold">-</span>
                    <div class="relative group w-full sm:w-auto">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ph-bold ph-calendar-blank text-slate-400 group-focus-within:text-indigo-500"></i>
                        </div>
                        <input type="date"
                            class="pl-10 pr-4 py-2.5 w-full bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition"
                            placeholder="End Date">
                    </div>
                    <button
                        class="px-5 py-2.5 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold text-sm rounded-xl hover:bg-slate-200 dark:hover:bg-slate-600 transition flex items-center justify-center gap-2">
                        <i class="ph-bold ph-magnifying-glass"></i>
                        Filter
                    </button>
                </div>

                <button
                    class="w-full lg:w-auto px-5 py-2.5 bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-500/20 font-bold text-sm rounded-xl hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition flex items-center justify-center gap-2">
                    <i class="ph-bold ph-microsoft-excel-logo text-lg"></i>
                    Export Excel
                </button>
            </div>
        </div>

        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display border-b border-slate-100 dark:border-slate-700">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">Order #</th>
                            <th class="px-6 py-4 font-bold">Supplier</th>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 font-bold">Jumlah Bayar</th>
                            <th class="px-6 py-4 font-bold">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        @foreach ($returns as $index => $retur)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition cursor-pointer group">
                            <td class="px-6 py-4">
                                {{ $returns->firstItem() + $index }}
                            </td>
                        
                            <td class="px-6 py-4 font-mono font-medium text-indigo-600 dark:text-indigo-400">
                                {{ $retur->return_code }}
                            </td>
                        
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-900/50
                                                text-blue-600 dark:text-blue-300 flex items-center justify-center font-bold text-xs">
                                        {{ strtoupper(substr($retur->supplier->company, 0, 2)) }}
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-800 dark:text-slate-200">
                                            {{ $retur->supplier->company }}
                                        </span>
                                        <span class="text-xs text-slate-400">
                                            {{ $retur->supplier->city }}, {{ $retur->supplier->country }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                        
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($retur->return_date)->translatedFormat('d M Y') }}
                            </td>
                        
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                Rp {{ number_format($retur->total_amount, 0, ',', '.') }}
                            </td>
                        
                            <td class="px-6 py-4">
                                @php
                                    $statusStyle = [
                                        'selesai' => 'emerald',
                                        'pending' => 'amber',
                                        'proses' => 'blue'
                                    ][$retur->status];
                                @endphp
                        
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1
                                    bg-{{ $statusStyle }}-100 dark:bg-{{ $statusStyle }}-500/20
                                    text-{{ $statusStyle }}-700 dark:text-{{ $statusStyle }}-400
                                    rounded-full text-xs font-bold border
                                    border-{{ $statusStyle }}-200 dark:border-{{ $statusStyle }}-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-{{ $statusStyle }}-500"></span>
                                    {{ ucfirst($retur->status) }}
                                </span>
                            </td>
                        
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                <button onclick="openModal('edit', {
                                    id: '{{ $retur->id }}',
                                    supplier_id: '{{ $retur->supplier_id }}',
                                    return_date: '{{ $retur->return_date }}',
                                    total_amount: '{{ $retur->total_amount }}',
                                    status: '{{ $retur->status }}'
                                })"
                                class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-orange-500 hover:bg-orange-50 dark:hover:bg-orange-500/20 transition"
                                title="Edit">
                                <i class="ph-bold ph-pencil-simple"></i>
                            </button>
                                    <form method="POST" action="{{ route('retur.destroy', $retur) }}">
                @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus pesanan?')"
                                        class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-500/20 transition"
                                        title="Hapus">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        
                </table>
            </div>

            <div
                class="px-6 py-4 border-t border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400 text-center sm:text-left">
                    Menampilkan <span class="font-bold text-slate-800 dark:text-white">{{ $returns->firstItem() }}</span> sampai <span
                        class="font-bold text-slate-800 dark:text-white">{{ $returns->lastItem() }}</span> dari <span
                        class="font-bold text-slate-800 dark:text-white">{{ $returns->total() }}</span> data
                </p>
                {{ $returns->links('vendor.pagination.hanania') }}
            </div>
        </div>
    </section>
    <div id="modalOverlay" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity opacity-0" id="modalBackdrop" onclick="closeModal()"></div>
    
        <div class="flex items-center justify-center min-h-screen px-4 py-6">
            <div id="modalContent" class="relative w-full max-w-lg bg-white dark:bg-slate-800 rounded-3xl shadow-2xl transform scale-95 opacity-0 transition-all duration-300">
                
                <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100 dark:border-slate-700">
                    <h3 class="text-xl font-bold font-display text-slate-800 dark:text-white" id="modalTitle">
                        Buat Retur Baru
                    </h3>
                    <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition">
                        <i class="ph-bold ph-x text-xl"></i>
                    </button>
                </div>
    
                <form id="modalForm" method="POST" action="">
                    @csrf
                    <div id="methodField"></div>
    
                    <div class="p-6 space-y-4">
                        
                        <div class="space-y-1.5">
                            <label class="text-sm font-bold text-slate-600 dark:text-slate-300">Supplier</label>
                            <div class="relative">
                                <select name="supplier_id" id="inputSupplier" required
                                    class="w-full pl-4 pr-10 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none appearance-none transition">
                                    <option value="" disabled selected>Pilih Supplier...</option>
                                    @foreach($suppliers as $s)
                                        <option value="{{ $s->id }}">{{ $s->company }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                    <i class="ph-bold ph-caret-down"></i>
                                </div>
                            </div>
                        </div>
    
                        <div class="space-y-1.5">
                            <label class="text-sm font-bold text-slate-600 dark:text-slate-300">Tanggal Retur</label>
                            <input type="date" name="return_date" id="inputDate" required
                                class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition">
                        </div>
    
                        <div class="space-y-1.5">
                            <label class="text-sm font-bold text-slate-600 dark:text-slate-300">Total Nominal (Rp)</label>
                            <div class="relative">
                                <span class="absolute left-4 top-2.5 text-slate-400 font-bold text-sm">Rp</span>
                                <input type="number" name="total_amount" id="inputAmount" required min="0" placeholder="0"
                                    class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition">
                            </div>
                        </div>
    
                        <div class="space-y-1.5">
                            <label class="text-sm font-bold text-slate-600 dark:text-slate-300">Status</label>
                            <div class="grid grid-cols-3 gap-3">
                                <label class="cursor-pointer">
                                    <input type="radio" name="status" value="pending" class="peer sr-only" checked>
                                    <div class="px-3 py-2 rounded-xl border border-slate-200 dark:border-slate-600 text-center text-sm font-bold text-slate-500 peer-checked:bg-amber-100 peer-checked:text-amber-700 peer-checked:border-amber-200 transition">
                                        Pending
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="status" value="proses" class="peer sr-only">
                                    <div class="px-3 py-2 rounded-xl border border-slate-200 dark:border-slate-600 text-center text-sm font-bold text-slate-500 peer-checked:bg-blue-100 peer-checked:text-blue-700 peer-checked:border-blue-200 transition">
                                        Proses
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="status" value="selesai" class="peer sr-only">
                                    <div class="px-3 py-2 rounded-xl border border-slate-200 dark:border-slate-600 text-center text-sm font-bold text-slate-500 peer-checked:bg-emerald-100 peer-checked:text-emerald-700 peer-checked:border-emerald-200 transition">
                                        Selesai
                                    </div>
                                </label>
                            </div>
                        </div>
    
                    </div>
    
                    <div class="px-6 py-5 bg-slate-50 dark:bg-slate-700/30 border-t border-slate-100 dark:border-slate-700 flex justify-end gap-3 rounded-b-3xl">
                        <button type="button" onclick="closeModal()" class="px-5 py-2.5 text-slate-500 hover:text-slate-700 font-bold text-sm transition">
                            Batal
                        </button>
                        <button type="submit" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm rounded-xl shadow-lg shadow-indigo-200 dark:shadow-none transition flex items-center gap-2">
                            <i class="ph-bold ph-check"></i>
                            <span id="btnSubmitLabel">Simpan Data</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        const modalOverlay = document.getElementById('modalOverlay');
        const modalContent = document.getElementById('modalContent');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const modalForm = document.getElementById('modalForm');
        const modalTitle = document.getElementById('modalTitle');
        const methodField = document.getElementById('methodField');
        const btnSubmitLabel = document.getElementById('btnSubmitLabel');
    
        // Input Elements
        const inputSupplier = document.getElementById('inputSupplier');
        const inputDate = document.getElementById('inputDate');
        const inputAmount = document.getElementById('inputAmount');
        
        function openModal(mode, data = null) {
            // 1. Tampilkan Modal (Remove Hidden)
            modalOverlay.classList.remove('hidden');
            
            // 2. Animasi Masuk (Perlu sedikit delay agar transisi CSS jalan)
            setTimeout(() => {
                modalBackdrop.classList.remove('opacity-0');
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
    
            // 3. Reset Form
            modalForm.reset();
            methodField.innerHTML = ''; // Kosongkan method spoofing
    
            // 4. Logika Mode (Create vs Edit)
            if (mode === 'create') {
                modalTitle.innerText = 'Buat Retur Baru';
                btnSubmitLabel.innerText = 'Simpan Data';
                modalForm.action = "{{ route('retur.store') }}";
                
                // Set default date hari ini
                inputDate.valueAsDate = new Date();
            } 
            else if (mode === 'edit' && data) {
                modalTitle.innerText = 'Edit Data Retur';
                btnSubmitLabel.innerText = 'Perbarui Data';
                
                // Set Action URL ke route update
                // Kita replace placeholder ID dengan ID data asli
                let updateUrl = "{{ route('retur.update', ':id') }}";
                modalForm.action = updateUrl.replace(':id', data.id);
    
                // Tambahkan Method Spoofing @method('PUT')
                methodField.innerHTML = '<input type="hidden" name="_method" value="PUT">';
    
                // Isi Data ke Input
                inputSupplier.value = data.supplier_id;
                inputDate.value = data.return_date ? data.return_date.split('T')[0] : '';
                inputAmount.value = data.total_amount;
                
                // Radio button selection logic
                const statusRadio = document.querySelector(`input[name="status"][value="${data.status}"]`);
                if (statusRadio) statusRadio.checked = true;
            }
        }
    
        function closeModal() {
            // 1. Animasi Keluar
            modalBackdrop.classList.add('opacity-0');
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
    
            // 2. Sembunyikan Modal setelah animasi selesai (300ms sesuai durasi CSS)
            setTimeout(() => {
                modalOverlay.classList.add('hidden');
            }, 300);
        }
    </script>
@endsection
