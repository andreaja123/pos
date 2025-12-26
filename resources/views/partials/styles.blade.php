    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hanania POS - Admin Panel</title>

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Sora & Manrope -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Sora:wght@100..800&display=swap"
        rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>


    <!-- Phosphor Icons (CDN) -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            darkMode: "class", // Mengaktifkan mode gelap manual
            theme: {
                extend: {
                    fontFamily: {
                        sans: ["Manrope", "sans-serif"],
                        display: ["Sora", "sans-serif"],
                    },
                    colors: {
                        primary: "#6366f1", // Indigo 500
                        primaryDark: "#4338ca", // Indigo 700
                        secondary: "#10B981", // Emerald 500
                        darkBg: "#0f172a", // Slate 900
                        darkCard: "#1e293b", // Slate 800
                    },
                    animation: {
                        float: "float 3s ease-in-out infinite",
                    },
                    keyframes: {
                        float: {
                            "0%, 100%": {
                                transform: "translateY(0)"
                            },
                            "50%": {
                                transform: "translateY(-5px)"
                            },
                        },
                    },
                },
            },
        };
    </script>

    <style>
        /* Custom Scrollbar Modern */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: #475569;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .hide-scroll::-webkit-scrollbar {
            display: none;
        }

        .hide-scroll {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Smooth Page Transition */
        .page-section {
            display: none;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .page-section.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        /* Glassmorphism Utilities */
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .dark .glass {
            background: rgba(30, 41, 59, 0.7);
        }

        /* Submenu Animation */
        .submenu-transition {
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }

        .submenu-open {
            max-height: 500px;
            opacity: 1;
        }

        .rotate-icon {
            transform: rotate(180deg);
        }
    </style>
