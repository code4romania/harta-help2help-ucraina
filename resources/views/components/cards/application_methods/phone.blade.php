@props(['method'])
<div class="flex w-full flex-col md:w-1/4">
    <p class="flex font-bold">
        <x-heroicon-o-check-circle class="mr-1 h-5 w-5 fill-green-300 text-gray1"/>
        {{ __('txt.service_card.access_email') }}
    </p>
    <div> {{ __('txt.service_card.access_email_description') }}</div>
    @if($method['application_email'])
        <p class="font-bold"> Email <span class="font-normal"> {{$method['application_email']}}</span></p>
    @endif
    @if($method['application_phone'])
        <p class="font-bold"> {{ __('txt.service_card.phone') }} <span
                class="font-normal"> {{$method['application_phone']}}</span></p>
    @endif
</div>
