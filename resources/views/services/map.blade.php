<x-layout>
    <x-slot:title>
        Help2Help Services Page
    </x-slot:title>

    <x-search :action="localized_route('services')" />

    <div class="flex flex-col-reverse justify-between gap-8 md:col-span-2 md:flex-row">
        <section class="container flex-col">
            <div class="flex flex-col items-center justify-between gap-4 mb-5 md:flex-row">
                <h2 class="mb-0 text-xl md:text-2xl lg:text-3xl 2xl:text-4xl">
                    {{ $services->count() }}

                    {{ __('txt.service_card.page_title') }}
                </h2>
                <div class="grid grid-cols-2 gap-6">
                    <a href="{{ localized_route('services', request()->query()) }}"
                        class="flex items-center justify-center gap-2 px-6 py-3 text-gray-900 border border-slate-300 bg-orange-1 hover:bg-blue-1">
                        <x-heroicon-s-map class="w-5 h-5" />
                        {{ __('txt.buttons.services_map') }}
                    </a>

                    <a href="{{ localized_route('services.list', request()->query()) }}"
                        class="flex items-center justify-center gap-2 px-6 py-3 text-gray-500 border border-slate-300 hover:bg-blue-1 active:bg-orange-1">

                        <x-heroicon-s-menu-alt-1 class="w-5 h-5" />
                        {{ __('txt.buttons.services_list') }}
                    </a>
                </div>
            </div>

            <x-active-filters />

            <div class="my-10 md:h-[55rem] w-full rounded-lg flex flex-wrap md:flex-nowrap gap-8">
                <div class="h-96 md:h-[55rem] w-full border border-main-color overflow-hidden" id="map"></div>
                @foreach ($services as $service)
                    <div id="point-id-{{ $service->id }}" class="relative hidden w-full md:w-auto service-point">
                        <button type="button" onclick="hideAllPoints()"
                            class="absolute w-8 h-8 text-gray-900 right-8 top-8">
                            <x-heroicon-o-x />
                        </button>

                        <x-cards.service :service="$service" class="h-full" />
                    </div>
                @endforeach
            </div>

            @pushOnce('js')
                <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
                <script>
                    let points = @json($services);
                    let map = null
                    let markers = []
                    let myLatLng = {
                        lat: 46.218160,
                        lng: 25.158008
                    };
                    const markActivePath = @js(Vite::asset('resources/images/icons/map-pin.png'));
                    const markDisabledPath = @js(Vite::asset('resources/images/icons/map-pin-disabled.png'));
                </script>
                <script
                    src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&libraries=places&callback=initMap"
                    defer></script>
            @endPushOnce
        </section>

</x-layout>
