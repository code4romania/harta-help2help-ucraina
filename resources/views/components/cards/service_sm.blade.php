<div class=" card my-2 p-5 sm:p-10  md:w-[48%] lg:w-[32%]">
    <img class="w-24" src="{{ Vite::asset('resources/images/design/cercetas.png') }}" alt="sera">
    <p class="my-2"> <i class="fa-regular fa-location-dot"></i> București</p>
    <h4 class="my-2 text-xl font-bold">Centru educațional pentru tineri și copii, activități educaționale nonformale, soft skills si competente transversale</h4>
    <p>{{ __('txt.service_card.project_name') }} </p>
    <p>{{ __('txt.service_card.provided_by') }} <span class="font-bold">Organizația Cercetașii României</span> </p>
    <p>{{ __('txt.service_card.intervention_domains') }} <span class="font-bold">{{ __('txt.domains.education') }} </span> </p>
    <p>{{ __('txt.service_card.beneficiary_type') }} <span class="font-bold">{{ __('txt.beneficiaries.child') }}, {{ __('txt.beneficiaries.young') }} </span> </p>
    <p>{{ __('txt.service_card.project_active') }} </p>
    <p> <span class="font-bold">{{ __('txt.service_card.service_access') }}  </span> </p>
    <div class="w-full flex justify-between flex-wrap">
        <p>{{ __('txt.service_card.online') }} </p>
        <p>{{ __('txt.service_card.email') }} </p>
        <p>{{ __('txt.service_card.location') }} </p>
    </div>
    <button
                        class="my-2 mt-3 h-12 w-full bg-orange1  text-black rounded-md hover:bg-blue1 md:mt-auto">{{ __('txt.buttons.see_more') }}</button>
</div>

{{-- todo change card properties with if-statement --}}

<div class=" card my-2 p-5 sm:p-10  md:w-[48%] lg:w-[32%]">
    <img class="w-24" src="{{ Vite::asset('resources/images/icons/health.png') }}" alt="sera">
    <p class="my-2"> <i class="fa-regular fa-location-dot"></i> {{ __('txt.service_card.city_any') }}</p>
    <h4 class="my-2 text-xl font-bold">Adapost persoane</h4>
    <p>{{ __('txt.service_card.project_name') }} </p>
    <p>{{ __('txt.service_card.provided_by') }} <span class="font-bold">ONG X</span> </p>
    <p>{{ __('txt.service_card.intervention_domains') }} <span class="font-bold">{{ __('txt.domains.protection') }} </span> </p>
    <p>{{ __('txt.service_card.beneficiary_type') }} <span class="font-bold">{{ __('txt.beneficiaries.child') }}, {{ __('txt.beneficiaries.adult') }}  </span> </p>
    <p>{{ __('txt.service_card.project_finished') }} {{ __('txt.service_card.project_period') }}</p>
    <p> <span class="font-bold">{{ __('txt.service_card.service_access') }}  </span> </p>
    <p>{{ __('txt.service_card.project_finished') }} </p>
    <button
                        class="my-2 mt-3 h-12 w-full bg-orange1  text-black rounded-md hover:bg-blue1 md:mt-auto">{{ __('txt.buttons.see_more') }}</button>
</div>