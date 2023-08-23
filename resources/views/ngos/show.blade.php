<x-layout>
    <x-slot:title>
        {{ $ngo->name }}
    </x-slot:title>

    <x-breadcrumbs :items="$breadcrumbs" class="container md:my-4" />

    <div class="container">
        <div class="overflow-hidden bg-white rounded-lg shadow">
            <div class="px-4 py-5 sm:p-6">
                <!-- Content goes here -->
            </div>
        </div>
    </div>
    #F8F8F8
    <div class="container flex-col p-5 my-2 md:flex-row sm:p-10">
        <div class="flex flex-col items-center self-center w-4/5 p-5 sm:w-2/3 md:w-1/3">
            <img class="w-full"
                src="{{ $ngo->getFirstMediaUrl() ?: Vite::asset('resources/images/design/placeholder.png') }}"
                alt="{{ $ngo->name }}">

            @if ($ngo->story)
                <a href="{{ $ngo->story }}" target="_blank"
                    class="flex items-center justify-center w-full h-12 my-2 mt-3 text-center text-black rounded-md bg-orange-1 hover:bg-blue-1">
                    {{ __('txt.buttons.see_story') }}
                </a>
            @endif
        </div>
        <div class="flex flex-col w-full p-5 md:w-2/3">

            <div class="mb-4 prose max-w-none">
                <h1>{{ $ngo->name }}</h1>

                <div>{!! $ngo->description !!}</div>

                <dl class="space-y-4 font-semibold">
                    <div>
                        <dt class="font-bold">{{ __('txt.ngo_card.activity_domains') }}</dt>
                        <dd class="text-orange-1">{{ $ngo->activity_domains_list }}</dd>
                    </div>

                    <div>
                        <dt class="font-bold">{{ __('txt.ngo_card.intervention_domains') }}</dt>
                        <dd class="text-orange-1">{{ $ngo->intervention_domains_list }}</dd>
                    </div>

                    @if ($ngo->number_of_beneficiaries)
                        <div>
                            <dt class="font-bold">{{ __('txt.ngo_card.beneficiaries_nr') }}</dt>
                            <dd class="text-orange-1">{{ $ngo->number_of_beneficiaries }}</dd>
                        </div>
                    @endif

                    <div class="grid gap-4 lg:grid-cols-2">
                        <div>
                            <dt class="font-bold">{{ __('txt.placeholders.contact') }}</dt>
                            <dd class="font-medium">
                                <div class="flex items-center gap-2">
                                    <x-icon-phone class="w-4 h-4" />
                                    <span class="flex self-center"> {{ $ngo->phone }} </span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <x-icon-mail class="w-4 h-4" />
                                    <a href="mailto:{{ $ngo->contact_email }}"
                                        class="flex self-center hover:underline">
                                        {{ $ngo->contact_email }}
                                    </a>
                                </div>

                                <div class="flex items-center gap-2">
                                    <x-icon-home class="w-4 h-4" />
                                    <address class="flex self-center not-italic">
                                        {{ $ngo->address }} {{ $ngo->city?->name }} {{ $ngo->county?->name }}
                                    </address>
                                </div>

                                <div class="flex items-center gap-2">
                                    <x-icon-globe class="w-4 h-4" />
                                    <a href="{{ $ngo->website }}" class="flex self-center hover:underline"
                                        target="_blank" rel="noopener">
                                        {{ $ngo->website }}
                                    </a>
                                </div>
                            </dd>
                        </div>

                        @if ($ngo->social_icons->isNotEmpty())
                            <div>
                                <dt class="font-bold">{{ __('txt.placeholders.social_media') }}</dt>
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
    </div>
    <div class="container flex-col justify-start p-5 mx-auto my-2 md:flex-row sm:p-10 ">
        <h2 class="my-2 font-bold">{{ __('txt.placeholders.ong_services') }}</h2>
    </div>
    @foreach ($ngo->services as $service)
        <x-cards.service_lg :service="$service" />
    @endforeach
</x-layout>
