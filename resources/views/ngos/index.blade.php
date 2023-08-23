<x-layout>
    <x-slot:title>
        Help2Help NGOs Page
    </x-slot:title>
    <x-search-ngo />
    <section class="container flex-col" id="ngos-list">
        <div class="flex flex-col justify-between mb-5 md:flex-row">
            <h2 class="text-xl md:text-2xl lg:text-3xl 2xl:text-4xl">
                {{ $ngos->total() }} {{ __('txt.ngo_card.page_title') }}
            </h2>
        </div>

        <x-active-filters />

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 ">
            @foreach ($ngos as $ngo)
                <x-cards.ngo :ngo="$ngo" />
            @endforeach
        </div>
        {{ $ngos->withQueryString()->links() }}
    </section>
</x-layout>
