<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title', 'Hanania POS - Admin Panel')</title>

    {{-- Styles --}}
    @include('partials.styles')
</head>

<body
    class="bg-slate-50 dark:bg-darkBg text-slate-800 dark:text-slate-200 font-sans antialiased overflow-hidden h-screen flex transition-colors duration-300">
    {{-- SIDEBAR --}}
    @include('partials.sidebar')

    {{-- Overlay Mobile --}}
    <div id="sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/40 z-20 hidden md:hidden">
    </div>


    {{-- MAIN --}}
    <main class="flex-1 flex flex-col min-w-0 bg-slate-50 dark:bg-darkBg h-full relative transition-colors duration-300">
        {{-- HEADER --}}
        @include('partials.header')

        {{-- CONTENT --}}
        <div class="flex-1 overflow-auto p-4 md:p-6 lg:p-8 scroll-smooth relative">
            @yield('content')
        </div>
    </main>

    {{-- Scripts --}}
    @include('partials.scripts')
</body>

</html>
