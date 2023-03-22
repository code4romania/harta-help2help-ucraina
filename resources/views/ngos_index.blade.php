<x-layout>
    <x-slot:title>
        {{$ngo->name}}
    </x-slot:title>
    <div class="container card flex-col md:flex-row my-2 p-5 sm:p-10  ">
        <div class=" w-4/5 sm:w-2/3 md:w-1/3 flex flex-col p-5 self-center items-center">
            <img class="w-full" src="{{$ngo->getFirstMediaUrl()? $ngo->getFirstMediaUrl(): Vite::asset('resources/images/design/help.png') }}"
                 alt="{{$ngo->name}}">
            <a href="{{$ngo->story?: '#'}}" target="_blank"
               class="my-2 mt-3 h-12 flex justify-center  text-center items-center  w-full bg-orange1  text-black rounded-md hover:bg-blue1">{{ __('txt.buttons.see_more') }}</a>
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
                @foreach($ngo->intervention_domains as $key=>$value)
                    <span class="text-orange1">
                    {{ $value }}
                        @if(!$loop->last)
                            ,
                        @endif
                </span>
                @endforeach

            </p>
            <p class="font-bold">{{ __('txt.ngo_card.beneficiaries_nr') }} <span
                    class="text-orange1">{{$ngo->number_of_beneficiaries}}</span></p>

            <div class="flex flex-col sm:flex-row">
                <div class="w-full md:w-1/2 flex flex-col">
                    <p class="font-medium"> Contact </p>
                    <p class="font-medium"> {{$ngo->phone}} </p>
                    <p class="font-medium"> {{$ngo->contact_email}} </p>
                    <p class="font-medium">{{$ngo->address}}</p>
                    <p class="font-medium"> {{$ngo->website}} </p>
                </div>
                {{--                @TODO get social media --}}
                {{--                <div class="w-full md:w-1/2 flex flex-col">--}}
                {{--                    <p class="font-medium"> Social Media </p>--}}
                {{--                    <p class="font-medium"> FB Instagram Twitter </p>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="container justify-start mx-auto flex-col md:flex-row my-2 p-5 sm:p-10  ">
        <h2 class="my-2  font-bold">{{ __('labels.ong_services') }}</h2>
    </div>
    @foreach($ngo->services as $service)
        <x-cards.service_lg :service="$service"/>
    @endforeach
</x-layout>
