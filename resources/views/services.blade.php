<x-layout>
    <x-slot:title>
        Help2Help Services Page
    </x-slot:title>


    <x-search/>
    <section class="flex-col">
        <div class="mb-5 flex flex-col justify-between md:flex-row">
            <h2 class="text-xl md:text-2xl lg:text-3xl 2xl:text-4xl">{{$services->total()}} {{ __('txt.service_card.page_title') }}
            </h2>
            <div class="flex w-full justify-evenly md:w-1/2">
                <button
                    class="h-12 w-2/5 flex items-center justify-center border border-slate-300 bg-orange1 text-black hover:bg-blue1">
                    <x-heroicon-o-map class="h-6 w-6 text-gray1 p-1"/>
                    {{ __('txt.buttons.ngos_map') }}</button>
                <button
                    class="h-12 w-2/5 flex items-center justify-center border border-slate-300  bg-white text-black hover:bg-blue1 active:bg-orange1">

                    <x-heroicon-o-menu-alt-1 class="h-6 w-6 text-gray1 p-1"/>
                    {{ __('txt.buttons.ngos_list') }}</button>
            </div>
        </div>
        <div class="my-10 h-96 md:h-[40rem] w-full rounded-lg border border-main-color">
            <div class=" h-full w-full overflow-hidden" id="map">

            </div>
        </div>
        <div class="flex flex-wrap">
            @foreach($services->items() as $service)
                <x-cards.service_sm :service="$service"/>
            @endforeach
        </div>
        {{$services->links()}}
    </section>
    <x-slot:js>
        <script>
            const markActivePath = "{{Vite::asset('resources/images/icons/map-pin.png')}}";
            const markDisabledPath = "{{Vite::asset('resources/images/icons/map-pin-disabled.png')}}";

            let points = @json($servicesJson);
        </script>

        <script
            src="https://maps.googleapis.com/maps/api/js?key={{ config('app.gmaps_api_key') }}&v=3.exp&sensor=false&libraries=places&callback=initMap"
            async defer></script>
        <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

        {{--    <script>--}}
    </x-slot:js>
</x-layout>

