<section class="flex-col justify-start -mt-24" id="domains-container">
    <h2 class="text-xl md:text-2xl lg:text-3xl 2xl:text-4xl"> {{ __('txt.intervention_domains.intervention_domains') }}
    </h2>
    <div class="grid gap-x-0 gap-y-8 md:grid-cols-3 sm:grid-cols-1 ">
        @foreach ($domains as $domain)
            <a href="{{ route('services', ['local' => app()->getLocale(), 'intervention_domain' => $domain['url']]) }}"
                class="items-center justify-center w-64 p-10 my-2 group card bg-gray-2 text-gray-1 hover:bg-blue-3 hover:text-white hover:stroke:text-blue-1 aspect-square">
                <div>
                    @if ($domain['icon'] === 'icon-finance_support')
                        @svg($domain['icon'], 'w-50 h-50')
                    @else
                        @svg($domain['icon'], 'fill-current w-50 h-50')
                    @endif
                </div>
                <h4 class="my-4 text-xl font-bold text-center md:text-xl lg:text-xl">
                    {{ __('txt.intervention_domains.' . $domain['name']) }}</h4>

            </a>
        @endforeach
    </div>
</section>
