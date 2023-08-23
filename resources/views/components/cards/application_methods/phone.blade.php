@props(['method'])
<div class="flex flex-col w-full md:w-1/4">
    <p class="flex font-bold">
        <x-heroicon-o-check-circle class="w-5 h-5 mr-1 fill-green-300 text-gray-1" />
        {{ __('txt.service_card.access_email') }}
    </p>
    <div> {{ __('txt.service_card.access_email_description') }}</div>
    @if ($method['application_email'])
        <p class="font-bold">{{ __('txt.service_card.access_email') }} <span class="font-normal">
                {{ $method['application_email'] }}</span></p>
    @endif
    @if ($method['application_phone'])
        <p class="font-bold"> {{ __('txt.service_card.phone') }} <span class="font-normal">
                {{ $method['application_phone'] }}</span></p>
    @endif
</div>
