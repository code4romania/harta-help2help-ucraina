@props(['method'])
<div class="flex flex-col w-full md:w-1/4">
    <p class="flex font-bold">
        <x-heroicon-o-check-circle class="w-5 h-5 mr-1 fill-green-300 text-gray-1" />
        {{ __('txt.service_card.online') }}
    </p>
    <a href="{{ $method['application_url'] }}" target="_blank"
        class="flex items-center justify-center w-1/2 h-12 my-2 mt-3 font-bold text-center text-black rounded-sm bg-orange-1 hover:bg-blue-1 md:mt-auto md:w-full">{{ __('txt.buttons.access_online') }}</a>

</div>
