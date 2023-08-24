@props(['method'])
<div>
    <div class="flex items-center gap-2">
        <x-heroicon-s-check-circle class="w-4 h-4 text-green-500" />
        <span class="font-semibold">{{ __('txt.service_card.access_email') }}</span>
    </div>

    <p class="text-gray-500">{{ __('txt.service_card.access_email_description') }}</p>

    <div class="flex flex-wrap gap-8">
        @if ($method['application_phone'])
            <div>
                <span class="block font-semibold">{{ __('txt.service_card.phone') }}</span>
                <a href="tel:{{ $method['application_phone'] }}" class="font-normal text-gray-500 hover:underline">
                    {{ $method['application_phone'] }}
                </a>
            </div>
        @endif

        @if ($method['application_email'])
            <div>
                <span class="block font-semibold">{{ __('txt.service_card.email') }}</span>
                <a href="mailto:{{ $method['application_email'] }}" class="font-normal text-gray-500 hover:underline">
                    {{ $method['application_email'] }}
                </a>
            </div>
        @endif
    </div>
</div>
