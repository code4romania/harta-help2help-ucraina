<x-layout>
    <x-slot:title>
        Help2Help Services Page
    </x-slot:title>

    <x-search />

    <div class="flex flex-col-reverse justify-between gap-8 md:col-span-2 md:flex-row">
        <section class="container flex-col">
            <div class="flex flex-col items-center justify-between gap-4 mb-5 md:flex-row">
                <h2 class="mb-0 text-xl md:text-2xl lg:text-3xl 2xl:text-4xl">
                    {{ $services->total() }} {{ __('txt.service_card.page_title') }}
                </h2>
                <div class="grid grid-cols-2 gap-6">
                    <button id="show-services-map" onclick="showMap()"
                        class="px-6 py-3 flex items-center justify-center border border-slate-300  @if (empty(request()->get('page'))) bg-orange1 @endif text-black hover:bg-blue1">
                        <x-heroicon-o-map class="w-6 h-6 p-1 text-gray1" />
                        {{ __('txt.buttons.services_map') }}
                    </button>
                    <button id="show-services-list" onclick="showList()"
                        class="px-6 py-3 flex items-center justify-center border border-slate-300 @if (!empty(request()->get('page'))) bg-orange1 @endif text-black hover:bg-blue1 active:bg-orange1">

                        <x-heroicon-o-menu-alt-1 class="w-6 h-6 p-1 text-gray1" />
                        {{ __('txt.buttons.services_list') }}
                    </button>
                </div>
            </div>

            <x-active-filters />

            <div @class([
                'my-10 md:h-[55rem] w-full rounded-lg ',
                empty(request()->get('page')) ? 'flex flex-wrap md:flex-nowrap' : 'hidden',
            ]) id="services-map">
                <div class="h-96 md:h-[55rem] w-full border border-main-color overflow-hidden" id="map"></div>
                @foreach ($servicesJson as $point)
                    <x-cards.service_point :point="$point" />
                @endforeach
            </div>

            <div @class([empty(request()->get('page')) ? 'hidden' : 'flex flex-wrap']) id="services-list">
                @foreach ($services->items() as $service)
                    <x-cards.service_sm :service="$service" />
                @endforeach
                {{ $services->withQueryString()->links() }}
            </div>

        </section>
        <x-slot:js>
            <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
            <script>
                let points = @json($servicesJson);
                let map = null
                let markers = []
                let myLatLng = {
                    lat: 46.218160,
                    lng: 25.158008
                };
                const markActivePath = "{{ Vite::asset('resources/images/icons/map-pin.png') }}";
                const markDisabledPath = "{{ Vite::asset('resources/images/icons/map-pin-disabled.png') }}";
            </script>
            <script
                src="https://maps.googleapis.com/maps/api/js?key={{ config('app.gmaps_api_key') }}&libraries=places&callback=initMap"
                defer></script>
        </x-slot:js>
</x-layout>
