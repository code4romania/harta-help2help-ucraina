<x-layout>
    <x-slot:title>
        Help2Help Services Page
    </x-slot:title>

    <x-search :action="localized_route('services.list')" />

    <div class="flex flex-col-reverse justify-between gap-8 md:col-span-2 md:flex-row">
        <section class="container flex-col">
            <div class="flex flex-col items-center justify-between gap-4 mb-5 md:flex-row">
                <h2 class="mb-0 text-xl md:text-2xl lg:text-3xl 2xl:text-4xl">
                    {{ $services->total() }}

                    {{ __('txt.service_card.page_title') }}
                </h2>
                <div class="grid grid-cols-2 gap-6">
                    <a href="{{ localized_route('services', request()->query()) }}"
                        class="flex items-center justify-center gap-2 px-6 py-3 text-gray-500 border border-slate-300 hover:bg-blue-1 active:bg-orange-1">
                        <x-heroicon-s-map class="w-5 h-5" />
                        {{ __('txt.buttons.services_map') }}
                    </a>

                    <a href="{{ localized_route('services.list', request()->query()) }}"
                        class="flex items-center justify-center gap-2 px-6 py-3 text-gray-900 border border-slate-300 bg-orange-1 hover:bg-blue-1">

                        <x-heroicon-s-menu-alt-1 class="w-5 h-5" />
                        {{ __('txt.buttons.services_list') }}
                    </a>
                </div>
            </div>

            <x-active-filters />

            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4">
                @foreach ($services as $service)
                    <x-cards.service :service="$service" />
                @endforeach
            </div>

            {{ $services->withQueryString()->links() }}
        </section>
</x-layout>
