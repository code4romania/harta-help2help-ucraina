<div class="card my-2 p-5 sm:p-10 md:w-[48%] lg:w-[32%]">
    <img class="w-24" src="{{ Vite::asset('resources/images/design/cercetas.png') }}" alt="sera">

    <h4 class="my-2 text-xl font-bold">Organizația Cercetașii României</h4>

    <p>Renăscută în 1990, Organizaţia Naţională „Cercetaşii României“ este cea mai mare mişcare neguvernamentală de
        tineret din România. Din 1993, Organizaţia Naţională Cercetașii României etc etc etc etc etc et ...</p>

    <button
        class="my-2 mt-3 h-12 w-full rounded-md bg-orange1 text-black hover:bg-blue1 md:mt-auto">{{ __('txt.buttons.see_more') }}</button>
</div>

{{-- todo change card properties with if-statement --}}

<div class="card my-2 p-5 sm:p-10 md:w-[48%] lg:w-[32%]">
    <img class="w-24" src="{{ Vite::asset('resources/images/icons/health.png') }}" alt="sera">

    <h4 class="my-2 text-xl font-bold">{{ __('txt.ngo_card.ngo_name') }} </h4>

    <p>{{ __('txt.ngo_card.ngo_description') }} </p>

    <button
        class="my-2 mt-3 h-12 w-full rounded-md bg-orange1 text-black hover:bg-blue1 md:mt-auto">{{ __('txt.buttons.see_more') }}</button>
</div>
