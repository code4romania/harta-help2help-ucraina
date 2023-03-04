<section class="search h-[600px] flex-col items-center justify-center px-3 lg:h-[700px]" id="search-container"">
    <h2 class="text-center text-xl lg:text-2xl"> {{ __('txt.home.search_title') }}</h2>
    <p class="text-base lg:text-xl"> {{ __('txt.home.search_text') }} <span class="font-bold underline"> <a
                href="{{ url('services') }}">{{ __('txt.home.search_text_span') }} </a>
        </span>
    </p>

    <div class="mt-10 flex w-4/5 flex-col lg:h-20 lg:flex-row">
        <label class="relative block w-full lg:w-3/4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="h-5 w-5 fill-gray1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                    width="30" height="30" viewBox="0 0 30 30">
                    <path
                        d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                    </path>
                </svg>
            </span>
            <input
                class="my-1 w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 pr-4 focus:outline-none lg:my-0 lg:h-20 lg:text-lg"
                type="text" placeholder="{{ __('txt.placeholders.search_services') }}" />
        </label>
        <label class="relative block w-full lg:w-1/4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="h-5 w-5 fill-gray1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                    width="30" height="30" viewBox="0 0 30 30">
                    <path
                        d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                    </path>
                </svg>
            </span>
            <select class="my-1 w-full rounded-sm border border-slate-300 bg-white p-3 pl-10 lg:mx-1 pr-4 focus:outline-none lg:my-0 lg:h-20 lg:text-lg  text-gray1" id="county-select" name=""
                onchange="getCities(@js(__('txt.placeholders.city')))">
                <option disabled selected> {{ __('txt.placeholders.anywhere_country') }} </option>
                {{-- @foreach ($counties as $county) --}}
                {{-- <option value="{{ $county->id }}"> {{ $county->name }} </option> --}}
                {{-- @endforeach --}}

            </select>
            
        </label>
   
        <div class="relative w-full lg:w-1/4">
           

            
        </div>
    </div>
    <div class="my-5 flex w-4/5 flex-col justify-between lg:h-20 lg:flex-row">
        <select class="my-1 w-full border p-3 lg:mx-1 lg:my-0 lg:w-1/4 lg:p-4" id="domain-select" name=""
            onchange="getDomains(@js(__('txt.placeholders.domain')))">
            <option disabled selected> {{ __('txt.placeholders.any_domain') }} </option>
            {{-- @foreach ($domains as $domain) --}}
            {{-- <option value="{{ $domain->id }}"> {{ $domain->name }} </option> --}}
            {{-- @endforeach --}}
        </select>

        <select class="my-1 w-full border p-3 lg:mx-1 lg:my-0 lg:w-1/4 lg:p-4" id="beneficiary-select" name=""
            onchange="getBeneficiaries(@js(__('txt.placeholders.beneficiary')))">
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
