@props([
    'tag' => 'div',
    'header' => null,
    'footer' => null,
])

<{{ $tag }} {{ $attributes->class('overflow-hidden bg-white rounded-lg shadow-lg flex flex-col') }}>
    @if ($header)
        <div class="px-4 py-5 !pb-0 sm:p-6 md:p-10">
            {{ $header }}
        </div>
    @endif

    <div class="flex-1 px-4 py-5 sm:p-6 md:p-10">
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="px-4 pb-5 !pt-0 sm:p-6 md:p-10">
            {{ $footer }}
        </div>
    @endif
    </{{ $tag }}>
