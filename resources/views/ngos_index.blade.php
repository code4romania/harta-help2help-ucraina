<x-layout>
    <x-slot:title>
        {{$ngo->name}}
    </x-slot:title>
    <div class=" md:ml-32 md:my-4">
        <x-breadcrumbs
            :items="$breadcrumbs"
            class="container md:col-span-2"
        />
    </div>

    <div class="container flex-col p-5 my-2 card md:flex-row sm:p-10">

        <div class="flex flex-col items-center self-center w-4/5 p-5 sm:w-2/3 md:w-1/3">
            <img class="w-full"
                 src="{{$ngo->getFirstMediaUrl()? $ngo->getFirstMediaUrl(): Vite::asset('resources/images/design/placeholder.png') }}"
                 alt="{{$ngo->name}}">
            <a href="{{$ngo->story?: '#'}}" target="_blank"
               class="flex items-center justify-center w-full h-12 my-2 mt-3 text-center text-black rounded-md bg-orange1 hover:bg-blue1">{{ __('txt.buttons.see_story') }}</a>
        </div>
        <div class="flex flex-col w-full p-5 md:w-2/3">
            <h2 class="my-2 font-bold">{{$ngo->name}}</h2>
            <div>{!! $ngo->description !!}</div>
            <p class="font-bold">{{ __('txt.ngo_card.activity_domains') }}

                @foreach($ngo->activity_domains_name as $key=>$value)
                    <span class="text-orange1">
                        {{$value}}
                        @if(!$loop->last)
                            ,
                        @endif
                    </span>
                @endforeach

            </p>
            <p class="font-bold">{{ __('txt.ngo_card.intervention_domains') }}
                @php $tmpDomains = []; @endphp
                @foreach($ngo->intervention_domains_name as $domain)
                            <span class="text-orange1">
                    {{$domain}}
                            </span>
                    @if(!$loop->last)
                        ,
                    @endif
                    @endforeach


            </p>
            <p class="font-bold">{{ __('txt.ngo_card.beneficiaries_nr') }} <span
                    class="text-orange1">{{$ngo->number_of_beneficiaries ?:'N/A'}}</span></p>

            <div class="flex flex-col sm:flex-row">
                <div class="flex flex-col w-full md:w-1/2 gap-2">
                    <p class="font-bold"> {{__('txt.placeholders.contact')}} </p>
                    <div class="flex items-center">
                        @svg('icon-Phone','w-50 h-50 mr-2')
                        <span class="flex self-center font-medium"> {{$ngo->phone}} </span>
                    </div>
                    <div class="flex items-center">
                        @svg('icon-Mail','w-50 h-50 mr-2')
                        <a href="mailto:{{ $ngo->contact_email }}" class="flex self-center font-medium hover:underline">
                            {{ $ngo->contact_email }}
                        </a>
                    </div>
                    <div class="flex items-center">
                        @svg('icon-Home','w-50 h-50 mr-2')
                        <address class="flex self-center font-medium not-italic">
                            {{$ngo->address}} {{$ngo->city?->name}} {{$ngo->county?->name}}
                        </address>
                    </div>
                    <div class="flex items-center">
                        @svg('icon-Globe','w-50 h-50 mr-2')
                        <a href="{{ $ngo->website }}" class="flex self-center font-medium hover:underline" target="_blank" rel="noopener">
                            {{ $ngo->website }}
                        </a>
                    </div>
                </div>
                <div class="flex flex-col w-full md:w-1/2">
                    <p class="font-bold">{{__('txt.placeholders.social_media')}}  </p>
                    @foreach ($ngo->social_icons as $platform => $url)
                        @continue(blank($url))
                        <a href="{{ $url }}" target="_blank" rel="noopener">
                            @svg("icon-{$platform}", 'w-50 h-50')
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container flex-col justify-start p-5 mx-auto my-2 md:flex-row sm:p-10 ">
        <h2 class="my-2 font-bold">{{ __('txt.placeholders.ong_services') }}</h2>
    </div>
    @foreach($ngo->services as $service)
        <x-cards.service_lg :service="$service"/>
    @endforeach
</x-layout>
