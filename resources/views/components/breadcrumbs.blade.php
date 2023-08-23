@props(['items'])

<nav {{ $attributes }}>
    <ol role="list" class="flex items-center max-w-full space-x-2">
        <li class="flex items-center">
            <a href="{{ localized_route('home') }}" class="text-gray-400 hover:text-gray-500">
                <x-heroicon-o-home class="w-5 h-5 shrink-0" />

                <span class="sr-only">Acasă</span>
            </a>
        </li>

        @foreach ($items as $item)
            <li class="flex items-center overflow-hidden ">
                <x-icon-right-arrow class="w-5 h-5 text-gray-200 fill-current shrink-0" />

                @if (array_key_exists('url', $item) && $item['url'])
                    <a href="{{ $item['url'] }}"
                        class="ml-2 text-sm font-medium text-gray-500 truncate hover:text-gray-700">
                        {{ $item['name'] }}
                    </a>
                @else
                    <span class="ml-2 text-sm font-medium text-gray-500 truncate">
                        {{ $item['name'] }}
                    </span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
