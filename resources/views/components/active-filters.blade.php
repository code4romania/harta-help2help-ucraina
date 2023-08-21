<div class="flex flex-wrap justify-between gap-4">
    <div class="">
        <h3 class="text-lg font-bold">{{ __('txt.filters.active') }}:</h3>

        @foreach ($activeFilters as $label => $value)
            <p>{{ $label }}: {{ $value }}</p>
        @endforeach
    </div>

    <a href="{{ url()->current() }}" class="flex gap-2 font-bold">
        <x-heroicon-o-x class="w-6 h-6 text-gray1" />
        {{ __('txt.filters.clear') }}
    </a>
</div>
