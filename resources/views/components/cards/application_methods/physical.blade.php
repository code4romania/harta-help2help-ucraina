@props(['method'])

<div>
    <div class="flex items-center gap-2">
        <x-heroicon-s-check-circle class="w-4 h-4 text-green-500" />
        <span class="font-semibold">{{ __('txt.service_card.access_location') }}</span>
    </div>
    <p class="text-gray-500">{{ __('txt.service_card.access_location_description') }}</p>

    @if ($method['application_address'])
        <span class="font-semibold">{{ __('txt.service_card.address') }}</span>
        <address class="not-italic font-normal text-gray-500">
            {{ $method['application_address'] }}
        </address>
    @endif
</div>
