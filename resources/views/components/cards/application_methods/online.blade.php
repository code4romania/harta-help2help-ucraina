@props(['method'])
<div class="flex w-full flex-col md:w-1/4">
    <p class="flex font-bold">
        <x-heroicon-o-check-circle class="mr-1 h-5 w-5 fill-green-300 text-gray1"/>
        {{ __('txt.service_card.online') }}
    </p>
    <div>{!! $method['description'] !!}</div>
    <a href="{{$method['application_url']}}" target="_blank"
       class="my-2 mt-3 h-12 w-1/2 rounded-sm flex justify-center  text-center items-center  bg-orange1 font-bold text-black hover:bg-blue1 md:mt-auto md:w-full">{{ __('txt.buttons.access_online') }}</a>

</div>
