@extends('layouts.admin')

@section('title', 'Kelola Faktur - Hanania POS')

@section('content')

    <section class="pb-12 px-4 sm:px-6 max-w-7xl mx-auto min-h-screen">

        <!-- Header Page -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-display font-bold text-slate-800 dark:text-white">Daftar Faktur</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola semua transaksi, pembayaran, dan komunikasi
                    pelanggan.</p>
            </div>
            <div class="flex gap-3 w-full md:w-auto">
                <button
                    class="flex items-center justify-center gap-2 px-4 py-2.5 bg-green-600 text-white rounded-xl font-bold text-sm hover:bg-green-700 transition shadow-lg shadow-green-600/20 w-full md:w-auto">
                    <i class="ph-bold ph-microsoft-excel-logo text-lg"></i> Ekspor Excel
                </button>
                <button
                    class="flex items-center justify-center gap-2 px-4 py-2.5 bg-primary text-white rounded-xl font-bold text-sm hover:bg-indigo-700 transition shadow-lg shadow-indigo-600/20 w-full md:w-auto">
                    <i class="ph-bold ph-plus"></i> Faktur Baru
                </button>
            </div>
        </div>

        <!-- Filters & Search -->
        <div class="bg-white dark:bg-darkCard p-4 rounded-3xl border border-slate-200 dark:border-slate-700 shadow-sm mb-6">
            <div class="flex flex-col md:flex-row gap-4 justify-between">
                <div class="relative w-full md:w-96">
                    <i class="ph-bold ph-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" placeholder="Cari No. Faktur, Pelanggan..."
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/50 text-sm">
                </div>
                <div class="flex gap-3 overflow-x-auto pb-1 no-scrollbar">
                    <select
                        class="px-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-bold text-slate-600 dark:text-slate-300 focus:outline-none focus:ring-2 focus:ring-primary/50 cursor-pointer">
                        <option value="">Semua Status</option>
                        <option value="paid">Lunas</option>
                        <option value="unpaid">Belum Bayar</option>
                        <option value="overdue">Jatuh Tempo</option>
                        <option value="draft">Draft</option>
                    </select>
                    <input type="date"
                        class="px-4 py-2.5 bg-slate-50 dark:bg-slate-700/50 border border-slate-200 dark:border-slate-600 rounded-xl text-sm font-bold text-slate-600 dark:text-slate-300 focus:outline-none focus:ring-2 focus:ring-primary/50">
                </div>
            </div>
        </div>

        <!-- Table Card -->
        <div
            class="bg-white dark:bg-darkCard rounded-3xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm whitespace-nowrap">
                    <thead
                        class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-400 font-display border-b border-slate-200 dark:border-slate-700">
                        <tr>
                            <th class="px-6 py-4 font-bold w-16">No</th>
                            <th class="px-6 py-4 font-bold">Kode Unik</th>
                            <th class="px-6 py-4 font-bold">Pelanggan</th>
                            <th class="px-6 py-4 font-bold">Tanggal</th>
                            <th class="px-6 py-4 font-bold">Total Bayar</th>
                            <th class="px-6 py-4 font-bold">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <!-- Row 1 -->
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition group cursor-pointer"
                            onclick="openDrawer('INV-2023-001')">
                            <td class="px-6 py-4 text-slate-500">1</td>
                            <td class="px-6 py-4 font-mono font-bold text-primary">#INV-2023-001</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-purple-100 dark:bg-purple-900/50 text-purple-600 flex items-center justify-center font-bold text-xs">
                                        BS</div>
                                    <span class="font-bold text-slate-800 dark:text-white">Budi Santoso</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-500">16 Des 2025</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp 450.000</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30 flex items-center gap-1 w-fit">
                                    <i class="ph-fill ph-check-circle"></i> Lunas
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button
                                    class="p-2 text-slate-400 hover:text-primary rounded-full hover:bg-slate-100 dark:hover:bg-slate-700 transition"
                                    onclick="event.stopPropagation(); openDrawer('INV-2023-001')">
                                    <i class="ph-bold ph-eye text-lg"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition group cursor-pointer"
                            onclick="openDrawer('INV-2023-002')">
                            <td class="px-6 py-4 text-slate-500">2</td>
                            <td class="px-6 py-4 font-mono font-bold text-primary">#INV-2023-002</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 flex items-center justify-center font-bold text-xs">
                                        AD</div>
                                    <span class="font-bold text-slate-800 dark:text-white">Andi Darma</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-500">15 Des 2025</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp 1.250.000</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400 rounded-full text-xs font-bold border border-amber-200 dark:border-amber-500/30 flex items-center gap-1 w-fit">
                                    <i class="ph-fill ph-clock"></i> Pending
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button
                                    class="p-2 text-slate-400 hover:text-primary rounded-full hover:bg-slate-100 dark:hover:bg-slate-700 transition"
                                    onclick="event.stopPropagation(); openDrawer('INV-2023-002')">
                                    <i class="ph-bold ph-eye text-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition group cursor-pointer"
                            onclick="openDrawer('INV-2023-003')">
                            <td class="px-6 py-4 text-slate-500">3</td>
                            <td class="px-6 py-4 font-mono font-bold text-primary">#INV-2023-003</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-pink-100 dark:bg-pink-900/50 text-pink-600 flex items-center justify-center font-bold text-xs">
                                        RM</div>
                                    <span class="font-bold text-slate-800 dark:text-white">Rina Melati</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-500">14 Des 2025</td>
                            <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Rp 89.000</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-red-100 dark:bg-red-500/20 text-red-700 dark:text-red-400 rounded-full text-xs font-bold border border-red-200 dark:border-red-500/30 flex items-center gap-1 w-fit">
                                    <i class="ph-fill ph-x-circle"></i> Batal
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button
                                    class="p-2 text-slate-400 hover:text-primary rounded-full hover:bg-slate-100 dark:hover:bg-slate-700 transition"
                                    onclick="event.stopPropagation(); openDrawer('INV-2023-003')">
                                    <i class="ph-bold ph-eye text-lg"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-slate-200 dark:border-slate-700 flex items-center justify-between">
                <span class="text-xs text-slate-500 dark:text-slate-400">Menampilkan 1-10 dari 124 data</span>
                <div class="flex gap-2">
                    <button
                        class="px-3 py-1 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 text-xs hover:bg-slate-50 dark:hover:bg-slate-700">Prev</button>
                    <button class="px-3 py-1 rounded-lg bg-primary text-white text-xs font-bold">1</button>
                    <button
                        class="px-3 py-1 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 text-xs hover:bg-slate-50 dark:hover:bg-slate-700">2</button>

                    <button
                        class="px-3 py-1 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 text-xs hover:bg-slate-50 dark:hover:bg-slate-700">Next</button>
                </div>
            </div>
        </div>
    </section>
    <div id="drawerOverlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden transition-opacity opacity-0"
        onclick="closeDrawer()"></div>

    <!-- Right Drawer -->
    <div id="detailDrawer"
        class="fixed inset-y-0 right-0 z-50 w-full md:w-[600px] bg-white dark:bg-darkCard shadow-2xl transform translate-x-full transition-transform duration-300 flex flex-col h-full">

        <!-- Drawer Header -->
        <div
            class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center bg-white dark:bg-darkCard z-10">
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <h2 class="text-xl font-display font-bold text-slate-800 dark:text-white" id="drawerTitle">
                        #INV-2023-001</h2>
                    <span
                        class="px-2.5 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-700 border border-emerald-200">LUNAS</span>
                </div>
                <p class="text-xs text-slate-500">Dibuat pada: 16 Des 2025 • Oleh: Admin</p>
            </div>
            <button onclick="closeDrawer()"
                class="p-2 bg-slate-100 dark:bg-slate-700 rounded-full hover:bg-slate-200 transition text-slate-500 dark:text-slate-300">
                <i class="ph-bold ph-x text-lg"></i>
            </button>
        </div>

        <!-- Drawer Content (Scrollable) -->
        <div class="flex-1 overflow-y-auto p-6 space-y-8 bg-slate-50 dark:bg-darkBg/50">

            <!-- Quick Actions -->
            <div class="grid grid-cols-4 gap-2">
                <button
                    class="flex flex-col items-center justify-center gap-1 p-3 bg-white dark:bg-darkCard rounded-xl border border-slate-200 dark:border-slate-700 hover:border-primary hover:text-primary transition shadow-sm">
                    <i class="ph-fill ph-printer text-2xl text-slate-400 group-hover:text-primary"></i>
                    <span class="text-[10px] font-bold">Thermal</span>
                </button>
                <button
                    class="flex flex-col items-center justify-center gap-1 p-3 bg-white dark:bg-darkCard rounded-xl border border-slate-200 dark:border-slate-700 hover:border-primary hover:text-primary transition shadow-sm">
                    <i class="ph-fill ph-file-pdf text-2xl text-slate-400 group-hover:text-primary"></i>
                    <span class="text-[10px] font-bold">PDF</span>
                </button>
                <button
                    class="flex flex-col items-center justify-center gap-1 p-3 bg-white dark:bg-darkCard rounded-xl border border-slate-200 dark:border-slate-700 hover:border-primary hover:text-primary transition shadow-sm">
                    <i class="ph-fill ph-pencil-simple text-2xl text-slate-400 group-hover:text-primary"></i>
                    <span class="text-[10px] font-bold">Edit</span>
                </button>
                <button
                    class="flex flex-col items-center justify-center gap-1 p-3 bg-primary text-white rounded-xl border border-primary hover:bg-indigo-700 transition shadow-sm">
                    <i class="ph-bold ph-wallet text-2xl"></i>
                    <span class="text-[10px] font-bold">Bayar</span>
                </button>
            </div>

            <!-- Invoice Details -->
            <div
                class="bg-white dark:bg-darkCard rounded-2xl border border-slate-200 dark:border-slate-700 overflow-hidden shadow-sm">
                <div
                    class="p-4 bg-slate-50 dark:bg-slate-700/30 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                    <h3 class="font-bold text-sm text-slate-700 dark:text-slate-200">Rincian Produk</h3>
                    <button class="text-xs text-primary font-bold hover:underline">Lihat Detail</button>
                </div>
                <div class="p-4 space-y-4">
                    <!-- Item -->
                    <div class="flex justify-between items-start text-sm">
                        <div>
                            <div class="font-bold text-slate-800 dark:text-white">Kemeja Linen Putih (x1)</div>
                            <div class="text-xs text-slate-400">SKU: KLP-001</div>
                        </div>
                        <div class="font-bold text-slate-700 dark:text-slate-300">Rp 150.000</div>
                    </div>
                    <!-- Item -->
                    <div class="flex justify-between items-start text-sm">
                        <div>
                            <div class="font-bold text-slate-800 dark:text-white">Celana Chino Slim (x2)</div>
                            <div class="text-xs text-slate-400">SKU: CCS-098</div>
                        </div>
                        <div class="font-bold text-slate-700 dark:text-slate-300">Rp 400.000</div>
                    </div>

                    <div class="border-t border-dashed border-slate-200 dark:border-slate-600 my-2 pt-2 space-y-2">
                        <div class="flex justify-between text-xs text-slate-500">
                            <span>Subtotal</span>
                            <span>Rp 550.000</span>
                        </div>
                        <div class="flex justify-between text-xs text-slate-500">
                            <span>Pajak (11%)</span>
                            <span>Rp 60.500</span>
                        </div>
                        <div
                            class="flex justify-between text-base font-bold text-slate-800 dark:text-white pt-2 border-t border-slate-100 dark:border-slate-700">
                            <span>Total</span>
                            <span class="text-primary">Rp 610.500</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Advanced Actions Section -->
            <div class="space-y-4">
                <h3 class="font-bold text-sm text-slate-500 uppercase tracking-wider">Komunikasi & Dokumen</h3>

                <!-- 1. Email Actions -->
                <div
                    class="bg-white dark:bg-darkCard rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                    <button onclick="toggleAccordion('emailOptions')"
                        class="w-full flex items-center justify-between p-4 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center"><i
                                    class="ph-fill ph-envelope-simple"></i></div>
                            <div class="text-left">
                                <div class="text-sm font-bold text-slate-800 dark:text-white">Kirim Email</div>
                                <div class="text-[10px] text-slate-400">Notifikasi, Pengingat, Refund</div>
                            </div>
                        </div>
                        <i class="ph-bold ph-caret-down text-slate-400" id="icon-emailOptions"></i>
                    </button>
                    <div id="emailOptions"
                        class="hidden border-t border-slate-100 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 p-2 grid grid-cols-2 gap-2">
                        <button
                            class="text-left text-xs p-2 rounded hover:bg-white dark:hover:bg-slate-700 transition flex items-center gap-2">
                            <i class="ph-bold ph-paper-plane-right text-blue-500"></i> Pemberitahuan Faktur
                        </button>
                        <button
                            class="text-left text-xs p-2 rounded hover:bg-white dark:hover:bg-slate-700 transition flex items-center gap-2">
                            <i class="ph-bold ph-bell-ringing text-amber-500"></i> Pengingat Pembayaran
                        </button>
                        <button
                            class="text-left text-xs p-2 rounded hover:bg-white dark:hover:bg-slate-700 transition flex items-center gap-2">
                            <i class="ph-bold ph-check-circle text-green-500"></i> Pembayaran Diterima
                        </button>
                        <button
                            class="text-left text-xs p-2 rounded hover:bg-white dark:hover:bg-slate-700 transition flex items-center gap-2">
                            <i class="ph-bold ph-clock text-red-500"></i> Lewat Jatuh Tempo
                        </button>
                        <button
                            class="text-left text-xs p-2 rounded hover:bg-white dark:hover:bg-slate-700 transition flex items-center gap-2 col-span-2">
                            <i class="ph-bold ph-arrow-u-down-left text-purple-500"></i> Pengembalian Dana (Refund)
                        </button>
                    </div>
                </div>

                <!-- 2. SMS Actions -->
                <div
                    class="bg-white dark:bg-darkCard rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                    <button onclick="toggleAccordion('smsOptions')"
                        class="w-full flex items-center justify-between p-4 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-green-50 text-green-600 flex items-center justify-center">
                                <i class="ph-fill ph-chat-circle-text"></i>
                            </div>
                            <div class="text-left">
                                <div class="text-sm font-bold text-slate-800 dark:text-white">Kirim SMS / WA</div>
                                <div class="text-[10px] text-slate-400">Pesan singkat ke pelanggan</div>
                            </div>
                        </div>
                        <i class="ph-bold ph-caret-down text-slate-400" id="icon-smsOptions"></i>
                    </button>
                    <div id="smsOptions"
                        class="hidden border-t border-slate-100 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 p-2 grid grid-cols-1 gap-2">
                        <button class="text-left text-xs p-2 rounded hover:bg-white dark:hover:bg-slate-700 transition">
                            📱 Pemberitahuan Faktur
                        </button>
                        <button class="text-left text-xs p-2 rounded hover:bg-white dark:hover:bg-slate-700 transition">
                            🔔 Pengingat Pembayaran
                        </button>
                        <button class="text-left text-xs p-2 rounded hover:bg-white dark:hover:bg-slate-700 transition">
                            ✅ Konfirmasi Pembayaran
                        </button>
                    </div>
                </div>

                <!-- 3. Others (Print, Preview, etc) -->
                <div
                    class="bg-white dark:bg-darkCard rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden p-4">
                    <div class="grid grid-cols-2 gap-3">
                        <button
                            class="py-2 px-3 border border-slate-200 dark:border-slate-600 rounded-lg text-xs font-bold hover:bg-slate-50 dark:hover:bg-slate-700 flex items-center justify-center gap-2">
                            <i class="ph-bold ph-download-simple"></i> Unduh PDF
                        </button>
                        <button
                            class="py-2 px-3 border border-slate-200 dark:border-slate-600 rounded-lg text-xs font-bold hover:bg-slate-50 dark:hover:bg-slate-700 flex items-center justify-center gap-2">
                            <i class="ph-bold ph-eye"></i> Pratinjau
                        </button>
                        <button
                            class="py-2 px-3 border border-slate-200 dark:border-slate-600 rounded-lg text-xs font-bold hover:bg-slate-50 dark:hover:bg-slate-700 flex items-center justify-center gap-2">
                            <i class="ph-bold ph-receipt"></i> Faktur Proforma
                        </button>
                        <button
                            class="py-2 px-3 border border-slate-200 dark:border-slate-600 rounded-lg text-xs font-bold hover:bg-slate-50 dark:hover:bg-slate-700 flex items-center justify-center gap-2">
                            <i class="ph-bold ph-truck"></i> Catatan Kirim
                        </button>
                    </div>
                </div>
            </div>

            <!-- Danger Zone / Status Management -->
            <div class="space-y-4 pt-4 border-t border-slate-200 dark:border-slate-700">
                <h3 class="font-bold text-sm text-slate-500 uppercase tracking-wider">Manajemen Status</h3>

                <div
                    class="bg-white dark:bg-darkCard rounded-xl border border-slate-200 dark:border-slate-700 p-4 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-bold text-slate-700 dark:text-slate-300">Ubah Status Manual</span>
                        <select class="text-xs p-1.5 border border-slate-200 rounded bg-transparent">
                            <option>Lunas</option>
                            <option>Pending</option>
                            <option>Draft</option>
                        </select>
                    </div>
                    <button
                        class="w-full py-2.5 rounded-lg border border-red-200 bg-red-50 dark:bg-red-900/10 text-red-600 text-xs font-bold hover:bg-red-100 transition flex items-center justify-center gap-2">
                        <i class="ph-bold ph-x-circle"></i> Batalkan Faktur Ini
                    </button>
                </div>
            </div>

            <div class="h-10"></div> <!-- Spacer bottom -->
        </div>
    </div>

    <!-- Script for Drawer & Interactive Elements -->
    <script>
        function openDrawer(id) {
            const drawer = document.getElementById('detailDrawer');
            const overlay = document.getElementById('drawerOverlay');
            const title = document.getElementById('drawerTitle');

            // Set Title dynamically (simulated)
            title.innerText = '#' + id;

            // Show Overlay
            overlay.classList.remove('hidden');
            setTimeout(() => {
                overlay.classList.remove('opacity-0');
            }, 10);

            // Slide Drawer In
            drawer.classList.remove('translate-x-full');
        }

        function closeDrawer() {
            const drawer = document.getElementById('detailDrawer');
            const overlay = document.getElementById('drawerOverlay');

            // Slide Drawer Out
            drawer.classList.add('translate-x-full');

            // Hide Overlay
            overlay.classList.add('opacity-0');
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300);
        }

        function toggleAccordion(id) {
            const content = document.getElementById(id);
            const icon = document.getElementById('icon-' + id);

            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                content.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        }
    </script>
@endsection
