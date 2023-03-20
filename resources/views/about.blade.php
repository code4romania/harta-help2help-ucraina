<x-layout>

    {{-- individual title for each page in metatags --}}
    <x-slot:title>
        Help2Help About Page
        </x-slot>
<div class="about-page ">
        <section class="flex flex-col">

            <div class="flex flex-col items-center justify-center md:flex-row">

                <div class="w-2/5">
                    <img class="w-full p-3" src="{{ Vite::asset('resources/images/design/help-big.png') }}" alt="Logo">
                </div>
                <div class="container mx-auto flex w-full flex-col sm:p-5">
                    <h4 class="mb-0 mt-5 self-center text-2xl"> {{ __('txt.footer.partners') }}</h4>
                    <div class="my-6 flex items-center lg:w-11/12 justify-evenly ">
                        <a class="mx-2 md:mx-4" href="https://fonpc.ro/">
                            <img class="h-8 md:h-10 lg:h-16" src="{{ Vite::asset('resources/images/design/fonpc.png') }}" alt="fonpc"
                                target="_blank">
                        </a>
                        <a  class="mx-2 md:mx-4"  href="https://www.care-international.org/our-work/where-we-work/romania">
                            <img class="h-12 md:h-16 lg:h-24 " src="{{ Vite::asset('resources/images/design/care.png') }}" alt="care"
                                target="_blank">
                        </a>
                        <a  class="mx-2 md:mx-4"  href="https://www.sera.ro/seraromania/en/">
                            <img class="h-12 md:h-16 lg:h-24 " src="{{ Vite::asset('resources/images/design/sera.png') }}" alt="sera"
                                target="_blank">
                        </a>
                        <a  class="mx-2 md:mx-4"  href="https://code4.ro/en/donate/">
                            <img class="h-8 md:h-10 lg:h-16" src="{{ Vite::asset('resources/images/design/code4ro.png') }}" alt="code4ro"
                                target="_blank">
                        </a>
                    </div>
                </div>
            </div>
            <h2 class="text-xl md:text-2xl lg:text-3xl 2xl:text-4xl mt-5 "> {{ __('txt.about.about_project') }}</h2>
            <p>{{ __('txt.about.text') }}</p>
            <p>{{ __('txt.about.text1') }}</p>
            <p>{{ __('txt.about.text2') }}</p>
            <p>{{ __('txt.about.text3') }}</p>
            <p>{{ __('txt.about.text4') }}</p>
            <p>{{ __('txt.about.text5') }}</p>
            <p>{{ __('txt.about.text6') }}</p>
        </section>
    </div>
</x-layout>
