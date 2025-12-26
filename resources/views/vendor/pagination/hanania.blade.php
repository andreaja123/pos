@if ($paginator->hasPages())
    <div class="flex items-center gap-2">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <button disabled
                class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-400 opacity-50">
                <i class="ph-bold ph-caret-left"></i>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 hover:bg-slate-50 transition">
                <i class="ph-bold ph-caret-left"></i>
            </a>
        @endif

        {{-- Page Numbers --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-3 py-2 text-slate-400">…</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span
                            class="px-3 py-2 rounded-lg bg-indigo-600 text-white font-bold text-sm shadow-md shadow-indigo-500/30">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                            class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 font-bold text-sm hover:bg-slate-50 transition">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 hover:bg-slate-50 transition">
                <i class="ph-bold ph-caret-right"></i>
            </a>
        @else
            <button disabled
                class="px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-400 opacity-50">
                <i class="ph-bold ph-caret-right"></i>
            </button>
        @endif

    </div>
@endif
