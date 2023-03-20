@props(['method'])
<div class="flex w-full flex-col md:w-1/4">
    <p class="flex font-bold">
        <x-heroicon-o-check-circle class="mr-1 h-5 w-5 fill-green-300 text-gray1"/>
        {{ __('txt.service_card.access_location') }}
    </p>
    <div>{!! $method['description'] !!}</div>
    @if($method['application_address'])
        <p class="font-bold"> {{ __('txt.service_card.address') }} <span class="font-normal">{{$method['application_address']}}</span></p>
    @endif

</div>
