<x-layout>
    <x-slot:title>
        {{ $ngo->name }}
    </x-slot:title>

    <x-breadcrumbs :items="$breadcrumbs" class="container md:my-4" />

    <div class="container">
        <x-cards.base>
            <div class="grid gap-20 md:grid-cols-3">
                <div class="space-y-3">
                    <div class="flex items-center justify-center aspect-square">
                        <img class="object-contain w-full"
                            src="{{ $ngo->getFirstMediaUrl() ?: Vite::asset('resources/images/design/placeholder.png') }}"
                            alt="{{ $ngo->name }}">
                    </div>
                    @if ($ngo->story)
                        <a href="{{ $ngo->story }}" target="_blank"
                            class="flex items-center justify-center w-full h-12 font-semibold text-center text-gray-900 rounded-md bg-orange-1 hover:bg-blue-1">
                            {{ __('txt.buttons.see_story') }}
                        </a>
                    @endif
                </div>

                <div class="md:col-span-2">
                    <h1 class="mb-2 text-xl font-bold md:text-2xl">
                        {{ $ngo->name }}
                    </h1>

                    <div class="prose max-w-none">
                        {!! $ngo->description !!}
                    </div>

                    <dl class="space-y-4 font-semibold">
                        <div>
                            <dt class="inline">{{ __('txt.ngo_card.activity_domains') }}</dt>
                            <dd class="inline text-orange-1">{{ $ngo->activity_domains_list }}</dd>
                        </div>

                        <div>
                            <dt class="inline">{{ __('txt.ngo_card.intervention_domains') }}</dt>
                            <dd class="inline text-orange-1">{{ $ngo->intervention_domains_list }}</dd>
                        </div>

                        @if ($ngo->number_of_beneficiaries)
                            <div>
                                <dt class="inline">{{ __('txt.ngo_card.beneficiaries_nr') }}</dt>
                                <dd class="inline text-orange-1">{{ $ngo->number_of_beneficiaries }}</dd>
                            </div>
                        @endif

                        <div class="grid gap-4 lg:grid-cols-2">
                            <div class="font-normal">
                                <dt class="inline-block font-semibold">{{ __('txt.placeholders.contact') }}</dt>
                                <dd>
                                    @if ($ngo->phone)
                                        <div class="flex items-center gap-2">
                                            <x-heroicon-s-phone class="w-4 h-4" />
                                            <a href="tel:{{ $ngo->phone }}" class="flex self-center hover:underline">
                                                {{ $ngo->phone }}
                                            </a>
                                        </div>
                                    @endif

                                    @if ($ngo->contact_email)
                                        <div class="flex items-center gap-2">
                                            <x-heroicon-s-mail class="w-4 h-4" />
                                            <a href="mailto:{{ $ngo->contact_email }}"
                                                class="flex self-center hover:underline">
                                                {{ $ngo->contact_email }}
                                            </a>
                                        </div>
                                    @endif

                                    @if ($ngo->address || $ngo->city?->name || $ngo->county?->name)
                                        <div class="flex items-center gap-2">
                                            <x-heroicon-s-home class="w-4 h-4" />
                                            <address class="flex self-center not-italic">
                                                {{ $ngo->address }} {{ $ngo->city?->name }} {{ $ngo->county?->name }}
                                            </address>
                                        </div>
                                    @endif

                                    @if ($ngo->website)
                                        <div class="flex items-center gap-2">
                                            <x-heroicon-s-globe class="w-4 h-4" />
                                            <a href="{{ $ngo->website }}" class="flex self-center hover:underline"
                                                target="_blank" rel="noopener">
                                                {{ $ngo->website }}
                                            </a>
                                        </div>
                                    @endif
                                </dd>
                            </div>

                            @if ($ngo->social_icons->isNotEmpty())
                                <div>
                                    <dt class="inline-block">{{ __('txt.placeholders.social_media') }}
                                    </dt>
                                    <dd>
                                        @foreach ($ngo->social_icons as $platform => $url)
                                            @continue(blank($url))
                                            <a href="{{ $url }}" target="_blank" rel="noopener">
                                                @svg("icon-{$platform}", 'w-6 h-6')
                                            </a>
                                        @endforeach
                                    </dd>
                                </div>
                            @endif
                        </div>
                    </dl>
                </div>
            </div>

        </x-cards.base>
    </div>

    @if ($ngo->services->isNotEmpty())
        <div class="container mt-24">
            <h2 class="text-xl font-bold md:text-2xl">{{ __('txt.placeholders.ong_services') }}</h2>

            <div class="grid gap-12">
                @foreach ($ngo->services as $service)
                    <x-cards.service-detailed :service="$service" />
                @endforeach
            </div>
        </div>
    @endif
</x-layout>
