<section
    class="py-32 search"
    id="search-container"
>
    <div class="pb-64 flex flex-col items-center justify-center">
        <h2 class="text-center text-xl lg:text-3xl"> {{ __('txt.search_ngo.search_title') }}</h2>
        <p class="text-base lg:text-2xl"> {{ __('txt.search_ngo.search_text') }} <span class="font-bold underline"> <a
                >{{ __('txt.search_ngo.search_text_span') }} </a>
        </span>
        </p>
    </div>
    <div class="container flex flex-col items-center justify-center">
        <form class=" w-4/5   mx-auto" action="{{ route('ngos', ['local'=>app()->getLocale()]) }}">
            <div class="mt-10 flex flex-col lg:h-20 lg:flex-row">
                <label class="relative block w-full lg:w-3/4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <x-heroicon-o-search class="h-6 w-6 text-gray1"/>
            </span>
                    <input
                        class="my-1 w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 focus:outline-none lg:my-0 lg:h-20 lg:text-lg"
                        type="text" name="search" value="{{request()->get('search')}}" placeholder="{{ __('txt.placeholders.search_services') }}"/>
                </label>

                <label class="relative block w-full lg:w-1/4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <x-heroicon-o-location-marker class="h-6 w-6 text-gray1"/>
            </span>
                    <select
                        class="my-1 w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 text-gray1 focus:outline-none lg:mx-1 lg:my-0 lg:h-20 lg:text-lg"
                        id="county-select" name="county" onchange="">
                        <option value=""> {{ __('txt.placeholders.anywhere_country') }} </option>
                        @foreach ($counties as $county)
                            <option value="{{ $county->id }}" @if(request()->get('county')==$county->id) selected @endif> {{ $county->name }} </option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="my-5 flex flex-col justify-between lg:h-20 lg:flex-row">
                <label class="relative my-1 block w-full lg:mx-1 lg:my-0 lg:w-1/4 ">

            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <x-heroicon-o-presentation-chart-bar class="h-6 w-6 text-gray1"/>
            </span>
                    <select
                        class="w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 text-gray1 focus:outline-none lg:mx-1 lg:my-0 lg:h-20 lg:text-lg"
                        id="county-select" name="intervention_domain" onchange="getDomains(@js(__('txt.placeholders.domain')))">
                        <option value="" > {{ __('txt.placeholders.any_domain') }} </option>
                        @foreach ($interventionsDomains as $domain)
                            <option value="{{ $domain->id }}"  @if(request()->get('intervention_domain')==$domain->id) selected @endif> {{ $domain->name }} </option>
                        @endforeach
                    </select>
                </label>
                <label class="relative my-1 block w-full lg:mx-1 lg:my-0 lg:w-1/4 ">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <x-heroicon-o-user-group class="h-6 w-6 text-gray1"/>
            </span>
                    <select
                        class="w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 text-gray1 focus:outline-none lg:mx-1 lg:mx-1 lg:my-0 lg:h-20 lg:text-lg"
                        id="county-select" name="beneficiary">
                        <option value="" > {{ __('txt.placeholders.any_beneficiary') }} </option>
                        @foreach ($beneficiaries as $beneficiary)
                            <option value="{{ $beneficiary->id }}" @if(request()->get('beneficiary')==$beneficiary->id) selected @endif> {{ $beneficiary->name }} </option>
                        @endforeach
                    </select>
                </label>
                <label class="relative my-1 block w-full lg:mx-1 lg:my-0 lg:w-1/4 ">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <x-heroicon-o-light-bulb class="h-6 w-6 text-gray1"/>
            </span>
                    <select
                        class="w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 text-gray1 focus:outline-none lg:mx-1 lg:mx-1 lg:my-0 lg:h-20 lg:text-lg"
                        id="county-select" name="status">
                        <option value=""> {{ __('txt.placeholders.project_status') }} </option>
                        <option value="active" @if(request()->get('status')=='active') selected @endif>{{__('txt.service_card.project_active')}}</option>
                        <option value="finished" @if(request()->get('status')=='finished') selected @endif>{{__('txt.service_card.project_finished')}}</option>
                    </select>
                </label>
                <button type="submit" class="button w-full bg-orange1 ml-1 hover:bg-blue1 font-bold p-4 lg:w-1/4 my-1 lg:my-0">
                    {{ __('txt.buttons.search') }}
                </button>


            </div>
        </form>
    </div>
</section>
