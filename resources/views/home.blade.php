<x-layout>

    {{-- individual title for each page in metatags --}}
    <x-slot:title>
        Help2Help Home Page
        </x-slot>

        <x-search/>

        <section
            class="about h-[900px] flex-col items-center justify-start sm:h-[950px] md:h-[700px] lg:h-[1000px] xl:h-[1140px] 2xl:h-[1240px]"
            id="about-container">
            <div class="flex flex-col items-center justify-center md:flex-row">
                <div class="w-3/4 md:w-1/2">
                    <img class="w-full p-5" src="{{ Vite::asset('resources/images/design/help-big.png') }}" alt="Logo">
                </div>
                <div class="md:w-1/2 p-5">
                    <h2 class="text-2xl lg:text-6xl"> {{ __('txt.home.about_title') }}</h2>
                    <p class="text-base lg:text-2xl"> {{ __('txt.home.about_text') }} </p>
                    <a class="mt-10 block text-base font-bold underline lg:text-xl" href="#domains-container">
                        {{ __('txt.home.about_extra') }} </a>
                </div>
            </div>
            <div class="mt-10 flex w-full justify-evenly lg:mt-20">
                <div class="w-1/5 justify-center">
                    <h3 class="text-center text-3xl font-bold lg:text-8xl">{{$totalBeneficiaries}}+</h3>
                    <p class="mt-8 text-center text-base lg:text-2xl"> {{ __('txt.home.beneficiars') }} </p>
                </div>
                <div class="w-1/5 justify-center">
                    <h3 class="text-center text-3xl font-bold lg:text-8xl">{{$totalServices}}+</h3>
                    <p class="mt-8 text-center text-base lg:text-2xl"> {{ __('txt.home.services_added') }} </p>
                </div>
                <div class="w-1/5 justify-center">
                    <h3 class="text-center text-3xl font-bold lg:text-8xl">{{$totalNgos}}+</h3>
                    <p class="mt-8 text-center text-base lg:text-2xl"> {{ __('txt.home.ngos_active') }} </p>
                </div>
            </div>
        </section>
        <x-intervention-domains></x-intervention-domains>


</x-layout>
