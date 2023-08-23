@props(['service'])
<div class="container p-5 my-2 card sm:p-10" id="{{ $service->slug }}">
    <div class="flex justify-between w-full">
        <p class="flex my-2">
            <x-heroicon-o-location-marker class="w-5 h-5 mr-3 text-gray-1" />
            {{ $service->city->name }}, {{ $service->county->name }}
        </p>
        <div class="flex my-2" onclick="copyToClipboard(this)" data-url='{{ URL::current() . '#' . $service->slug }}'>
            <x-heroicon-o-share class="w-5 h-5 mr-3 text-gray-1" />
            {{ __('txt.service_card.share') }}
        </div>
    </div>
    <h2 class="my-2 font-bold">{{ $service->project_name }}</h2>
    <div class="text-xl">
        {{ $service->name }}
    </div>
    <p class="mt-5 font-bold">{{ __('txt.service_card.budget') }} <span
            class="font-normal">{{ $service->budget }}</span>
    </p>
    <div class="flex flex-col w-full md:flex-row md:justify-between">
        <p class="w-full mt-5 font-bold md:w-1/4">{{ __('txt.service_card.disponibility') }} <span
                class="font-normal">{{ $service->duration }}</span></p>
        <p class="w-full mt-5 font-bold md:w-1/4">{{ __('txt.service_card.beneficiaries') }}
            @foreach ($service->beneficiaryGroup as $id => $group)
                <span class="font-normal">{{ $group->name }}</span>
                @if (!$loop->last)
                    ,
                @endif
            @endforeach
        </p>
        <p class="w-full mt-5 font-bold md:w-1/4">{{ __('txt.service_card.intervention_domains') }}
            @foreach ($service->interventionDomain as $id => $domain)
                <span class="font-normal">{{ $domain->name }}</span>
                @if (!$loop->last)
                    ,
                @endif
            @endforeach
    </div>
    <hr class="w-full my-10">
    <div class="flex flex-col justify-between w-full md:flex-row">
        @foreach ($service->application_methods as $method)
            @switch($method['type'])
                @case(\App\Enums\ServiceApplicationType::Online->value)
                    <x-cards.application_methods.online :method="$method" />
                @break

                @case(\App\Enums\ServiceApplicationType::Phone->value)
                    <x-cards.application_methods.phone :method="$method" />
                @break

                @case(\App\Enums\ServiceApplicationType::Physical->value)
                    <x-cards.application_methods.physical :method="$method" />
                @break
            @endswitch
        @endforeach
    </div>
    <hr class="w-full my-10">

    <h2 class="my-2 font-bold">{{ __('txt.service_card.how_help') }}</h2>
    <p>{{ __('txt.service_card.how_help_explain') }}</p>
    <a href="{{ $service->ngo->website }}" target="_blank"
        class="flex items-center justify-center w-1/2 h-12 my-2 mt-3 font-bold text-center text-black rounded-sm bg-orange-1 hover:bg-blue-1 md:w-1/4">{{ __('txt.buttons.access_site') }}</a>

</div>
