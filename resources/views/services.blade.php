<x-layout>

    {{-- individual title for each page in metatags --}}
    <x-slot:title>
        Help2Help Services Page
        </x-slot>

        <x-search />
        <section class="flex-col">
            <div class="mb-5 flex flex-col justify-between md:flex-row">
                <h2 class="text-xl md:text-2xl lg:text-3xl 2xl:text-4xl">1220 {{ __('txt.service_card.page_title') }}
                </h2>
                <div class="flex w-full justify-evenly md:w-1/3">
                    <button
                        class="h-12 w-2/5 border-2 bg-white text-black hover:bg-blue1 active:bg-orange1">{{ __('txt.buttons.services_map') }}</button>
                    <button
                        class="h-12 w-2/5 border-2 bg-orange1 text-black hover:bg-blue1">{{ __('txt.buttons.services_list') }}</button>
                </div>
            </div>
            <div class="flex flex-wrap">
                <x-cards.service_sm />
                <x-cards.service_sm />
                <x-cards.service_sm />
            </div>
            <x-pagination />
        </section>
</x-layout>
