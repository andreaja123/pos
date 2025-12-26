<header
    class="h-20 glass border-b border-slate-200 dark:border-slate-700 flex items-center justify-between px-6 sticky top-0 z-10 transition-colors duration-300">
    <div class="flex items-center gap-4">
        <button onclick="toggleSidebar()"
            class=" p-2 text-slate-600 dark:text-slate-300
         hover:bg-slate-100 dark:hover:bg-slate-700
         rounded-xl transition-all duration-500">
            <i class="ph ph-list text-2xl"></i>
        </button>

        <div>
            {{-- <h2 id="page-title" class="text-2xl font-display font-bold text-slate-800 dark:text-white hidden sm:block">
                Dashboard
            </h2> --}}
            <p id="current-date" class="text-xs text-slate-500 dark:text-slate-400 hidden sm:block font-medium"></p>
        </div>
    </div>

    <div class="flex items-center gap-3 md:gap-4">
        <!-- Search Box -->
        <div
            class="hidden md:flex items-center bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl px-4 py-2.5 w-72 focus-within:ring-2 ring-primary/20 focus-within:border-primary transition-all shadow-sm">
            <i class="ph ph-magnifying-glass text-slate-400 text-lg"></i>
            <input type="text" placeholder="Cari pesanan, produk..."
                class="bg-transparent border-none text-sm ml-3 w-full focus:outline-none text-slate-700 dark:text-slate-200 placeholder-slate-400" />
            <span
                class="text-xs text-slate-400 border border-slate-200 dark:border-slate-600 rounded px-1.5 py-0.5">⌘K</span>
        </div>

        <!-- Theme Toggle Button -->
        <button onclick="toggleTheme()"
            class="p-2.5 rounded-xl text-slate-500 dark:text-yellow-400 hover:bg-slate-100 dark:hover:bg-slate-700 transition border border-transparent hover:border-slate-200 dark:hover:border-slate-600">
            <i id="theme-icon" class="ph-fill ph-sun text-xl"></i>
        </button>

        <!-- Notifications -->
        <button
            class="relative p-2.5 text-slate-500 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-xl transition border border-transparent hover:border-slate-200 dark:hover:border-slate-600">
            <i class="ph ph-bell text-xl"></i>
            <span
                class="absolute top-2.5 right-2.5 w-2 h-2 bg-red-500 rounded-full border-2 border-white dark:border-darkBg"></span>
        </button>
    </div>
</header>
