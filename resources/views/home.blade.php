<x-layout>

    {{-- individual title for each page in metatags --}}
    <x-slot:title>
        Help2Help Home Page
    </x-slot:title>

    <x-search :action="localized_route('services')" />

    <div class="pb-16 about">
        <div class="container flex">
            <section class="flex-col items-center justify-start">
                <div class="flex flex-col items-center justify-center md:flex-row">
                    <div class="items-center w-1/2">
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
                            {{ $beneficiaries_count }}
                        </h3>
                        <p class="mt-8 text-base text-center text-gray-700 lg:text-2xl">
                            {{ __('txt.home.beneficiary') }}
                        </p>
                    </div>

                    <div class="justify-center w-full md:w-1/5">
                        <h3 class="text-3xl font-bold text-center text-gray-700 lg:text-7xl">
                            {{ $services_count }}
                        </h3>
                        <p class="mt-8 text-base text-center text-gray-700 lg:text-2xl">
                            {{ __('txt.home.services_added') }}
                        </p>
                    </div>

                    <div class="justify-center w-full md:w-1/5">
                        <h3 class="text-3xl font-bold text-center text-gray-700 lg:text-7xl">
                            {{ $ngos_count }}
                        </h3>
                        <p class="mt-8 text-base text-center text-gray-700 lg:text-2xl">
                            {{ __('txt.home.ngos_active') }}
                        </p>
                    </div>
                </div>
            </section>
        </div>

        <section class="container flex-col justify-start -mt-24" id="domains-container">
            <h2 class="text-xl md:text-2xl lg:text-3xl 2xl:text-4xl">
                {{ __('txt.intervention_domains.intervention_domains') }}
            </h2>
            <div class="grid gap-8 md:grid-cols-3 xl:grid-cols-4">
                @foreach ($domains as $domain)
                    <a href="{{ localized_route('services', [
                        'filter' => [
                            'intervention_domain' => $domain->id,
                        ],
                    ]) }}"
                        class="items-center justify-center p-10 flex flex-col bg-gray-2 text-gray-1 hover:bg-blue-3 hover:text-white hover:stroke:text-blue-1 aspect-square gap-4 !mb-0">

                        @if ($domain->icon)
                            @svg("icon-{$domain->icon}", 'shrink-0 w-12 h-12 md:w-24 md:h-24')
                        @endif

                        <h4 class="text-xl font-bold text-center md:text-2xl">
                            {{ $domain->name }}
                        </h4>
                    </a>
                @endforeach
            </div>
        </section>
    </div>

</x-layout>
