@props(['method'])
<div class="flex flex-col w-full md:w-1/4">
    <p class="flex font-bold">
        <x-heroicon-o-check-circle class="w-5 h-5 mr-1 fill-green-300 text-gray-1" />
        {{ __('txt.service_card.access_location') }}
    </p>
    <div> {{ __('txt.service_card.access_location_description') }}</div>
    @if ($method['application_address'])
        <p class="font-bold"> {{ __('txt.service_card.address') }} <span
                class="font-normal">{{ $method['application_address'] }}</span></p>
    @endif

</div>
