@props(['service'])

<x-cards.base {{ $attributes->class('text-gray-900')->merge([
    'tag' => 'article',
    'id' => $service->slug,
]) }}>
    <div class="flex flex-wrap items-center justify-between w-full gap-4 mb-2 sm:flex-nowrap">
        <div class="flex items-center gap-2 text-gray-600">
            <x-heroicon-s-location-marker class="w-4 h-4" />
            <span class="font-semibold">{{ $service->city->name }}, {{ $service->county->name }}</span>
        </div>
        <button type="button" class="flex items-center" onclick="copyToClipboard( @js(URL::current() . '#' . $service->slug) )">
            <x-heroicon-s-share class="w-5 h-5 mr-3 text-gray-600" />
            {{ __('txt.service_card.share') }}
        </button>
    </div>

    <h2 class="mb-0 font-bold md:text-lg">
        {{ $service->project_name }}
    </h2>

    <h1 class="mb-8 text-lg font-bold md:text-xl">
        {{ $service->name }}
    </h1>

    <dl class="grid gap-8 md:grid-cols-3">
        <div class="md:col-span-3">
            <dt class="font-semibold">{{ __('txt.service_card.budget') }}</dt>
            <dd class="">{{ $service->budget }}</dd>
        </div>

        <div>
            <dt class="font-semibold">{{ __('txt.service_card.disponibility') }}</dt>
            <dd class="">{{ $service->duration }}</dd>
        </div>
        <div>
            <dt class="font-semibold">{{ __('txt.service_card.beneficiary_type') }}</dt>
            <dd class="">{{ $service->beneficiary_groups_list }}</dd>
        </div>

        <div>
            <dt class="font-semibold">{{ __('txt.service_card.intervention_domains') }}</dt>
            <dd class="">{{ $service->intervention_domains_list }}</dd>
        </div>
    </dl>

    @if ($service->application_methods->isNotEmpty())

        <hr class="my-10">

        <div class="grid items-start gap-8 md:grid-cols-3">
            @foreach ($service->application_methods as $method)
                <x-dynamic-component :component="'cards.application_methods.' . $method['type']" :method="$method" />
            @endforeach
        </div>
    @endif

    @if ($service->ngo->website)
        <hr class="my-10">

        <aside class="">
            <h2 class="mb-0 text-xl font-medium md:text-3xl">{{ __('txt.service_card.how_help') }}</h2>
            <p class="text-gray-500">{{ __('txt.service_card.how_help_explain') }}</p>

            <a href="{{ $service->ngo->website }}" target="_blank"
                class="inline-flex items-center justify-center px-6 py-3 mt-3 font-bold text-center text-gray-900 rounded bg-orange-1 hover:bg-blue-1 whitespace-nowrap">
                {{ __('txt.buttons.access_site') }}
            </a>
        </aside>
    @endif
</x-cards.base>
