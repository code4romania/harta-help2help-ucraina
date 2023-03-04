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
                        class="h-12 w-2/5 border-2 bg-white text-black hover:bg-blue1 active:bg-orange1">{{ __('txt.buttons.ngos_map') }}</button>
                    <button
                        class="h-12 w-2/5 border-2 bg-orange1 text-black hover:bg-blue1">{{ __('txt.buttons.ngos_list') }}</button>
                </div>
            </div>
            <div class="flex flex-wrap">
                @foreach($ngos->items() as $item)
                    <x-cards.ngo_sm :ngo="$item" />
                @endforeach
            </div>
            {{$ngos->links()}}
        </section>



        <x-cards.service_lg />




</x-layout>
