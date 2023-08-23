<header class="relative flex items-center w-full h-28 min-h-fit bg-gray-2">
    <div class="container flex items-center justify-between h-16 gap-5 px-2 mx-auto md:h-24 lg:gap-6">
        <a class="order-1 block w-16 logo-box md:w-24 shrink-0" href="https://helptohelpukraine.ro">
            <img src="{{ Vite::asset('resources/images/design/help-big.png') }}" alt="HELP TO HELP UKRAINE">
        </a>

        <div class="order-3 block text-3xl cursor-pointer lg:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                onclick="toggleMenu()">
                <span class="sr-only">Toggle main menu</span>
                <svg class="w-8 h-8 menu-button-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg class="hidden w-8 h-8 menu-button-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="flex-wrap items-center justify-center flex-1 order-2 hidden w-full lg:flex">
            <nav class="flex items-center font-bold divide-x divide-y-0 divide-gray-300 md:flex whitespace-nowrap">
                <a class="block px-3 text-center" href="{{ localized_route('home') }}">
                    {{ __('txt.header.home') }}
                </a>

                <a class="block px-3 text-center" href="{{ localized_route('about') }}">
                    {{ __('txt.header.about_project') }}
                </a>

                <a class="block px-3 text-center" href="{{ localized_route('services') }}">
                    {{ __('txt.header.services_map') }}
                </a>

                <a class="block px-3 text-center" href="{{ localized_route('ngos') }}">
                    {{ __('txt.header.ngos') }}
                </a>

                <a class="block px-3 text-center" href="{{ localized_route('contact') }}">
                    {{ __('txt.header.contact') }}
                </a>

                <select class="py-0 pl-3 border-0 bg-gray-2" id="langSwitcher" onchange="switchLang(this.value)">
                    @foreach ($languages as $code => $name)
                        <option value="{{ $code }}" @selected(app()->getLocale() === $code)>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </nav>
        </div>

        <div class="absolute inset-x-0 z-50 order-9 hidden p-6 transition origin-top transform shadow-lg top-full bg-gray-2 lg:hidden"
            id="mobile-menu">
            <div class="container flex flex-col gap-2">
                <a class="block px-3 py-2 -mx-3 text-base font-semibold leading-7 rounded-lg hover:bg-"
                    href="{{ localized_route('home') }}">
                    {{ __('txt.header.home') }}
                </a>

                <a class="block px-3 py-2 -mx-3 text-base font-semibold leading-7 rounded-lg hover:bg-"
                    href="{{ localized_route('about') }}">
                    {{ __('txt.header.about_project') }}
                </a>

                <a class="block px-3 py-2 -mx-3 text-base font-semibold leading-7 rounded-lg hover:bg-"
                    href="{{ localized_route('services') }}">
                    {{ __('txt.header.services_map') }}
                </a>

                <a class="block px-3 py-2 -mx-3 text-base font-semibold leading-7 rounded-lg hover:bg-"
                    href="{{ localized_route('ngos') }}">
                    {{ __('txt.header.ngos') }}
                </a>

                <a class="block px-3 py-2 -mx-3 text-base font-semibold leading-7 rounded-lg hover:bg-"
                    href="{{ localized_route('contact') }}">
                    {{ __('txt.header.contact') }}
                </a>

                <select class="flex flex-wrap pl-0 text-base font-bold border-0 bg-gray-2 lg:text-lg" id="langSwitcher"
                    onchange="switchLang(this.value)">
                    @foreach ($languages as $code => $name)
                        <option value="{{ $code }}" @selected(app()->getLocale() === $code)>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <a class="order-2 block w-24 logo-box md:w-32 lg:order-3 shrink-0" href="{{ url('contact') }}">
            <img src="{{ Vite::asset('resources/images/design/fonpc.png') }}" alt="Logo">
        </a>
    </div>
</header>
