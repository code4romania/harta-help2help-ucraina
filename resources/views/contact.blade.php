<x-layout>

    {{-- individual title for each page in metatags --}}
    <x-slot:title>
        Help2Help Contact Page
        </x-slot>

        <section class=" container flex-col p-5">
            <h2 class="text-xl md:text-2xl lg:text-3xl 2xl:text-4xl"> {{ __('txt.contact.page_title') }}
            </h2>
            <div class="flex w-full justify-evenly md:w-2/3">
                <div class="flex w-1/2 items-center">
                    <x-heroicon-o-phone class="mr-1 h-5 w-5 text-gray1" />

                    <p class="flex flex-col p-3 font-medium">
                        {{ __('txt.contact.phone') }}
                        <span class="font-bold"> 0712345678</span>
                    </p>
                </div>
                <div class="flex w-1/2 items-center">
                    <x-heroicon-o-mail class="mr-1 h-5 w-5 text-gray1" />
                    <p class="flex flex-col p-3 font-medium">

                        {{ __('txt.contact.email_address') }}
                        <span class="font-bold"> contact@organizatie.com </span>
                    </p>
                </div>
            </div>

            <div class="mt-10 flex w-full flex-col md:flex-row md:justify-between ">
                <div class="flex w-full  md:w-1/2 flex-col">
                    <h3 class="text-xl md:text-2xl lg:text-3xl 2xl:text-4xl"> {{ __('txt.contact.contact_form') }}
                    </h3>
                    <form class="flex  w-full flex-col" action="#" method="POST">
                        <div class="flex flex-wrap justify-between">

                            <input
                                class="my-1 w-full rounded-sm border border-slate-300 bg-white p-3 pr-4 focus:outline-none md:my-3 lg:my-5 lg:h-20 lg:w-2/5 lg:text-lg"
                                id="full-name" name="full-name" type="text"
                                placeholder="{{ __('txt.placeholders.full_name') }}" />
                            <input
                                class="my-1 w-full rounded-sm border border-slate-300 bg-white p-3 pr-4 focus:outline-none md:my-3 lg:my-5 lg:h-20 lg:w-2/5 lg:text-lg"
                                id="email-address" name="email-address" type="email" autocomplete="email"
                                placeholder="{{ __('txt.placeholders.email') }}" />
                        </div>

                        <input
                            class="my-1 w-full rounded-sm border border-slate-300 bg-white p-3 pr-4 focus:outline-none md:my-3 lg:my-5 lg:h-20 lg:text-lg"
                            type="text" placeholder="{{ __('txt.placeholders.phone_opt') }}" />
                        <textarea
                            class="my-1 w-full rounded-sm border border-slate-300 bg-white p-3 pr-4 focus:outline-none md:my-3 lg:my-5 lg:h-20 lg:text-lg"
                            id="message" name="message" rows="5" placeholder="{{ __('txt.placeholders.message') }}"></textarea>

                        <div class="flex items-start">
                            <div class="flex h-6 items-center">
                                <input class="h-4 w-4 rounded border-slate-300 text-orange1 focus:ring-orange1"
                                    id="gdpr" name="gdpr" type="checkbox">
                            </div>
                            <div class="ml-3">
                                <label class="text-sm font-medium leading-6 text-gray-900 ml-5"
                                    for="gdpr">{{ __('txt.contact.gdpr') }} <a class="text-orange1"
                                        href="#">{{ __('txt.contact.gdpr_link') }}</a></label>
                            </div>
                        </div>
                        <div class="my-5 flex items-start">
                            <div class="flex h-6 items-center">
                                <input class="h-4 w-4 rounded border-slate-300 text-orange1 focus:ring-orange1"
                                    id="captcha" name="captcha" type="checkbox">
                            </div>
                            <div class="ml-3">
                                <label class="text-sm font-medium leading-6 text-gray-900 ml-5" for="captcha"> {{ __('txt.contact.not_robot') }}</label>
                            </div>
                        </div>

                        <x-ui.button class="mt-5 bg-blue1" type="submit"> {{ __('txt.buttons.send') }}</x-ui.button>
                </div>
                <div class="flex w-full md:w-2/5 flex-col mt-10 md:mt-0 px-5">
                    <h3 class="text-xl md:text-2xl lg:text-3xl 2xl:text-4xl"> {{ __('txt.contact.our_address') }}
                    </h3>
                    <p class="font-bold">Str. Occidentului 44Sector 1, București
                        <a class="font-normal underline" href="#">{{ __('txt.contact.open_gmap') }}</a>
                    </p>
                    <div class="flex justify-center items-center bg-gray-100 w-full h-96">
                        <x-heroicon-o-location-marker class="h-12 w-12 text-gray1" />


                    </div>
                </div>
            </div>
        </section>
</x-layout>
