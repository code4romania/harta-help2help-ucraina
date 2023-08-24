@props(['method'])

<div>
    <div class="flex items-center gap-2">
        <x-heroicon-s-check-circle class="w-4 h-4 text-green-500" />
        <span class="font-semibold">{{ __('txt.service_card.online') }}</span>
    </div>

    <a href="{{ $method['application_url'] }}" target="_blank"
        class="inline-flex items-center justify-center px-6 py-3 mt-3 font-bold text-center text-gray-900 rounded bg-orange-1 hover:bg-blue-1 whitespace-nowrap">
        {{ __('txt.buttons.access_online') }}
    </a>
</div>
