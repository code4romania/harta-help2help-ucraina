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

    <div class="container card flex-col md:flex-row my-2 p-5 sm:p-10  ">

        <div class=" w-4/5 sm:w-2/3 md:w-1/3 flex flex-col p-5 self-center items-center">
            <img class="w-full"
                 src="{{$ngo->getFirstMediaUrl()? $ngo->getFirstMediaUrl(): Vite::asset('resources/images/design/placeholder.png') }}"
                 alt="{{$ngo->name}}">
            <a href="{{$ngo->story?: '#'}}" target="_blank"
               class="my-2 mt-3 h-12 flex justify-center  text-center items-center  w-full bg-orange1  text-black rounded-md hover:bg-blue1">{{ __('txt.buttons.see_story') }}</a>
        </div>
        <div class="w-full md:w-2/3 flex flex-col p-5">
            <h2 class="my-2  font-bold">{{$ngo->name}}</h2>
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
                @foreach($ngo->services as $service)
                    @foreach($service->interventionDomain as $domain)
                        @if(!in_array($domain->id,$tmpDomains))
                            @php $tmpDomains[] = $domain->id;
                            @endphp
                            <span class="text-orange1">
                    {{ $domain->name }}
                </span>
                        @endif
                    @endforeach
                    @if(!$loop->last)
                        ,
                    @endif
                @endforeach

            </p>
            <p class="font-bold">{{ __('txt.ngo_card.beneficiaries_nr') }} <span
                    class="text-orange1">{{$ngo->number_of_beneficiaries ?:'N/A'}}</span></p>

            <div class="flex flex-col sm:flex-row">
                <div class="w-full md:w-1/2 flex flex-col">
                    <p class="font-medium"> {{__('txt.placeholders.contact')}} </p>
                    <div class="flex items-center">
                        @svg('icon-Phone','w-50 h-50 mr-2')
                        <p class="font-medium flex self-center"> {{$ngo->phone}} </p>
                    </div>
                    <div class="flex items-center">
                        @svg('icon-Mail','w-50 h-50 mr-2')
                        <p class="font-medium flex self-center"> {{$ngo->contact_email}} </p>
                    </div>
                    <div class="flex items-center">
                        @svg('icon-Home','w-50 h-50 mr-2')
                        <p class="font-medium flex self-center"> {{$ngo->address}} {{$ngo->city?->name}} {{$ngo->county?->name}} </p>
                    </div>
                    <div class="flex items-center">
                        @svg('icon-Globe','w-50 h-50 mr-2')
                        <p class="font-medium flex self-center"> {{$ngo->website}} </p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 flex flex-col">
                    <p class="font-medium">{{__('txt.placeholders.social_media')}}  </p>
                    <a href="{{isset($ngo->social_icons['url'])?$ngo->social_icons['url']:'#'}}" target="_blank"><p
                            class="font-medium"> @svg('icon-facebook','w-50 h-50')</p></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container justify-start mx-auto flex-col md:flex-row my-2 p-5 sm:p-10  ">
        <h2 class="my-2  font-bold">{{ __('txt.placeholders.ong_services') }}</h2>
    </div>
    @foreach($ngo->services as $service)
        <x-cards.service_lg :service="$service"/>
    @endforeach
</x-layout>
