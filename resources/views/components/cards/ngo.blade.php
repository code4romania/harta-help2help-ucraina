@props(['ngo'])

<x-cards.base {{ $attributes->class('text-gray-900')->merge([
    'tag' => 'article',
]) }}>
    <div class="flex items-center justify-center w-24 h-24 mb-6">
        <img class="object-contain"
            src="{{ $ngo->getFirstMediaUrl() ?: Vite::asset('resources/images/design/placeholder.png') }}"
            alt="{{ $ngo->name }}">
    </div>

    <h1 class="mb-2 text-lg font-bold md:text-xl">
        {{ $ngo->name }}
    </h1>

    <div class="prose line-clamp-4">
        {!! $ngo->description !!}
    </div>

    <x-slot:footer>
        <a href="{{ localized_route('ngos.show', ['ngo' => $ngo]) }}"
            class="flex items-center justify-center w-full h-12 text-center text-black rounded-md bg-orange-1 hover:bg-blue-1">
            {{ __('txt.buttons.see_more') }}
        </a>
    </x-slot:footer>
</x-cards.base>
