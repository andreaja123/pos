@extends('layouts.admin')

@section('title', 'Dashboard - Hanania POS')

@section('content')
    <section id="dashboard" class="page-section active max-w-7xl mx-auto">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Card 1 -->
            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">
                            Total Penjualan
                        </p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                            Rp 24.5 Jt
                        </h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-currency-dollar text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden">
                    <div class="bg-indigo-500 h-1.5 rounded-full" style="width: 75%"></div>
                </div>
                <p class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                    <span
                        class="bg-emerald-100 dark:bg-emerald-500/20 px-1.5 py-0.5 rounded text-emerald-600 dark:text-emerald-400">+15.3%</span>
                    <span class="text-slate-400 font-medium ml-1">dari bulan lalu</span>
                </p>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">
                            Total Transaksi
                        </p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                            142
                        </h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-orange-50 dark:bg-orange-500/20 text-orange-600 dark:text-orange-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-receipt text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden">
                    <div class="bg-orange-500 h-1.5 rounded-full" style="width: 45%"></div>
                </div>
                <p class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                    <span
                        class="bg-emerald-100 dark:bg-emerald-500/20 px-1.5 py-0.5 rounded text-emerald-600 dark:text-emerald-400">+4.2%</span>
                    <span class="text-slate-400 font-medium ml-1">dari kemarin</span>
                </p>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">
                            Stok Terjual
                        </p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                            389
                        </h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-blue-50 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-t-shirt text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden">
                    <div class="bg-blue-500 h-1.5 rounded-full" style="width: 60%"></div>
                </div>
                <p class="text-red-500 text-xs font-bold flex items-center gap-1">
                    <span
                        class="bg-red-100 dark:bg-red-500/20 px-1.5 py-0.5 rounded text-red-600 dark:text-red-400">-2.1%</span>
                    <span class="text-slate-400 font-medium ml-1">dari target</span>
                </p>
            </div>

            <!-- Card 4 -->
            <div
                class="bg-white dark:bg-darkCard p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 transition duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-bold mb-1">
                            Member Baru
                        </p>
                        <h3 class="text-3xl font-display font-bold text-slate-800 dark:text-white">
                            28
                        </h3>
                    </div>
                    <div
                        class="w-12 h-12 bg-pink-50 dark:bg-pink-500/20 text-pink-600 dark:text-pink-400 rounded-2xl flex items-center justify-center">
                        <i class="ph-fill ph-users-three text-2xl"></i>
                    </div>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mb-3 overflow-hidden">
                    <div class="bg-pink-500 h-1.5 rounded-full" style="width: 85%"></div>
                </div>
                <p class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                    <span
                        class="bg-emerald-100 dark:bg-emerald-500/20 px-1.5 py-0.5 rounded text-emerald-600 dark:text-emerald-400">+12%</span>
                    <span class="text-slate-400 font-medium ml-1">minggu ini</span>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Orders Table -->
            <div
                class="lg:col-span-2 bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                    <div>
                        <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white">
                            Transaksi Terbaru
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            5 transaksi terakhir hari ini
                        </p>
                    </div>
                    <button
                        class="px-4 py-2 bg-slate-50 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-sm font-bold rounded-xl hover:bg-slate-100 dark:hover:bg-slate-600 transition">
                        Lihat Semua
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                        <thead class="bg-slate-50 dark:bg-slate-700/50 text-slate-500 dark:text-slate-300 font-display">
                            <tr>
                                <th class="px-6 py-4 font-bold">ID Pesanan</th>
                                <th class="px-6 py-4 font-bold">Pelanggan</th>
                                <th class="px-6 py-4 font-bold">Total</th>
                                <th class="px-6 py-4 font-bold">Status</th>
                                <th class="px-6 py-4 font-bold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition cursor-pointer">
                                <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                    #ORD-089
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-purple-100 dark:bg-purple-900/50 text-purple-600 dark:text-purple-300 flex items-center justify-center font-bold text-xs">
                                            BS
                                        </div>
                                        <span class="font-bold text-slate-800 dark:text-slate-200">Budi
                                            Santoso</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                    Rp 450.000
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30">Lunas</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-slate-400 hover:text-primary dark:hover:text-primary">
                                        <i class="ph-bold ph-dots-three text-xl"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition cursor-pointer">
                                <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                    #ORD-088
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-pink-100 dark:bg-pink-900/50 text-pink-600 dark:text-pink-300 flex items-center justify-center font-bold text-xs">
                                            RM
                                        </div>
                                        <span class="font-bold text-slate-800 dark:text-slate-200">Rina
                                            Melati</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                    Rp 1.250.000
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 rounded-full text-xs font-bold border border-emerald-200 dark:border-emerald-500/30">Lunas</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-slate-400 hover:text-primary dark:hover:text-primary">
                                        <i class="ph-bold ph-dots-three text-xl"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition cursor-pointer">
                                <td class="px-6 py-4 font-mono text-slate-500 dark:text-slate-400">
                                    #ORD-087
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-300 flex items-center justify-center font-bold text-xs">
                                            AD
                                        </div>
                                        <span class="font-bold text-slate-800 dark:text-slate-200">Andi
                                            Darma</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">
                                    Rp 89.000
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400 rounded-full text-xs font-bold border border-amber-200 dark:border-amber-500/30">Pending</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-slate-400 hover:text-primary dark:hover:text-primary">
                                        <i class="ph-bold ph-dots-three text-xl"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Top Products -->
            <div class="bg-white dark:bg-darkCard rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm p-6">
                <h3 class="font-display font-bold text-lg text-slate-800 dark:text-white mb-4">
                    Produk Terlaris
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?auto=format&fit=crop&q=80&w=100"
                            class="w-14 h-14 rounded-xl object-cover bg-slate-100 dark:bg-slate-700" />
                        <div class="flex-1">
                            <h4 class="font-bold text-slate-800 dark:text-white text-sm">
                                Kemeja Linen Putih
                            </h4>
                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                124 Terjual
                            </p>
                        </div>
                        <span class="font-bold text-slate-800 dark:text-white text-sm">#1</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&q=80&w=100"
                            class="w-14 h-14 rounded-xl object-cover bg-slate-100 dark:bg-slate-700" />
                        <div class="flex-1">
                            <h4 class="font-bold text-slate-800 dark:text-white text-sm">
                                Nike Air Max
                            </h4>
                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                98 Terjual
                            </p>
                        </div>
                        <span class="font-bold text-slate-800 dark:text-white text-sm">#2</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <img src="https://images.unsplash.com/photo-1576871337622-98d48d1cf531?auto=format&fit=crop&q=80&w=100"
                            class="w-14 h-14 rounded-xl object-cover bg-slate-100 dark:bg-slate-700" />
                        <div class="flex-1">
                            <h4 class="font-bold text-slate-800 dark:text-white text-sm">
                                Jaket Denim Vtg
                            </h4>
                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                76 Terjual
                            </p>
                        </div>
                        <span class="font-bold text-slate-800 dark:text-white text-sm">#3</span>
                    </div>
                </div>
                <button
                    class="w-full mt-6 py-3 rounded-xl border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-bold text-sm hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                    Lihat Peringkat Penuh
                </button>
            </div>
        </div>
    </section>
@endsection
