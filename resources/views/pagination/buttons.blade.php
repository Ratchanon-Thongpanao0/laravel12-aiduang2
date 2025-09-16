@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="mt-6">
        {{-- คอนเทนเนอร์กันหักบรรทัด + ลากได้ถ้าจอแคบ --}}
        <div class="flex justify-center overflow-x-auto">
            <ul
                class="inline-flex items-center gap-1 text-sm whitespace-nowrap"
                style="list-style:none;padding-left:0;margin:0"  {{-- บังคับไม่ให้มี bullet และจัดให้อยู่บรรทัดเดียว --}}
            >
                {{-- Prev --}}
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

                {{-- Numbers --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="px-3 py-1.5 text-slate-500">{{ $element }}</li>
                    @endif

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

                {{-- Next --}}
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
        </div>
    </nav>
@endif