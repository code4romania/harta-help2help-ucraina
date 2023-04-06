<section
    class="py-64 search"
    id="search-container""
>
    <div class="container flex flex-col items-center justify-center">
<h2 class="text-center text-xl lg:text-2xl"> {{ __('txt.home.search_title') }}</h2>
<p class="text-base lg:text-xl"> {{ __('txt.home.search_text') }} <span class="font-bold underline"> <a
            href="{{ url('services') }}">{{ __('txt.home.search_text_span') }} </a>
        </span>
</p>

<div class="mt-10 flex w-4/5 flex-col lg:h-20 lg:flex-row">
    <label class="relative block w-full lg:w-3/4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <x-heroicon-o-search class="h-6 w-6 text-gray1"/>
            </span>
        <input
            class="my-1 w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 focus:outline-none lg:my-0 lg:h-20 lg:text-lg"
            type="text" placeholder="{{ __('txt.placeholders.search_services') }}"/>
    </label>

    <label class="relative block w-full lg:w-1/4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <x-heroicon-o-location-marker class="h-6 w-6 text-gray1"/>
            </span>
        <select
            class="my-1 w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 text-gray1 focus:outline-none lg:mx-1 lg:my-0 lg:h-20 lg:text-lg"
            id="county-select" name="" onchange="getCities(@js(__('txt.placeholders.city')))">
            <option disabled selected> {{ __('txt.placeholders.anywhere_country') }} </option>
            @foreach ($counties as $county)
                <option value="{{ $county->id }}"> {{ $county->name }} </option>
            @endforeach
        </select>
    </label>
</div>

<div class="my-5 flex w-4/5 flex-col justify-between lg:h-20 lg:flex-row">
    <label class="relative my-1 block w-full lg:mx-1 lg:my-0 lg:w-1/4 ">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <x-heroicon-o-presentation-chart-bar class="h-6 w-6 text-gray1"/>
            </span>
        <select
            class="w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 text-gray1 focus:outline-none lg:mx-1 lg:mx-1 lg:my-0 lg:h-20 lg:text-lg"
            id="county-select" name="" onchange="getDomains(@js(__('txt.placeholders.domain')))">
            <option disabled selected> {{ __('txt.placeholders.any_domain') }} </option>
            @foreach ($interventionsDomains as $domain)
                <option value="{{ $domain->id }}"> {{ $domain->name }} </option>
            @endforeach
        </select>
    </label>
    <label class="relative my-1 block w-full lg:mx-1 lg:my-0 lg:w-1/4 ">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <x-heroicon-o-user-group class="h-6 w-6 text-gray1"/>
            </span>
        <select
            class="w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 text-gray1 focus:outline-none lg:mx-1 lg:mx-1 lg:my-0 lg:h-20 lg:text-lg"
            id="county-select" name="" onchange="getBeneficiaries(@js(__('txt.placeholders.beneficiary')))">
            <option disabled selected> {{ __('txt.placeholders.any_beneficiary') }} </option>
            @foreach ($beneficiaries as $beneficiary)
                <option value="{{ $beneficiary->id }}"> {{ $beneficiary->name }} </option>
            @endforeach
        </select>
    </label>
    <label class="relative my-1 block w-full lg:mx-1 lg:my-0 lg:w-1/4 ">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <x-heroicon-o-light-bulb class="h-6 w-6 text-gray1"/>
            </span>
        <select
            class="w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 text-gray1 focus:outline-none lg:mx-1 lg:mx-1 lg:my-0 lg:h-20 lg:text-lg"
            id="county-select" name="" onchange="getStatuses(@js(__('txt.placeholders.status')))">
            <option disabled selected> {{ __('txt.placeholders.project_status') }} </option>
            <option value="open">{{__('txt.service_card.project_active')}}</option>
            <option value="close">{{__('txt.service_card.project_finished')}}</option>
        </select>
    </label>

    <x-ui.button>
        {{ __('txt.buttons.search') }}</x-ui.button>
</div>
</div>
</section>
