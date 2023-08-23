@props(['point'])

<div class="flex hidden w-full mx-2 card md:w-1/2 point-services" id="point-id-{{ $point->id }}">
    <x-heroicon-o-x class="self-end w-10 h-10 text-gray-1" onclick="hideAllPoints()" />
    <img class="w-64 mx-auto"
        src="{{ $point->ngo->getFirstMediaUrl() ? $point->ngo->getFirstMediaUrl() : Vite::asset('resources/images/design/placeholder.png') }}"
        alt="{{ $point->ngo->name }}">
    <p class="flex my-2">
        <x-heroicon-o-location-marker class="w-5 h-5 mr-3 text-gray-1" />
        {{ $point->city->name }}, {{ $point->county->name }}
    </p>
    <h4 class="my-2 text-xl font-bold">{{ Str::limit($point->name, 220, '...') }}</h4>
    <p><span class="font-bold">{{ __('txt.service_card.provided_by') }} </span>{{ $point->ngo->name }}</p>
    <p><span class="font-bold">{{ __('txt.service_card.intervention_domains') }}</span>
        @foreach ($point->interventionDomain as $id => $domain)
            <span class="font-normal">{{ $domain->name }}</span>
            @if (!$loop->last)
                ,
            @endif
        @endforeach
    </p>
    <p><span class="font-bold">{{ __('txt.service_card.beneficiary_type') }}</span>
        @foreach ($point->beneficiaryGroup as $id => $group)
            <span class="font-normal">{{ $group->name }}</span>
            @if (!$loop->last)
                ,
            @endif
        @endforeach
    </p>
    @if ($point->status == 'finished')
        <p> {{ __('txt.service_card.project_finished') }}</p>
    @else
        <p>{{ __('txt.service_card.project_active') }}</p>
        <p><span class="font-bold">{{ __('txt.service_card.service_access') }} </span></p>
        <div class="flex flex-wrap justify-between w-full">
            @foreach ($point->application_methods as $method)
                <p class="flex">
                    <x-heroicon-o-check-circle class="w-5 h-5 mr-1 text-gray-1 fill-green-300" />
                    {{ __('txt.service_card.' . $method['type']) }}
                </p>
            @endforeach
        </div>
    @endif
    <a href="{{ localized_route('ngo.index', ['ngo' => $point->ngo]) . '#' . $point->slug }}"
        class="flex items-center justify-center w-full h-12 text-center text-black rounded-md bg-orange-1 hover:bg-blue-1">{{ __('txt.buttons.see_more') }}</a>
</div>
