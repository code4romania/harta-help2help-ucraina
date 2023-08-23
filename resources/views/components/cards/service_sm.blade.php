@props(['service'])
<div class=" card my-2 p-5 sm:p-10  md:w-[48%] lg:w-[32%]">
    <img class="w-full"
        src="{{ $service->ngo->getFirstMediaUrl() ? $service->ngo->getFirstMediaUrl() : Vite::asset('resources/images/design/placeholder.png') }}"
        alt="{{ $service->ngo->name }}">
    <p class="flex my-2">
        <x-heroicon-o-location-marker class="w-5 h-5 mr-3 text-gray-1" />
        {{ $service->city->name }}, {{ $service->county->name }}
    </p>
    <h4 class="my-2 text-xl font-bold">{{ Str::limit($service->name, 60, '...') }}</h4>
    <p>{{ __('txt.service_card.provided_by') }} <span class="font-bold">{{ $service->ngo->name }}</span></p>
    <p>{{ __('txt.service_card.intervention_domains') }} @foreach ($service->interventionDomains as $id => $domain)
            <span class="font-normal">{{ $domain->name }}</span>
            @if (!$loop->last)
                ,
            @endif
        @endforeach
    </p>
    <p>{{ __('txt.service_card.beneficiary_type') }} @foreach ($service->beneficiaryGroup as $id => $group)
            <span class="font-normal">{{ $group->name }}</span>
            @if (!$loop->last)
                ,
            @endif
        @endforeach
    </p>
    @if ($service->status == 'finished')
        <p> {{ __('txt.service_card.project_finished') }}</p>
    @else
        <p>{{ __('txt.service_card.project_active') }}</p>
        <p><span class="font-bold">{{ __('txt.service_card.service_access') }} </span></p>
        <div class="flex flex-wrap justify-between w-full">
            @foreach ($service->application_methods as $method)
                <p class="flex">
                    <x-heroicon-o-check-circle class="w-5 h-5 mr-1 text-gray-1 fill-green-300" />
                    {{ __('txt.service_card.' . $method['type']) }}
                </p>
            @endforeach
        </div>
    @endif
    <a href="{{ localized_route('ngos.show', ['ngo' => $service->ngo]) . '#' . $service->slug }}"
        class="flex items-center justify-center w-full h-12 text-center text-black rounded-md bg-orange-1 hover:bg-blue-1">{{ __('txt.buttons.see_more') }}</a>
</div>
