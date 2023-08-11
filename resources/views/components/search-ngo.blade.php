<section class="search py-32" id="search-container">
    <div class="flex flex-col items-center justify-center pb-24">
        <h2 class="text-center text-xl lg:text-3xl"> {{ __('txt.search_ngo.search_title') }}</h2>
        <p class="text-base lg:text-2xl"> {{ __('txt.search_ngo.search_text') }} </p>
    </div>
    <div class="container flex flex-col items-center justify-center">
        <form class="mx-auto w-4/5" action="{{ route('ngos', ['local' => app()->getLocale()]) }}">
            <div class="mt-10 flex flex-col lg:h-20 lg:flex-row">
                <label class="relative block w-full lg:w-3/4">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <x-heroicon-o-search class="h-6 w-6 text-gray1" />
                    </span>
                    <input
                        class="my-1 w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 focus:outline-none lg:my-0 lg:h-20 lg:text-lg"
                        name="search" type="text" value="{{ request()->get('search') }}"
                        placeholder="{{ __('txt.search_ngo.search_text_span') }}" />
                </label>

                <label class="relative block w-full lg:w-1/4 lg:pr-1">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <x-heroicon-o-location-marker class="h-6 w-6 text-gray1" />
                    </span>
                    <select
                        class="my-1 w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 text-gray1 focus:outline-none lg:mx-1 lg:my-0 lg:h-20 lg:text-lg"
                        id="county-select" name="county" onchange="">
                        <option value=""> {{ __('txt.placeholders.anywhere_country') }} </option>
                        @foreach ($counties as $county)
                            <option value="{{ $county->id }}" @if (request()->get('county') == $county->id) selected @endif>
                                {{ $county->name }} </option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="my-5 flex flex-col justify-between lg:h-20 lg:flex-row">
                <label class="relative my-1 block w-full lg:my-0 lg:w-1/2">

                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <x-heroicon-o-presentation-chart-bar class="h-6 w-6 text-gray1" />
                    </span>
                    <select
                        class="w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 text-gray1 focus:outline-none lg:my-0 lg:mr-1 lg:h-20 lg:text-lg"
                        id="county-select" name="intervention_domain" onchange="getDomains(@js(__('txt.placeholders.domain')))">
                        <option value=""> {{ __('txt.placeholders.any_domain') }} </option>
                        @foreach ($interventionsDomains as $domain)
                            <option value="{{ $domain->id }}" @if (request()->get('intervention_domain') == $domain->id) selected @endif>
                                {{ $domain->name }} </option>
                        @endforeach
                    </select>
                </label>
                <label class="relative my-1 block w-full lg:mx-1 lg:my-0 lg:w-1/2">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <x-heroicon-o-user-group class="h-6 w-6 text-gray1" />
                    </span>
                    <select
                        class="w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 text-gray1 focus:outline-none lg:mx-1 lg:mx-1 lg:my-0 lg:h-20 lg:text-lg"
                        id="county-select" name="beneficiary">
                        <option value=""> {{ __('txt.placeholders.any_beneficiary') }} </option>
                        @foreach ($beneficiaries as $beneficiary)
                            <option value="{{ $beneficiary->id }}" @if (request()->get('beneficiary') == $beneficiary->id) selected @endif>
                                {{ $beneficiary->name }} </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="my-5 flex flex-col justify-between lg:h-20 lg:flex-row">
                <label class="relative my-1 block w-full lg:mx-1 lg:my-0 lg:w-3/4">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <x-heroicon-o-light-bulb class="h-6 w-6 text-gray1" />
                    </span>
                    <select
                        class="w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 text-gray1 focus:outline-none lg:mx-1 lg:mx-1 lg:my-0 lg:h-20 lg:text-lg"
                        id="county-select" name="status">
                        <option value=""> {{ __('txt.placeholders.project_status') }} </option>
                        <option value="active" @if (request()->get('status') == 'active') selected @endif>
                            {{ __('txt.service_card.project_active') }}</option>
                        <option value="finished" @if (request()->get('status') == 'finished') selected @endif>
                            {{ __('txt.service_card.project_finished') }}</option>
                    </select>
                </label>
                <button class="button my-1 ml-1 w-full bg-orange1 p-4 font-bold hover:bg-blue1 lg:my-0 lg:w-1/4"
                    type="submit">
                    {{ __('txt.buttons.search') }}
                </button>

            </div>
        </form>
    </div>

</section>
