<x-layout>

    {{-- individual title for each page in metatags --}}
    <x-slot:title>
        Help2Help NGOs Page
        </x-slot>

        <x-search />

        <section class="flex-col" id="ngos-list">
            <div class="mb-5 flex flex-col justify-between md:flex-row">
                <h2 class="text-xl md:text-2xl lg:text-3xl 2xl:text-4xl">1220 {{ __('txt.ngo_card.page_title') }}</h2>
                <div class="flex w-full justify-evenly md:w-1/3">
                    <button
                        class="h-12 w-2/5 flex items-center justify-center border border-slate-300  bg-white text-black hover:bg-blue1 active:bg-orange1">
                            <x-heroicon-o-map class="h-6 w-6 text-gray1 p-1" />
                        {{ __('txt.buttons.ngos_map') }}</button>
                    <button
                    class="h-12 w-2/5 flex items-center justify-center border border-slate-300 bg-orange1 text-black hover:bg-blue1">
                    <x-heroicon-o-menu-alt-1 class="h-6 w-6 text-gray1 p-1" />
                    {{ __('txt.buttons.ngos_list') }}</button>
                </div>
            </div>
            <div class="flex flex-wrap">
                <x-cards.ngo_sm />
                <x-cards.ngo_sm />
                <x-cards.ngo_sm />
            </div>
            <x-pagination />
        </section>

        <x-cards.ngo_lg />

        <x-cards.service_lg />

        
     

</x-layout>
