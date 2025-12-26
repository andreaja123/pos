<script>
    // --- DATA PRODUK (DIPERBANYAK) ---
    const products = [
        // Atasan
        {
            id: 1,
            name: "Kemeja Linen Premium",
            category: "atasan",
            price: 299000,
            image: "https://images.unsplash.com/photo-1596755094514-f87e34085b2c?auto=format&fit=crop&q=80&w=400",
        },
        {
            id: 2,
            name: "T-Shirt Oversized Black",
            category: "atasan",
            price: 149000,
            image: "https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?auto=format&fit=crop&q=80&w=400",
        },
        {
            id: 7,
            name: "Summer Floral Blouse",
            category: "atasan",
            price: 225000,
            image: "https://images.unsplash.com/photo-1564257631407-4deb1f99d992?auto=format&fit=crop&q=80&w=400",
        },
        {
            id: 9,
            name: "Polo Shirt Classic",
            category: "atasan",
            price: 189000,
            image: "https://images.unsplash.com/photo-1581655353564-df123a1eb820?auto=format&fit=crop&q=80&w=400",
        },
        {
            id: 10,
            name: "Crop Top Hoodie",
            category: "atasan",
            price: 175000,
            image: "https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&q=80&w=400",
        },

        // Bawahan
        {
            id: 3,
            name: "Chino Slim Fit Beige",
            category: "bawahan",
            price: 349000,
            image: "https://images.unsplash.com/photo-1473966968600-fa801b869a1a?auto=format&fit=crop&q=80&w=400",
        },
        {
            id: 6,
            name: "Rok Plisket Navy",
            category: "bawahan",
            price: 189000,
            image: "https://images.unsplash.com/photo-1582142407894-ec85f1260a02?auto=format&fit=crop&q=80&w=400",
        },
        {
            id: 8,
            name: "Jeans Ripped Style",
            category: "bawahan",
            price: 429000,
            image: "https://images.unsplash.com/photo-1541099649105-f69ad21f3246?auto=format&fit=crop&q=80&w=400",
        },
        {
            id: 11,
            name: "Cargo Pants Army",
            category: "bawahan",
            price: 379000,
            image: "https://images.unsplash.com/photo-1517445312582-06b9b06cb5db?auto=format&fit=crop&q=80&w=400",
        },

        // Sepatu (Kategori Baru)
        {
            id: 12,
            name: "Nike Air Max 97",
            category: "sepatu",
            price: 1850000,
            image: "https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&q=80&w=400",
        },
        {
            id: 13,
            name: "Converse High Top",
            category: "sepatu",
            price: 899000,
            image: "https://images.unsplash.com/photo-1491553895911-0055eca6402d?auto=format&fit=crop&q=80&w=400",
        },
        {
            id: 14,
            name: "Leather Loafers",
            category: "sepatu",
            price: 650000,
            image: "https://images.unsplash.com/photo-1614252369475-531eba835eb1?auto=format&fit=crop&q=80&w=400",
        },

        // Aksesoris (Kategori Baru)
        {
            id: 15,
            name: "Leather Tote Bag",
            category: "aksesoris",
            price: 1250000,
            image: "https://images.unsplash.com/photo-1590874103328-eac38a683ce7?auto=format&fit=crop&q=80&w=400",
        },
        {
            id: 16,
            name: "Minimalist Watch",
            category: "aksesoris",
            price: 1500000,
            image: "https://images.unsplash.com/photo-1524592094714-0f0654e20314?auto=format&fit=crop&q=80&w=400",
        },

        // Outerwear
        {
            id: 4,
            name: "Denim Jacket Vtg",
            category: "atasan",
            price: 549000,
            image: "https://images.unsplash.com/photo-1576871337622-98d48d1cf531?auto=format&fit=crop&q=80&w=400",
        },
        {
            id: 5,
            name: "Knitted Sweater",
            category: "atasan",
            price: 299000,
            image: "https://images.unsplash.com/photo-1620799140408-ed5341cd2431?auto=format&fit=crop&q=80&w=400",
        },
    ];

    let cart = [];

    // --- THEME LOGIC ---
    function toggleTheme() {
        const html = document.documentElement;
        const icon = document.getElementById("theme-icon");

        if (html.classList.contains("dark")) {
            html.classList.remove("dark");
            icon.classList.remove("ph-moon");
            icon.classList.add("ph-sun");
            localStorage.setItem("theme", "light");
        } else {
            html.classList.add("dark");
            icon.classList.remove("ph-sun");
            icon.classList.add("ph-moon");
            localStorage.setItem("theme", "dark");
        }
    }

    function initTheme() {
        const savedTheme = localStorage.getItem("theme");
        const icon = document.getElementById("theme-icon");

        if (
            savedTheme === "dark" ||
            (!savedTheme &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            document.documentElement.classList.add("dark");
            icon.classList.remove("ph-sun");
            icon.classList.add("ph-moon");
        } else {
            document.documentElement.classList.remove("dark");
            icon.classList.remove("ph-sun");
            icon.classList.add("ph-sun"); // Default sun
        }
    }

    // --- SUBMENU LOGIC ---
    function toggleSubmenu(menuId, arrowId) {
        const submenu = document.getElementById(menuId);
        const arrow = document.getElementById(arrowId);

        if (submenu.classList.contains("submenu-open")) {
            submenu.classList.remove("submenu-open");
            arrow.classList.remove("rotate-icon");
        } else {
            submenu.classList.add("submenu-open");
            arrow.classList.add("rotate-icon");
        }
    }

    // --- NAVIGASI & UI LOGIC ---
    function switchTab(tabId) {
        document
            .querySelectorAll(".page-section")
            .forEach((el) => el.classList.remove("active"));
        document.getElementById(tabId).classList.add("active");

        // Map IDs to Title
        const titles = {
            dashboard: "Dashboard",
            pos: "Kasir / POS",
            products: "Persediaan",
            "sales-list": "Riwayat Penjualan",
        };
        // Default title fallback
        document.getElementById("page-title").innerText =
            titles[tabId] || tabId.charAt(0).toUpperCase() + tabId.slice(1);

        document.querySelectorAll(".nav-item").forEach((el) => {
            el.classList.remove(
                "bg-slate-50",
                "dark:bg-slate-700",
                "text-primary",
                "dark:text-primary"
            );
            // Reset to default
            el.classList.add("text-slate-600", "dark:text-slate-400");
        });

        // Highlight active
        const activeNav = document.getElementById("nav-" + tabId);
        if (activeNav) {
            activeNav.classList.remove("text-slate-600", "dark:text-slate-400");
            // Use lighter highlight for submenu items or same for main
            if (tabId === "pos" || tabId === "sales-list") {
                activeNav.classList.add(
                    "text-primary",
                    "dark:text-primary",
                    "font-bold"
                );
            } else {
                activeNav.classList.add(
                    "bg-slate-50",
                    "dark:bg-slate-700",
                    "text-primary",
                    "dark:text-primary"
                );
            }
        }

        // Auto open submenu if a child is active
        if (tabId === "pos" || tabId === "sales-list") {
            const submenu = document.getElementById("submenu-penjualan");
            const arrow = document.getElementById("arrow-penjualan");
            if (!submenu.classList.contains("submenu-open")) {
                submenu.classList.add("submenu-open");
                arrow.classList.add("rotate-icon");
            }
        }

        if (
            window.innerWidth < 768 &&
            !document.getElementById("sidebar").classList.contains("hidden")
        ) {
            toggleSidebar();
        }
    }

    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("sidebar-overlay");

        sidebar.classList.toggle("hidden");
        if (window.innerWidth < 768) {
            sidebar.classList.toggle("absolute");
            sidebar.classList.toggle("h-full");
            overlay.classList.toggle("hidden");
        }
    }

    // --- POS LOGIC ---
    function formatRupiah(number) {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
        }).format(number);
    }

    function renderProducts(filter = "all", searchQuery = "") {
        const grid = document.getElementById("product-grid");
        grid.innerHTML = "";

        const filtered = products.filter((p) => {
            const matchCat = filter === "all" || p.category === filter;
            const matchSearch = p.name
                .toLowerCase()
                .includes(searchQuery.toLowerCase());
            return matchCat && matchSearch;
        });

        filtered.forEach((product, index) => {
            const delay = index * 50; // Staggered animation
            const card = `
                    <div onclick="addToCart(${
                      product.id
                    })" class="group bg-white dark:bg-darkCard rounded-2xl border border-slate-100 dark:border-slate-700 p-3 hover:shadow-xl hover:shadow-primary/10 hover:border-primary/50 dark:hover:border-primary/50 cursor-pointer transition-all duration-300 relative overflow-hidden animate-[fadeIn_0.5s_ease-out_forwards]" style="animation-delay: ${delay}ms">
                        <div class="aspect-[1/1] rounded-xl overflow-hidden bg-slate-100 dark:bg-slate-800 mb-3 relative">
                            <img src="${product.image}" alt="${
            product.name
          }" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors"></div>
                            <button class="absolute bottom-3 right-3 w-10 h-10 bg-white dark:bg-slate-800 rounded-full shadow-lg text-primary flex items-center justify-center opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 hover:bg-primary hover:text-white">
                                <i class="ph-bold ph-plus text-lg"></i>
                            </button>
                        </div>
                        <h4 class="font-bold text-slate-800 dark:text-slate-100 text-sm truncate font-display mb-1">${
                          product.name
                        }</h4>
                        <div class="flex justify-between items-center">
                            <p class="text-[10px] text-slate-500 dark:text-slate-400 uppercase tracking-wider font-bold">${
                              product.category
                            }</p>
                            <p class="text-primary font-bold text-sm font-mono">${formatRupiah(
                              product.price
                            )}</p>
                        </div>
                    </div>
                `;
            grid.innerHTML += card;
        });
    }

    function addToCart(productId) {
        const product = products.find((p) => p.id === productId);
        const existingItem = cart.find((item) => item.id === productId);

        if (existingItem) {
            existingItem.qty++;
        } else {
            cart.push({
                ...product,
                qty: 1
            });
        }
        renderCart();
    }

    function updateQty(productId, change) {
        const item = cart.find((i) => i.id === productId);
        if (item) {
            item.qty += change;
            if (item.qty <= 0) {
                cart = cart.filter((i) => i.id !== productId);
            }
        }
        renderCart();
    }

    function renderCart() {
        const container = document.getElementById("cart-items");
        const emptyState = document.getElementById("empty-cart");

        if (cart.length === 0) {
            container.innerHTML = "";
            container.appendChild(emptyState);
            emptyState.style.display = "flex";
            updateTotals();
            return;
        }

        emptyState.style.display = "none";
        container.innerHTML = "";

        cart.forEach((item) => {
            const html = `
                    <div class="flex gap-4 p-3 rounded-2xl bg-white dark:bg-slate-800 border border-slate-100 dark:border-slate-700 animate-[fadeIn_0.2s_ease-out] group hover:border-primary/30 transition-colors">
                        <img src="${
                          item.image
                        }" class="w-16 h-16 rounded-xl object-cover bg-slate-100 dark:bg-slate-700">
                        <div class="flex-1 min-w-0 flex flex-col justify-between py-0.5">
                            <div>
                                <h5 class="text-sm font-bold text-slate-800 dark:text-white truncate font-display">${
                                  item.name
                                }</h5>
                                <p class="text-xs text-slate-500 dark:text-slate-400 font-mono mt-0.5">${formatRupiah(
                                  item.price
                                )}</p>
                            </div>
                            <div class="flex items-center justify-between mt-2">
                                <div class="flex items-center gap-2 bg-slate-100 dark:bg-slate-700/50 rounded-lg p-1">
                                    <button onclick="updateQty(${
                                      item.id
                                    }, -1)" class="w-6 h-6 flex items-center justify-center bg-white dark:bg-slate-600 rounded-md shadow-sm text-slate-600 dark:text-slate-200 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/30 transition"><i class="ph-bold ph-minus text-xs"></i></button>
                                    <span class="text-xs font-bold w-4 text-center text-slate-800 dark:text-white">${
                                      item.qty
                                    }</span>
                                    <button onclick="updateQty(${
                                      item.id
                                    }, 1)" class="w-6 h-6 flex items-center justify-center bg-white dark:bg-slate-600 rounded-md shadow-sm text-slate-600 dark:text-slate-200 hover:text-emerald-500 hover:bg-emerald-50 dark:hover:bg-emerald-900/30 transition"><i class="ph-bold ph-plus text-xs"></i></button>
                                </div>
                                <span class="text-sm font-bold text-slate-900 dark:text-white font-mono">${formatRupiah(
                                  item.price * item.qty
                                )}</span>
                            </div>
                        </div>
                    </div>
                `;
            container.innerHTML += html;
        });
        updateTotals();
    }

    function updateTotals() {
        const subtotal = cart.reduce(
            (sum, item) => sum + item.price * item.qty,
            0
        );
        const tax = subtotal * 0.11;
        const total = subtotal + tax;

        document.getElementById("cart-subtotal").innerText =
            formatRupiah(subtotal);
        document.getElementById("cart-tax").innerText = formatRupiah(tax);
        document.getElementById("cart-total").innerText = formatRupiah(total);
    }

    function filterProducts(category) {
        // Update UI buttons
        document.querySelectorAll(".filter-btn").forEach((btn) => {
            // Reset styles
            btn.classList.remove(
                "bg-slate-900",
                "dark:bg-primary",
                "text-white",
                "shadow-lg",
                "shadow-slate-900/20"
            );
            btn.classList.add(
                "bg-slate-100",
                "dark:bg-slate-700",
                "text-slate-600",
                "dark:text-slate-300"
            );
        });

        // Activate clicked button
        const clickedBtn = event.target;
        clickedBtn.classList.remove(
            "bg-slate-100",
            "dark:bg-slate-700",
            "text-slate-600",
            "dark:text-slate-300"
        );
        clickedBtn.classList.add(
            "bg-slate-900",
            "dark:bg-primary",
            "text-white",
            "shadow-lg",
            "shadow-slate-900/20"
        );

        renderProducts(
            category,
            document.getElementById("product-search").value
        );
    }

    document
        .getElementById("product-search")
        .addEventListener("input", (e) => {
            const activeBtn = document.querySelector(".filter-btn.text-white"); // Simple identifier
            const categoryText = activeBtn.innerText.toLowerCase();
            const category = categoryText === "semua" ? "all" : categoryText;
            renderProducts(category, e.target.value);
        });

    function processCheckout() {
        if (cart.length === 0) {
            // Shake animation for empty cart feedback could go here
            alert("Ops! Keranjang belanja masih kosong.");
            return;
        }
        if (
            confirm(
                `Total: ${
              document.getElementById("cart-total").innerText
            }\nLanjutkan pembayaran?`
            )
        ) {
            alert(
                "Pembayaran Berhasil! 🚀\nStruk telah dikirim ke email pelanggan."
            );
            cart = [];
            renderCart();
        }
    }

    function updateDate() {
        const now = new Date();
        const options = {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
        };
        document.getElementById("current-date").innerText =
            now.toLocaleDateString("id-ID", options);
    }

    // --- INIT ---
    window.onload = function() {
        initTheme();
        renderProducts();
        switchTab("dashboard");
        updateDate();
    };
</script>
