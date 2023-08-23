<section class="py-32 search" id="search-container">
    <div class="flex flex-col items-center justify-center pb-24">
        <h2 class="text-xl text-center lg:text-3xl"> {{ __('txt.search_ngo.search_title') }}</h2>
        <p class="text-base lg:text-2xl"> {{ __('txt.search_ngo.search_text') }} </p>
    </div>

    <div class="container">
        <form class="grid items-stretch mx-auto lg:w-4/5 sm:grid-cols-12 gap-y-4" action="{{ localized_route('ngos') }}">
            <label class="relative block sm:col-span-9">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <x-heroicon-o-search class="w-6 h-6 text-gray-1" />
                </span>
                <input
                    class="w-full h-full p-3 px-10 text-sm bg-white border border-slate-300 text-gray-1 focus:outline-none lg:h-20 lg:text-lg text-ellipsis"
                    name="search" type="text" value="{{ request()->get('search') }}"
                    placeholder="{{ __('txt.search_ngo.search_text_span') }}" />
            </label>

            <label class="relative block sm:col-span-3">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <x-heroicon-o-location-marker class="w-6 h-6 text-gray-1" />
                </span>
                <select
                    class="w-full h-full p-3 px-10 text-sm bg-white border border-slate-300 text-gray-1 focus:outline-none lg:h-20 lg:text-lg text-ellipsis"
                    name="filter[county]">
                    <option value=""> {{ __('txt.placeholders.anywhere_country') }} </option>
                    @foreach ($counties as $county)
                        <option value="{{ $county->id }}" @selected(request()->integer('filter.county') === $county->id)>
                            {{ $county->name }}
                        </option>
                    @endforeach
                </select>
            </label>

            <label class="relative block sm:col-span-4">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <x-heroicon-o-presentation-chart-bar class="w-6 h-6 text-gray-1" />
                </span>
                <select
                    class="w-full h-full p-3 px-10 text-sm bg-white border border-slate-300 text-gray-1 focus:outline-none lg:h-20 lg:text-lg text-ellipsis"
                    name="filter[intervention_domain]" onchange="getDomains(@js(__('txt.placeholders.domain')))">
                    <option value=""> {{ __('txt.placeholders.any_domain') }} </option>
                    @foreach ($interventionDomains as $domain)
                        <option value="{{ $domain->id }}" @selected(request()->integer('filter.intervention_domain') === $domain->id)>
                            {{ $domain->name }}
                        </option>
                    @endforeach
                </select>
            </label>

            <label class="relative block sm:col-span-4">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <x-heroicon-o-user-group class="w-6 h-6 text-gray-1" />
                </span>
                <select
                    class="w-full h-full p-3 px-10 text-sm bg-white border border-slate-300 text-gray-1 focus:outline-none lg:h-20 lg:text-lg text-ellipsis"
                    name="filter[beneficiary]">
                    <option value=""> {{ __('txt.placeholders.any_beneficiary') }} </option>
                    @foreach ($beneficiaries as $beneficiary)
                        <option value="{{ $beneficiary->id }}" @selected(request()->integer('filter.beneficiary') === $beneficiary->id)>
                            {{ $beneficiary->name }}
                        </option>
                    @endforeach
                </select>
            </label>

            <button class="py-4 font-bold button sm:col-span-4 bg-orange-1 hover:bg-blue-1" type="submit">
                {{ __('txt.buttons.search') }}
            </button>
        </form>
    </div>
</section>
