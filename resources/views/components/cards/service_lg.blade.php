<div class="card container my-2 p-5 sm:p-10">
    <div class="flex w-full justify-between">
        <p class="my-2 flex">               
            <x-heroicon-o-location-marker class="h-5 w-5 text-gray1 mr-3" />
                București</p>
                <p class="my-2 flex">               
                    <x-heroicon-o-share class="h-5 w-5 text-gray1 mr-3" />
                         {{ __('txt.service_card.share') }}</p>
    </div>
    <h2 class="my-2 font-bold">Cercetașii pentru Ucraina</h2>
    <p class="font-bold">{{ __('txt.service_card.services_provided') }}</p>
    <ul class="list-disc space-y-2 pl-10 marker:text-blue1" role="list">
        <li> {{ __('txt.service_card.services_provided1') }}</li>
        <li> {{ __('txt.service_card.services_provided2') }}</li>
        <li> {{ __('txt.service_card.services_provided3') }}</li>
    </ul>
    <p class="mt-5 font-bold">{{ __('txt.service_card.budget') }} <span class="font-normal">12.000 EUR</span></p>
    <div class="flex w-full flex-col md:flex-row md:justify-between">
        <p class="mt-5 w-full font-bold md:w-1/4">{{ __('txt.service_card.disponibility') }} <span
                class="font-normal">12.10.2021 -
                16.10.2021</span></p>
        <p class="mt-5 w-full font-bold md:w-1/4">{{ __('txt.service_card.beneficiaries') }} <span
                class="font-normal">{{ __('txt.beneficiaries.child') }}, {{ __('txt.beneficiaries.young') }}</span></p>
        <p class="mt-5 w-full font-bold md:w-1/4">{{ __('txt.service_card.intervention_domains') }} <span
                class="font-normal">{{ __('txt.domains.education') }}</span></p>
    </div>
    <hr class="my-10 w-full">
    <div class="flex w-full flex-col justify-between md:flex-row">
        <div class="flex w-full flex-col md:w-1/4">
            <p class="flex font-bold ">               
                <x-heroicon-o-check-circle class="h-5 w-5 text-gray1 fill-green-300 mr-1" />{{ __('txt.service_card.online') }} </p>
            <p>{{ __('txt.service_card.access_online_explain') }} </p>
            <button
                class="my-2 mt-3 h-12 w-1/2 rounded-sm bg-orange1 font-bold text-black hover:bg-blue1 md:w-full md:mt-auto">{{ __('txt.buttons.access_online') }}</button>

        </div>
        <div class="flex w-full flex-col md:w-1/4">
            <p class="flex font-bold ">               
                <x-heroicon-o-check-circle class="h-5 w-5 text-gray1 fill-green-300 mr-1" />{{ __('txt.service_card.access_email') }} </p>
            <p>{{ __('txt.service_card.access_email_explain') }} </p>
            <p class="font-bold"> Email <span class="font-normal"> serviciu@organizatie.ro</span> </p>
            <p class="font-bold"> {{ __('txt.service_card.phone') }} <span class="font-normal">0712345678</span> </p>

        </div>
        <div class="flex w-full flex-col md:w-1/4">
            <p class="flex font-bold ">               
                <x-heroicon-o-check-circle class="h-5 w-5 text-gray1 fill-green-300 mr-1" />{{ __('txt.service_card.access_location') }} </p>
            <p>{{ __('txt.service_card.access_location_explain') }} </p>
            <p class="font-bold"> {{ __('txt.service_card.address') }} <span class="font-normal">Strada Vigilenței,
                    nr.7, București, Sector 5</span> </p>
        </div>
    </div>
    <hr class="my-10 w-full">

    <h2 class="my-2 font-bold">{{ __('txt.service_card.how_help') }}</h2>
    <p>{{ __('txt.service_card.how_help_explain') }}</p>
    <button
        class="my-2 mt-3 h-12 w-1/2 rounded-sm bg-orange1 font-bold text-black hover:bg-blue1 md:w-1/4">{{ __('txt.buttons.access_site') }}</button>

</div>
