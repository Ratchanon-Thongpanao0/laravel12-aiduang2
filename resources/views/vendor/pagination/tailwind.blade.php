@if ($paginator->hasPages())
    <nav role="navigation" class="flex justify-center mt-6">
        <ul class="flex items-center gap-1 list-none">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-1.5 rounded-lg border border-slate-600 text-slate-500 select-none">«</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-3 py-1.5 rounded-lg border border-slate-600 bg-slate-800 hover:bg-slate-700 transition">
                        «
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="px-3 py-1.5 text-slate-500">{{ $element }}</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-3 py-1.5 rounded-lg border border-indigo-500 bg-indigo-600 text-white font-semibold select-none">
                                {{ $page }}
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-3 py-1.5 rounded-lg border border-slate-600 bg-slate-800 hover:bg-slate-700 transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-3 py-1.5 rounded-lg border border-slate-600 bg-slate-800 hover:bg-slate-700 transition">
                        »
                    </a>
                </li>
            @else
                <li class="px-3 py-1.5 rounded-lg border border-slate-600 text-slate-500 select-none">»</li>
            @endif
        </ul>
    </nav>
@endif
