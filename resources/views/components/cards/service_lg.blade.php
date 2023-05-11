@props(['service'])
<div class="card container my-2 p-5 sm:p-10" id="{{$service->slug}}">
    <div class="flex w-full justify-between">
        <p class="my-2 flex">
            <x-heroicon-o-location-marker class="mr-3 h-5 w-5 text-gray1"/>
            {{$service->city->name}}, {{$service->county->name}}
        </p>
        <div class="my-2 flex"  onclick="copyToClipboard(this)" data-url = '{{ URL::current().'#'.$service->slug}}'>
            <x-heroicon-o-share class="mr-3 h-5 w-5 text-gray1"/>
            {{ __('txt.service_card.share') }}
        </div>
    </div>
    <h2 class="my-2 font-bold">{{$service->project_name}}</h2>
    <div class="text-xl">
        {{$service->name}}
    </div>
    <p class="mt-5 font-bold">{{ __('txt.service_card.budget') }} <span class="font-normal">{{$service->budget}}</span>
    </p>
    <div class="flex w-full flex-col md:flex-row md:justify-between">
        <p class="mt-5 w-full font-bold md:w-1/4">{{ __('txt.service_card.disponibility') }} <span
                class="font-normal">{{$service->duration}}</span></p>
        <p class="mt-5 w-full font-bold md:w-1/4">{{ __('txt.service_card.beneficiaries') }}
            @foreach($service->beneficiaryGroup as $id=>$group)
                <span class="font-normal">{{$group->name}}</span>
                @if(!$loop->last)
                    ,
                @endif
            @endforeach
        </p>
        <p class="mt-5 w-full font-bold md:w-1/4">{{ __('txt.service_card.intervention_domains') }}
            @foreach($service->interventionDomain  as $id=>$domain)
                <span class="font-normal">{{$domain->name}}</span>
                @if(!$loop->last)
                    ,
                @endif
            @endforeach
    </div>
    <hr class="my-10 w-full">
    <div class="flex w-full flex-col justify-between md:flex-row">
        @foreach($service->application_methods as $method)
            @switch($method['type'])
                @case(\App\Enums\ServiceApplicationType::Online->value)
                    <x-cards.application_methods.online :method="$method"/>
                    @break
                @case(\App\Enums\ServiceApplicationType::Phone->value)
                    <x-cards.application_methods.phone :method="$method"/>
                    @break
                @case(\App\Enums\ServiceApplicationType::Physical->value)
                    <x-cards.application_methods.physical :method="$method"/>
                    @break
            @endswitch
        @endforeach
    </div>
    <hr class="my-10 w-full">

    <h2 class="my-2 font-bold">{{ __('txt.service_card.how_help') }}</h2>
    <p>{{ __('txt.service_card.how_help_explain') }}</p>
    <a href="{{$service->ngo->website}}" target="_blank"
        class="my-2 mt-3 h-12 w-1/2 rounded-sm flex justify-center  text-center items-center  bg-orange1 font-bold text-black hover:bg-blue1 md:w-1/4">{{ __('txt.buttons.access_site') }}</a>

</div>
