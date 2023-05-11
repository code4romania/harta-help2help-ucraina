<header class="flex relative h-28 min-h-fit w-full items-center bg-header">
    <div class="container mx-auto flex h-16 items-center justify-between px-2 md:h-24">
        <div class="mr-5 w-16 md:w-24 lg:mr-10">
            <a class="logo-box" href="https://helptohelpukraine.ro">
                <img src="{{ Vite::asset('resources/images/design/help.png') }}" alt="Logo">
            </a>
        </div>
        <div class="block w-24 md:hidden md:w-40">
            <a class="logo-box" href="https://helptohelpukraine.ro">
                <img src="{{ Vite::asset('resources/images/design/fonpc.png') }}" alt="Logo">
            </a>
        </div>

        <div class="block cursor-pointer text-3xl md:hidden">
            <svg class="burger-btn" id="menuTrigger" width="60" onclick="toggleMenu()" data-collapse-toggle="sideNav"
                 aria-controls="sideNav" aria-expanded="false" height="32" viewBox="0 0 40 26"
                 xmlns="http://www.w3.org/2000/svg" fill="#7CC1DF">
                <rect class="burger-btn--1" width="40" height="6" rx="3" ry="3"/>
                <rect class="burger-btn--2" width="40" height="6" y="10" rx="3"
                      ry="3"/>
                <rect class="burger-btn--3" width="40" height="6" y="20" rx="3"
                      ry="3"/>
            </svg>
        </div>

        <div class="hidden w-full flex-wrap items-center justify-center md:flex" id="sideNav">
            <nav class=" w-11/12 items-center justify-between text-base font-bold md:flex lg:text-lg ">

                <a class="mr-auto md:text-sm hover:border-b-transparent hover:text-inherit"
                   href="https://helptohelpukraine.ro/">
                    <span class="text-[#20ACEA]">HELP</span>
                    <span class="text-[#EFE900]">TO HELP</span>
                    <span class="font-light">UKRAINE</span>
                </a>

                <a class=" block py-2 pl-3 pr-4 border-r-2 px-1 lg:px-3 text-center "
                   href="{{ route('home',['local'=>app()->getLocale()]) }}"> {{ __('txt.header.home') }} </a>

                <a class=" block py-2 pl-3 pr-4 border-r-2 px-1 lg:px-3 text-center"
                   href="{{ route('about', ['local'=>app()->getLocale()]) }}">{{ __('txt.header.about_project') }} </a>

                <a class="border-r-2 px-1 lg:px-3 text-center"
                   href="{{ route('services', ['local'=>app()->getLocale()]) }}">{{ __('txt.header.services_map') }}</a>

                <a class="border-r-2 px-1 lg:px-3 text-center"
                   href="{{ route('ngos',['local'=>app()->getLocale()]) }}">{{ __('txt.header.ngos') }}</a>

                <a class="border-r-2 px-1 lg:px-3 text-center"
                   href="{{ route('contact', ['local'=>app()->getLocale()]) }}"> {{ __('txt.header.contact') }} </a>


            </nav>

            <select class="ml-5 border-0 bg-header text-base font-bold lg:text-lg" id="langSwitcher"
                    onchange="switchLang(this.value)">
                <option value="ro" lang="ro" @if(app()->getLocale() == 'ro') selected @endif>RO</option>
                <option value="en" lang="en" @if(app()->getLocale() == 'en') selected @endif >EN</option>
                <option value="uk" lang="uk" @if(app()->getLocale() == 'uk') selected @endif >UK</option>
            </select>
        </div>

        <div class="hidden bg-header absolute inset-x-0 z-50 transition origin-top transform  shadow-lg top-full lg:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a class=" flex flex-wrap border-r-2 px-1 lg:px-3 text-center "
                   href="{{ route('home',['local'=>app()->getLocale()]) }}"> {{ __('txt.header.home') }} </a>

                <a class=" flex flex-wrap  border-r-2 px-1 lg:px-3 text-center"
                   href="{{ route('about', ['local'=>app()->getLocale()]) }}">{{ __('txt.header.about_project') }} </a>

                <a class="flex flex-wrap  border-r-2 px-1 lg:px-3 text-center"
                   href="{{ route('services', ['local'=>app()->getLocale()]) }}">{{ __('txt.header.services_map') }}</a>

                <a class="flex flex-wrap  border-r-2 px-1 lg:px-3 text-center"
                   href="{{ route('ngos',['local'=>app()->getLocale()]) }}">{{ __('txt.header.ngos') }}</a>

                <a class="flex flex-wrap border-r-2 px-1 lg:px-3 text-center"
                   href="{{ route('contact', ['local'=>app()->getLocale()]) }}"> {{ __('txt.header.contact') }} </a>
                <select class="flex flex-wrap border-0 bg-header text-base font-bold lg:text-lg" id="langSwitcher"
                        onchange="switchLang(this.value)">
                    <option value="ro" lang="ro" @if(app()->getLocale() == 'ro') selected @endif>RO</option>
                    <option value="en" lang="en" @if(app()->getLocale() == 'en') selected @endif >EN</option>
                    <option value="uk" lang="uk" @if(app()->getLocale() == 'uk') selected @endif >UK</option>
                </select>
            </div>
        </div>

        <div class="ml-5 hidden w-24 md:block md:w-40 lg:ml-10">
            <a class="logo-box" href="{{ url('contact') }}">
                <img src="{{ Vite::asset('resources/images/design/fonpc.png') }}" alt="Logo">
            </a>
        </div>
    </div>

</header>
