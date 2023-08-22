<x-layout>

    {{-- individual title for each page in metatags --}}
    <x-slot:title>
        Help2Help Home Page
    </x-slot:title>

    <x-search :action="localized_route('services')" />

    <div class="about">
        <div class="container flex">
            <section class="flex-col items-center justify-start">
                <div class="flex flex-col items-center justify-center md:flex-row">
                    <div class="items-center w-1/2 ">
                        <img class="w-3/4 p-5 mx-auto" src="{{ Vite::asset('resources/images/design/help-big.png') }}"
                            alt="Logo">
                    </div>
                    <div class="p-5 md:w-1/2">
                        <h2 class="text-2xl lg:text-6xl">
                            {{ __('txt.home.about_title') }}
                        </h2>
                        <p class="text-base lg:text-2xl">
                            {{ __('txt.home.about_text') }}
                        </p>
                        <a class="block mt-10 text-base font-bold underline lg:text-xl" href="#domains-container">
                            {{ __('txt.home.about_extra') }}
                        </a>
                    </div>
                </div>
                <div class="flex flex-wrap w-full my-32 mt-10 justify-evenly md:my-64">
                    <div class="justify-center w-full md:w-1/5">
                        <h3 class="text-3xl font-bold text-center text-gray-700 lg:text-7xl">
                            {{ $totalBeneficiaries == 0 ? '968548' : $totalBeneficiaries }}+
                        </h3>
                        <p class="mt-8 text-base text-center text-gray-700 lg:text-2xl">
                            {{ __('txt.home.beneficiary') }}
                        </p>
                    </div>
                    <div class="justify-center w-full md:w-1/5">
                        <h3 class="text-3xl font-bold text-center text-gray-700 lg:text-7xl">{{ $totalServices }}+</h3>
                        <p class="mt-8 text-base text-center text-gray-700 lg:text-2xl">
                            {{ __('txt.home.services_added') }}
                        </p>
                    </div>
                    <div class="justify-center w-full md:w-1/5">
                        <h3 class="text-3xl font-bold text-center text-gray-700 lg:text-7xl">{{ $totalNgos }}+</h3>
                        <p class="mt-8 text-base text-center text-gray-700 lg:text-2xl">
                            {{ __('txt.home.ngos_active') }}
                        </p>
                    </div>
                </div>
            </section>
        </div>
        <div class="container">
            <x-intervention-domains />
        </div>
    </div>

</x-layout>
