<section class="search py-32" id="search-container">
    <div class="flex flex-col items-center justify-center pb-24">
        <h2 class="text-center text-xl lg:text-3xl"> {{ __('txt.search_ngo.search_title') }}</h2>
        <p class="text-base lg:text-2xl"> {{ __('txt.search_ngo.search_text') }} </p>
    </div>

    <div class="container">
        <form class="mx-auto lg:w-4/5 grid sm:grid-cols-12 gap-y-4 items-stretch" action="{{ route('ngos', ['local' => app()->getLocale()]) }}">
            <label class="relative block sm:col-span-9">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <x-heroicon-o-search class="h-6 w-6 text-gray1" />
                </span>
                <input
                    class="w-full border border-slate-300 bg-white p-3 px-10 text-gray1 focus:outline-none h-full lg:h-20 text-sm lg:text-lg text-ellipsis"
                    name="search" type="text" value="{{ request()->get('search') }}"
                    placeholder="{{ __('txt.search_ngo.search_text_span') }}" />
            </label>

            <label class="relative block sm:col-span-3">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <x-heroicon-o-location-marker class="h-6 w-6 text-gray1" />
                </span>
                <select
                    class="w-full border border-slate-300 bg-white p-3 px-10 text-gray1 focus:outline-none h-full lg:h-20 text-sm lg:text-lg text-ellipsis"
                    id="county-select" name="county" onchange="">
                    <option value=""> {{ __('txt.placeholders.anywhere_country') }} </option>
                    @foreach ($counties as $county)
                        <option value="{{ $county->id }}" @if (request()->get('county') == $county->id) selected @endif>
                            {{ $county->name }} </option>
                    @endforeach
                </select>
            </label>

            <label class="relative block sm:col-span-4">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <x-heroicon-o-presentation-chart-bar class="h-6 w-6 text-gray1" />
                </span>
                <select
                    class="w-full border border-slate-300 bg-white p-3 px-10 text-gray1 focus:outline-none h-full lg:h-20 text-sm lg:text-lg text-ellipsis"
                    id="county-select" name="intervention_domain" onchange="getDomains(@js(__('txt.placeholders.domain')))">
                    <option value=""> {{ __('txt.placeholders.any_domain') }} </option>
                    @foreach ($interventionsDomains as $domain)
                        <option value="{{ $domain->id }}" @if (request()->get('intervention_domain') == $domain->id) selected @endif>
                            {{ $domain->name }} </option>
                    @endforeach
                </select>
            </label>

            <label class="relative block sm:col-span-4">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <x-heroicon-o-user-group class="h-6 w-6 text-gray1" />
                </span>
                <select
                    class="w-full border border-slate-300 bg-white p-3 px-10 text-gray1 focus:outline-none h-full lg:h-20 text-sm lg:text-lg text-ellipsis"
                    id="county-select" name="beneficiary">
                    <option value=""> {{ __('txt.placeholders.any_beneficiary') }} </option>
                    @foreach ($beneficiaries as $beneficiary)
                        <option value="{{ $beneficiary->id }}" @if (request()->get('beneficiary') == $beneficiary->id) selected @endif>
                            {{ $beneficiary->name }} </option>
                    @endforeach
                </select>
            </label>

            <button class="button sm:col-span-4 bg-orange1 py-4 font-bold hover:bg-blue1" type="submit">
                {{ __('txt.buttons.search') }}
            </button>
        </form>
    </div>
</section>
