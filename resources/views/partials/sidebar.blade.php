<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: rgba(148, 163, 184, 0.4);
        /* slate-400 */
        border-radius: 9999px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: rgba(148, 163, 184, 0.7);
    }
</style>

<aside id="sidebar"
    class="bg-white dark:bg-darkCard w-64
         h-screen flex flex-col border-r
         fixed md:relative z-30
         -translate-x-full md:translate-x-0
         transition-transform duration-500 ease-in-out
         overflow-hidden">



    <!-- Logo -->
    <div class="h-20 flex items-center px-6 border-b border-slate-100 dark:border-slate-700 shrink-0">
        <div
            class="w-9 h-9 bg-gradient-to-tr from-primary to-purple-500 rounded-xl flex items-center justify-center text-white mr-3 shadow-lg shadow-primary/30">
            <i class="ph-bold ph-coat-hanger text-xl"></i>
        </div>
        <div>
            <h1 class="font-display font-bold text-lg text-slate-900 dark:text-white tracking-tight leading-none">
                Hanania<span class="text-primary">POS</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-medium tracking-widest uppercase">
                Admin Panel
            </p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 py-4 space-y-1
            overflow-y-auto overflow-x-hidden
            custom-scrollbar">

        <!-- Dashboard -->
        <a href="/" onclick="switchTab('dashboard')" id="nav-dashboard"
            class="nav-item flex items-center px-4 py-2.5 text-slate-600 dark:text-slate-400 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary dark:hover:text-primary transition-all duration-200 group active-nav">
            <i class="ph ph-squares-four text-lg mr-3 group-hover:scale-110 transition-transform"></i>
            <span class="font-medium text-sm">Dashboard</span>
        </a>

        <!-- Penjualan (With Submenu) -->
        <div>
            <!-- Level 1 -->
            <button onclick="toggleSubmenu('submenu-penjualan', 'arrow-penjualan')"
                class="w-full flex items-center justify-between px-4 py-2.5 text-slate-600 dark:text-slate-400 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary dark:hover:text-primary transition-all duration-200 group">
                <div class="flex items-center">
                    <i class="ph ph-shopping-bag text-lg mr-3 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium text-sm">Penjualan</span>
                </div>
                <i id="arrow-penjualan" class="ph ph-caret-down text-xs transition-transform duration-300"></i>
            </button>

            <!-- Submenu Level 2 -->
            <div id="submenu-penjualan"
                class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-100 dark:border-slate-700 ml-4">

                <!-- POS (Level 2 with Submenu) -->
                <div>
                    <button onclick="toggleSubmenu('submenu-pos', 'arrow-pos')"
                        class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                        <div class="flex items-center">
                            <i class="ph ph-cash-register mr-2"></i>
                            <span class="text-sm">POS / Kasir</span>
                        </div>
                        <i id="arrow-pos" class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
                    </button>

                    <!-- Sub Submenu Level 3 -->
                    <div id="submenu-pos"
                        class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                        <a href="/penjualan/faktur-baru-kasir"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-plus-circle mr-2 text-xs"></i>
                            Faktur Baru
                        </a>

                        <a href="/penjualan/kelola-faktur-baru-kasir"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Kelola Faktur
                        </a>
                    </div>
                </div>
                <div>
                    <button onclick="toggleSubmenu('submenu-penjualan2', 'arrow-penjualan2')"
                        class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                        <div class="flex items-center">
                            <i class="ph ph-cash-register mr-2"></i>
                            <span class="text-sm">Penjualan</span>
                        </div>
                        <i id="arrow-penjualan2"
                            class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
                    </button>

                    <!-- Sub Submenu Level 3 -->
                    <div id="submenu-penjualan2"
                        class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                        <a href="{{ route('invoices.create') }}"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-plus-circle mr-2 text-xs"></i>
                            Faktur Baru
                        </a>

                        <a href="{{ route('invoices.index') }}"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Kelola Faktur
                        </a>
                    </div>
                </div>

                <!-- Riwayat Penjualan -->
                <a href="/penjualan/catatankredit" onclick="switchTab('sales-list')" id="nav-sales-list"
                    class="nav-item flex items-center px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                    <i class="ph ph-receipt mr-2"></i>
                    <span class="text-sm">Catatan Kredit</span>
                </a>
            </div>
        </div>

        <!-- Persediaan -->
        <div>
            <button onclick="toggleSubmenu('submenu-persediaan', 'arrow-persediaan')"
                class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                <div class="flex items-center">
                    <i class="ph ph-cash-register mr-2"></i>
                    <span class="text-sm">Persediaan</span>
                </div>
                <i id="arrow-persediaan" class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
            </button>

            <!-- Sub Submenu Level 3 -->
            <div id="submenu-persediaan"
                class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                <div>
                    <button onclick="toggleSubmenu('submenu-produkbaru', 'arrow-produkbaru')"
                        class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                        <div class="flex items-center">
                            <i class="ph ph-cash-register mr-2"></i>
                            <span class="text-sm">Produk</span>
                        </div>
                        <i id="arrow-produkbaru"
                            class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
                    </button>

                    <!-- Sub Submenu Level 3 -->
                    <div id="submenu-produkbaru"
                        class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                        <a href="{{ route('products.create') }}"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-plus-circle mr-2 text-xs"></i>
                            Produk Baru
                        </a>

                        <a href="{{ route('products.index') }}"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Kelola Produk
                        </a>
                    </div>
                </div>

                <a href="{{ route('categories.index') }}" onclick="" id="nav-sales-list"
                    class="nav-item flex items-center px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                    <i class="ph ph-receipt mr-2"></i>
                    <span class="text-sm">Kategori Produk</span>
                </a>
                <a href="/warehouses" onclick="" id="nav-sales-list"
                    class="nav-item flex items-center px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                    <i class="ph ph-receipt mr-2"></i>
                    <span class="text-sm">Gudang</span>
                </a>
                <a href="/persediaan/transfer-stok" onclick="" id="nav-sales-list"
                    class="nav-item flex items-center px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                    <i class="ph ph-receipt mr-2"></i>
                    <span class="text-sm">Transfer Stok</span>
                </a>
                <div>
                    <button onclick="toggleSubmenu('submenu-pesanan', 'arrow-pesanan')"
                        class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                        <div class="flex items-center">
                            <i class="ph ph-cash-register mr-2"></i>
                            <span class="text-sm">Beli Produk</span>
                        </div>
                        <i id="arrow-pesanan"
                            class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
                    </button>

                    <!-- Sub Submenu Level 3 -->
                    <div id="submenu-pesanan"
                        class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                        <a href="{{ route('purchase-orders.create') }}"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-plus-circle mr-2 text-xs"></i>
                            Pesanan Baru
                        </a>

                        <a href="{{ route('purchase-orders.index') }}"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Kelola Pesanan
                        </a>
                    </div>
                </div>
                <div>
                    <button onclick="toggleSubmenu('submenu-retur', 'arrow-retur')"
                        class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                        <div class="flex items-center">
                            <i class="ph ph-cash-register mr-2"></i>
                            <span class="text-sm">Retur Stok</span>
                        </div>
                        <i id="arrow-retur"
                            class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
                    </button>

                    <!-- Sub Submenu Level 3 -->
                    <div id="submenu-retur"
                        class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                        <a href="{{ route('retur.index') }}"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-plus-circle mr-2 text-xs"></i>
                            Catatan Supplier
                        </a>

                        <a href="/persediaan/catatan-pelanggan"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Catatan Pelanggan
                        </a>
                    </div>
                </div>
                <div>
                    <button onclick="toggleSubmenu('submenu-supplier', 'arrow-supplier')"
                        class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                        <div class="flex items-center">
                            <i class="ph ph-cash-register mr-2"></i>
                            <span class="text-sm">Supplier</span>
                        </div>
                        <i id="arrow-supplier"
                            class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
                    </button>

                    <!-- Sub Submenu Level 3 -->
                    <div id="submenu-supplier"
                        class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                        <a href="{{ route('suppliers.create') }}"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-plus-circle mr-2 text-xs"></i>
                            Supplier Baru
                        </a>

                        <a href="{{ route('suppliers.index') }}"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Kelola Supplier
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pelanggan -->
        <div>
            <button onclick="toggleSubmenu('submenu-pelanggan', 'arrow-pelanggan')"
                class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                <div class="flex items-center">
                    <i class="ph ph-cash-register mr-2"></i>
                    <span class="text-sm">Pelanggan</span>
                </div>
                <i id="arrow-pelanggan" class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
            </button>

            <!-- Sub Submenu Level 3 -->
            <div id="submenu-pelanggan"
                class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                <a href="{{ route('customers.create') }}"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-plus-circle mr-2 text-xs"></i>
                    Pelanggan Baru
                </a>

                <a href="{{ route('customers.index') }}"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Kelola Pelanggan
                </a>
                <a href="/pelanggan/grup-pelanggan"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Grup Pelanggan
                </a>
            </div>
        </div>

        <!-- Accounts -->
        <div>
            <button onclick="toggleSubmenu('submenu-accounts', 'arrow-accounts')"
                class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                <div class="flex items-center">
                    <i class="ph ph-cash-register mr-2"></i>
                    <span class="text-sm">Accounts</span>
                </div>
                <i id="arrow-accounts" class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
            </button>

            <!-- Sub Submenu Level 3 -->
            <div id="submenu-accounts"
                class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                <div>
                    <button onclick="toggleSubmenu('submenu-accountsub', 'arrow-accountsub')"
                        class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                        <div class="flex items-center">
                            <i class="ph ph-cash-register mr-2"></i>
                            <span class="text-sm">Accounts</span>
                        </div>
                        <i id="arrow-accountsub"
                            class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
                    </button>

                    <!-- Sub Submenu Level 3 -->
                    <div id="submenu-accountsub"
                        class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                        <a href="/accounts/kelola-akun"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-plus-circle mr-2 text-xs"></i>
                            Mengelola Akun
                        </a>

                        <a href="/accounts/neraca-keuangan"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Neraca Keuangan
                        </a>

                        <a href="/accounts/laporan-akun"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Laporan Keuangan
                        </a>
                    </div>
                </div>

                <div>
                    <button onclick="toggleSubmenu('submenu-transaksi', 'arrow-transaksi')"
                        class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                        <div class="flex items-center">
                            <i class="ph ph-cash-register mr-2"></i>
                            <span class="text-sm">Transaksi</span>
                        </div>
                        <i id="arrow-transaksi"
                            class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
                    </button>

                    <!-- Sub Submenu Level 3 -->
                    <div id="submenu-transaksi"
                        class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                        <a href="/accounts/lihat-transaksi"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-plus-circle mr-2 text-xs"></i>
                            Lihat Transaksi
                        </a>

                        <a href="/accounts/transaksi-baru"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Transaksi Baru
                        </a>
                        <a href="/accounts/pemasukan"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Pemasukan
                        </a>
                        <a href="/accounts/biaya"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Biaya
                        </a>
                        <a href="/accounts/transaksi-pelanggan"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Transaksi Pelangggan
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Voucher -->
        <div>
            <button onclick="toggleSubmenu('submenu-voucher', 'arrow-voucher')"
                class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                <div class="flex items-center">
                    <i class="ph ph-cash-register mr-2"></i>
                    <span class="text-sm">Voucher</span>
                </div>
                <i id="arrow-voucher" class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
            </button>

            <!-- Sub Submenu Level 3 -->
            <div id="submenu-voucher"
                class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                <a href="/voucher/buat-voucher"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-plus-circle mr-2 text-xs"></i>
                    Voucher Baru
                </a>

                <a href="/voucher/kelola-voucher"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Kelola Voucher
                </a>
            </div>
        </div>

        <!-- Laporan -->
        <div>
            <button onclick="toggleSubmenu('submenu-laporan', 'arrow-laporan')"
                class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                <div class="flex items-center">
                    <i class="ph ph-cash-register mr-2"></i>
                    <span class="text-sm">Laporan</span>
                </div>
                <i id="arrow-laporan" class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
            </button>

            <!-- Sub Submenu Level 3 -->
            <div id="submenu-laporan"
                class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                <a href="/laporan/business-registers"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-plus-circle mr-2 text-xs"></i>
                    Business Registers
                </a>

                <div>
                    <button onclick="toggleSubmenu('submenu-laporan2', 'arrow-laporan2')"
                        class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                        <div class="flex items-center">
                            <i class="ph ph-cash-register mr-2"></i>
                            <span class="text-sm">Laporan</span>
                        </div>
                        <i id="arrow-laporan2"
                            class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
                    </button>

                    <!-- Sub Submenu Level 3 -->
                    <div id="submenu-laporan2"
                        class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                        <a href="/laporan/laporan-akun"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-plus-circle mr-2 text-xs"></i>
                            Laporan Akun
                        </a>

                        <a href="/laporan/laporan-akun-pelanggan"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Laporan Akun Pelanggan
                        </a>
                        <a href="/laporan/laporan-akun-supplier"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Laporan Akun Supplier
                        </a>
                        <a href="/laporan/laporan-pajak"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Laporan Pajak
                        </a>
                    </div>
                </div>

                <div>
                    <button onclick="toggleSubmenu('submenu-grafik', 'arrow-grafik')"
                        class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                        <div class="flex items-center">
                            <i class="ph ph-cash-register mr-2"></i>
                            <span class="text-sm">Laporan Grafik</span>
                        </div>
                        <i id="arrow-grafik"
                            class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
                    </button>

                    <!-- Sub Submenu Level 3 -->
                    <div id="submenu-grafik"
                        class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                        <a href="/laporan/kategori-produk"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-plus-circle mr-2 text-xs"></i>
                            Kategori Produk
                        </a>

                        <a href="/laporan/produk-populer"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Produk Populer
                        </a>
                        <a href="/laporan/keuntungan"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Keuntungan
                        </a>
                        <a href="/laporan/pelanggan-teratas"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Pelanggan Teratas
                        </a>
                        <a href="/laporan/penghasilan-vs-pengeluaran"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Penghasilan vs Pengeluaran
                        </a>
                        <a href="/laporan/pemasukan"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Pemasukan
                        </a>
                        <a href="/laporan/pengeluaran"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Pengeluaran
                        </a>
                    </div>
                </div>

                <div>
                    <button onclick="toggleSubmenu('submenu-summary', 'arrow-summary')"
                        class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                        <div class="flex items-center">
                            <i class="ph ph-cash-register mr-2"></i>
                            <span class="text-sm">Summary</span>
                        </div>
                        <i id="arrow-summary"
                            class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
                    </button>

                    <!-- Sub Submenu Level 3 -->
                    <div id="submenu-summary"
                        class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                        <a href="/summary/statistik"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-plus-circle mr-2 text-xs"></i>
                            Statistik
                        </a>

                        <a href="/summary/keuntungan"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Keuntungan
                        </a>
                        <a href="/summary/hitung-penghasilan"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Hitung Penghasilan
                        </a>
                        <a href="/summary/hitung-biaya"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Hitung Biaya
                        </a>
                        <a href="/summary/penjualan"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Penjualan
                        </a>
                        <a href="/summary/produk"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Produk
                        </a>
                        <a href="/summary/komisi-pegawai"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Komisi Pegawai
                        </a>
                    </div>
                </div>


            </div>
        </div>

        <div>
            <button onclick="toggleSubmenu('submenu-lain-lain', 'arrow-lain-lain')"
                class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                <div class="flex items-center">
                    <i class="ph ph-cash-register mr-2"></i>
                    <span class="text-sm">Lain lain</span>
                </div>
                <i id="arrow-lain-lain" class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
            </button>

            <!-- Sub Submenu Level 3 -->
            <div id="submenu-lain-lain"
                class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                <a href="/lainlain/catatan"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-plus-circle mr-2 text-xs"></i>
                    Catatan
                </a>

                <a href="/lainlain/kalender"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Kalender
                </a>
                <a href="/lainlain/dokumen"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Dokumen
                </a>
            </div>
        </div>

        <div>
            <button onclick="toggleSubmenu('submenu-hrm', 'arrow-hrm')"
                class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                <div class="flex items-center">
                    <i class="ph ph-cash-register mr-2"></i>
                    <span class="text-sm">HRM</span>
                </div>
                <i id="arrow-hrm" class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
            </button>

            <!-- Sub Submenu Level 3 -->
            <div id="submenu-hrm"
                class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                <div>
                    <button onclick="toggleSubmenu('submenu-karyawan', 'arrow-karyawan')"
                        class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                        <div class="flex items-center">
                            <i class="ph ph-cash-register mr-2"></i>
                            <span class="text-sm">Karyawan</span>
                        </div>
                        <i id="arrow-karyawan"
                            class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
                    </button>

                    <!-- Sub Submenu Level 3 -->
                    <div id="submenu-karyawan"
                        class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                        <a href="/hrm/karyawan"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-plus-circle mr-2 text-xs"></i>
                            Karyawan
                        </a>

                        <a href="/hrm/izin"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Izin
                        </a>
                        <a href="/hrm/gaji-karyawan"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Gaji Karyawan
                        </a>
                        <a href="/hrm/absensi"
                            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Absensi
                        </a>
                        <a href="/hrm/liburan
                            class="nav-item flex items-center px-4 py-1.5
                            text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                            <i class="ph ph-list-bullets mr-2 text-xs"></i>
                            Liburan
                        </a>
                    </div>
                </div>

                <a href="/hrm/departmen"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Departmen
                </a>
                <a href="/hrm/daftar-gaji"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Daftar Gaji
                </a>
            </div>
        </div>

        <div>
            <button onclick="toggleSubmenu('submenu-ekspor', 'arrow-ekspor')"
                class="w-full flex items-center justify-between px-4 py-2 text-slate-500 dark:text-slate-500 rounded-lg hover:text-primary dark:hover:text-primary transition-colors">
                <div class="flex items-center">
                    <i class="ph ph-cash-register mr-2"></i>
                    <span class="text-sm">Ekspor</span>
                </div>
                <i id="arrow-ekspor" class="ph ph-caret-down text-[10px] transition-transform duration-300"></i>
            </button>

            <!-- Sub Submenu Level 3 -->
            <div id="submenu-ekspor"
                class="submenu-transition space-y-1 pl-4 mt-1 border-l-2 border-slate-200 dark:border-slate-600 ml-4">

                <a href="/ekspor/ekspor-data-orang"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-plus-circle mr-2 text-xs"></i>
                    Ekspor Data Orang
                </a>

                <a href="/ekspor/transaksi-ekspor"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Transaksi Ekspor
                </a>
                <a href="/ekspor/produk-ekspor"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Produk Ekspor
                </a>
                <a href="/ekspor/laporan-akun"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Laporan Akun
                </a>
                <a href="/ekspor/ekspor-pajak"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Ekspor Pajak
                </a>
                <a href="/ekspor/backup-database"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Backup Database
                </a>
                <a href="/ekspor/produk-impor"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Produk Impor
                </a>
                <a href="/ekspor/pelanggan-impor"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Pelanggan Impor
                </a>
                <a href="/ekspor/pernyataan-akun-produk"
                    class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
                    <i class="ph ph-list-bullets mr-2 text-xs"></i>
                    Pernyataan Akun Produk
                </a>
            </div>
        </div>

        <a href="#"
            class="nav-item flex items-center px-4 py-1.5 text-slate-400 dark:text-slate-400 rounded-md hover:text-primary transition-colors text-sm">
            <i class="ph ph-plus-circle mr-2 text-xs"></i>
            Pengaturan
        </a>
    </nav>

    <!-- User Profile & Theme Toggle Sidebar Footer -->
    <div class="p-4 border-t border-slate-100 dark:border-slate-700 shrink-0">
        <div
            class="flex items-center gap-3 p-3 rounded-2xl bg-slate-50 dark:bg-slate-700/50 cursor-pointer hover:bg-slate-100 dark:hover:bg-slate-700 transition border border-transparent hover:border-slate-200 dark:hover:border-slate-600">
            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&q=80&w=100"
                alt="Admin"
                class="w-10 h-10 rounded-full object-cover border-2 border-white dark:border-slate-600 shadow-sm" />
            <div class="flex-1 min-w-0">
                <p class="text-sm font-bold text-slate-900 dark:text-white truncate font-display">
                    Sarah M.
                </p>
                <p class="text-xs text-slate-500 dark:text-slate-400 truncate">
                    Store Manager
                </p>
            </div>
            <i class="ph ph-caret-right text-slate-400"></i>
        </div>
    </div>
</aside>
