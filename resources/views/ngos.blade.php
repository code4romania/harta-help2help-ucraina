<x-layout>
    <x-slot:title>
        Help2Help NGOs Page
    </x-slot:title>
    <x-search-ngo/>
    <section class="flex-col container" id="ngos-list">
        <div class="mb-5 flex flex-col justify-between md:flex-row">
            <h2 class="text-xl md:text-2xl lg:text-3xl 2xl:text-4xl">{{$ngos->total()}} {{ __('txt.ngo_card.page_title') }}</h2>
        </div>
        <div class="flex flex-wrap">
            @foreach($ngos->items() as $item)
                <x-cards.ngo_sm :ngo="$item"/>
            @endforeach
        </div>
        {{$ngos->withQueryString()->links()}}
    </section>
</x-layout>
