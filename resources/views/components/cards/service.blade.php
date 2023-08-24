@props(['service'])

<x-cards.base {{ $attributes->class('text-gray-900')->merge([
    'tag' => 'article',
]) }}>
    <div class="flex items-center justify-center w-24 h-24 mb-6">
        <img class="object-contain"
            src="{{ $service->ngo->getFirstMediaUrl() ?: Vite::asset('resources/images/design/placeholder.png') }}"
            alt="{{ $service->ngo->name }}">
    </div>

    <p class="flex items-center gap-1 text-gray-400">
        <x-heroicon-s-location-marker class="w-4 h-4" />
        <span>
            {{ $service->city->name }}, {{ $service->county->name }}
        </span>
    </p>

    <h1 class="mb-2 text-lg font-bold md:text-xl">
        {{ $service->name }}
    </h1>

    <h2 class="mb-4 text-lg font-bold md:text-xl">
        {{ $service->project_name }}
    </h2>

    <p>
        <span>{{ __('txt.service_card.provided_by') }}</span>
        <span class="font-semibold">{{ $service->ngo->name }}</span>
    </p>

    <p class="text-gray-500">
        <span>{{ __('txt.service_card.intervention_domains') }}</span>
        <span class="font-semibold">{{ $service->intervention_domains_list }}</span>
    </p>

    <p>
        <span>{{ __('txt.service_card.beneficiary_type') }}</span>
        <span>{{ $service->beneficiary_groups_list }}</span>
    </p>

    @if ($service->isActive())
        <p>{{ __('txt.service_card.project_active') }}</p>
        <p class="font-semibold">{{ __('txt.service_card.service_access') }}</p>
        <div class="flex flex-wrap gap-3 mt-4">
            @foreach ($service->application_methods as $method)
                <span class="inline-flex items-center gap-1 text-sm">
                    <x-heroicon-s-check-circle class="w-4 h-4 text-green-500" />
                    <span>{{ __('txt.service_card.' . $method['type']) }}</span>
                </span>
            @endforeach
        </div>
    @else
        <p> {{ __('txt.service_card.project_finished') }}</p>
    @endif

    <x-slot:footer>
        <a href="{{ localized_route('ngos.show', ['ngo' => $service->ngo]) }}#{{ $service->slug }}"
            class="flex items-center justify-center w-full h-12 text-center text-black rounded-md bg-orange-1 hover:bg-blue-1">
            {{ __('txt.buttons.see_more') }}
        </a>
    </x-slot:footer>
</x-cards.base>
