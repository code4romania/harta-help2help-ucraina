<section class="search h-[600px] flex-col items-center justify-center px-3 lg:h-[700px]" id="search-container"">
    <h2 class="text-center text-xl lg:text-2xl"> {{ __('txt.home.search_title') }}</h2>
    <p class="text-base lg:text-xl"> {{ __('txt.home.search_text') }} <span class="font-bold underline"> <a
                href="{{ url('services') }}">{{ __('txt.home.search_text_span') }} </a>
        </span>
    </p>

    <div class="mt-10 flex w-4/5 flex-col lg:h-20 lg:flex-row">
        <div class="w-full lg:w-3/4">
            <i class="fa fa-magnifying-glass"></i>
            <input class="my-1 w-full p-3 lg:my-0 lg:h-20 lg:p-6 lg:text-lg" id="search-input" type="text"
                placeholder="{{ __('txt.placeholders.search_services') }}">
        </div>
        <select class="my-1 w-full border p-3 lg:mx-1 lg:my-0 lg:w-1/4 lg:p-4" id="county-select" name=""
            onchange="getCities(@js(__('txt.placeholders.city')))">
            <option disabled selected> {{ __('txt.placeholders.anywhere_country') }} </option>
            {{-- @foreach ($counties as $county) --}}
            {{-- <option value="{{ $county->id }}"> {{ $county->name }} </option> --}}
            {{-- @endforeach --}}
        </select>
    </div>
    <div class="my-5 flex w-4/5 flex-col justify-between lg:h-20 lg:flex-row">
        <select class="my-1 w-full border p-3 lg:mx-1 lg:my-0 lg:w-1/4 lg:p-4" id="domain-select" name=""
            onchange="getDomains(@js(__('txt.placeholders.domain')))">
            <option disabled selected> {{ __('txt.placeholders.any_domain') }} </option>
            {{-- @foreach ($domains as $domain) --}}
            {{-- <option value="{{ $domain->id }}"> {{ $domain->name }} </option> --}}
            {{-- @endforeach --}}
        </select>

        <select class="my-1 w-full border p-3 lg:mx-1 lg:my-0 lg:w-1/4 lg:p-4" id="beneficiary-select"
            name="" onchange="getBeneficiaries(@js(__('txt.placeholders.beneficiary')))">
            <option disabled selected> {{ __('txt.placeholders.any_beneficiary') }} </option>
            {{-- @foreach ($beneficiaries as $beneficiary) --}}
            {{-- <option value="{{ $beneficiary->id }}"> {{ $beneficiary->name }} </option> --}}
            {{-- @endforeach --}}
        </select>
        <select class="my-1 w-full border p-3 lg:mx-1 lg:my-0 lg:w-1/4 lg:p-4" id="status-select" name=""
            onchange="getStatuses(@js(__('txt.placeholders.status')))">
            <option disabled selected> {{ __('txt.placeholders.project_status') }} </option>
            {{-- @foreach ($statuses as $status) --}}
            {{-- <option value="{{ $status->id }}"> {{ $status->name }} </option> --}}
            {{-- @endforeach --}}
        </select>
        <x-ui.button>
            {{ __('txt.buttons.search') }}</x-ui.button>
    </div>
</section>