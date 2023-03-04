<x-layout>
    <x-slot:title>
        Help2Help NGOs Page
    </x-slot:title>
    <div class="container card flex-col md:flex-row my-2 p-5 sm:p-10  ">
        <div class=" w-4/5 sm:w-2/3 md:w-1/3 flex flex-col p-5 self-center items-center">
            <img class="w-full" src="{{$ngo->getFirstMediaUrl()}}" alt="sera">
            <button
                class="my-2 mt-3 h-12 w-full bg-orange1  text-black rounded-md hover:bg-blue1">{{ __('txt.buttons.see_more') }}</button>
        </div>
        <div class="w-full md:w-2/3 flex flex-col p-5">
            <h2 class="my-2  font-bold">{{$ngo->name}}</h2>
            <div>{!! $ngo->description !!}</div>
            <p class="font-bold">{{ __('txt.ngo_card.activity_domains') }} <span class="text-orange1">{{ __('txt.domains.education') }}, {{ __('txt.domains.youth') }}, {{ __('txt.domains.research') }}   </span> </p>
            <p class="font-bold">{{ __('txt.ngo_card.intervention_domains') }} <span class="text-orange1">{{ __('txt.domains.education') }}   </span> </p>
            <p class="font-bold">{{ __('txt.ngo_card.beneficiaries_nr') }} <span class="text-orange1">13000</span> </p>

            <div class="flex flex-col sm:flex-row">
                <div class="w-full md:w-1/2 flex flex-col">
                    <p class="font-medium"> Contact </p>
                    <p class="font-medium"> 0712345678 </p>
                    <p class="font-medium"> contact@organizatie.com </p>
                    <p class="font-medium"> Turda, judetul Cluj </p>
                    <p class="font-medium"> www.site-organizatie.ro </p>
                </div>
                <div class="w-full md:w-1/2 flex flex-col">
                    <p class="font-medium"> Social Media </p>
                    <p class="font-medium"> FB Instagram Twitter </p>

                </div>
            </div>
        </div>
    </div>
</x-layout>
