<footer class="absolute bottom-0 flex items-center w-full h-60 min-h-fit bg-gray-2 md:h-72 lg:h-80">
    <div class="container flex flex-col w-4/5 mx-auto md:flex-row md:justify-between">
        <h4 class="self-center mb-0 text-2xl"> {{ __('txt.footer.partners') }}</h4>
        <div class="flex items-center my-6 justify-evenly lg:w-11/12">
            <a class="mx-2 md:mx-4" href="https://fonpc.ro/">
                <img class="h-8 md:h-10 lg:h-16" src="{{ Vite::asset('resources/images/design/fonpc.png') }}"
                    alt="fonpc" target="_blank">
            </a>
            <a class="mx-2 md:mx-4" href="https://www.care-international.org/our-work/where-we-work/romania">
                <img class="h-12 md:h-16 lg:h-24" src="{{ Vite::asset('resources/images/design/care.png') }}"
                    alt="care" target="_blank">
            </a>
            <a class="mx-2 md:mx-4" href="https://www.sera.ro/seraromania/en/">
                <img class="h-12 md:h-16 lg:h-24" src="{{ Vite::asset('resources/images/design/sera.png') }}"
                    alt="sera" target="_blank">
            </a>
            <a class="mx-2 md:mx-4" href="https://code4.ro/en/donate/">
                <img class="h-8 md:h-10 lg:h-16" src="{{ Vite::asset('resources/images/design/code4ro.png') }}"
                    alt="code4ro" target="_blank">
            </a>
        </div>
    </div>
</footer>
