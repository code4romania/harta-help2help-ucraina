@if ($paginator->hasPages())
    <nav class="flex flex-wrap justify-center w-full gap-2 my-16">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}" aria-hidden="true"
                class="inline-flex items-center justify-center w-8 h-8 leading-none text-gray-900 rounded-full cursor-default">
                <x-heroicon-s-chevron-left class="w-5 h-5" />
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="inline-flex items-center justify-center w-8 h-8 leading-none text-center text-gray-700 rounded-full hover:bg-blue-1 focus:z-10 focus:outline-none active:bg-orange-1"
                aria-label="{{ __('pagination.previous') }}">
                <x-heroicon-s-chevron-left class="w-5 h-5" />
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span aria-disabled="true"
                    class="inline-flex items-center justify-center w-8 h-8 leading-none text-gray-900 rounded-full cursor-default">
                    {{ $element }}
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page"
                            class="inline-flex items-center justify-center w-8 h-8 leading-none text-gray-900 rounded-full cursor-default bg-orange-1">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                            class="inline-flex items-center justify-center w-8 h-8 leading-none text-center text-gray-700 rounded-full hover:bg-blue-1 focus:z-10 focus:outline-none active:bg-orange-1"
                            aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="inline-flex items-center justify-center w-8 h-8 leading-none text-center text-gray-700 rounded-full hover:bg-blue-1 focus:z-10 focus:outline-none active:bg-orange-1"
                aria-label="{{ __('pagination.next') }}">
                <x-heroicon-s-chevron-right class="w-5 h-5" />
            </a>
        @else
            <span aria-disabled="true" aria-label="{{ __('pagination.next') }}" aria-hidden="true"
                class="inline-flex items-center justify-center w-8 h-8 leading-none text-gray-900 rounded-full cursor-default">
                <x-heroicon-s-chevron-right class="w-5 h-5" />
            </span>
        @endif
    </nav>
@endif
