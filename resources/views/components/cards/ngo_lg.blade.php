<div class="card container my-2 flex-col p-5 sm:p-10 md:flex-row">
    <div class="flex w-4/5 flex-col items-center self-center p-5 sm:w-2/3 md:w-1/3">
        <img class="w-full" src="{{ Vite::asset('resources/images/design/cercetas1.png') }}" alt="sera">
        <button
            class="my-2 mt-3 h-12 w-full rounded-md bg-orange1 text-black hover:bg-blue1">{{ __('txt.buttons.see_more') }}</button>
    </div>
    <div class="flex w-full flex-col p-5 md:w-2/3">
        <h2 class="my-2 font-bold">Organizația Naționala Cercetașii României</h2>
        <p>Renăscută în 1990, Organizaţia Naţională „Cercetaşii României“ este cea mai mare mişcare neguvernamentală de
            tineret din România. Din 1993, Organizaţia Naţională „Cercetaşii României“ este singura mişcare
            cercetăşească din România recunoscută în Organizaţia Mondială a Mişcării Scout, care numără în prezent peste
            50.000.000 membri activi în 216 ţări şi teritorii. În România, peste 6.000 de membri îşi desfăşoară
            activitatea în 79 de grupuri. Cercetașii României au deschis în octombrie un centru educațional în
            București, unde organizează activități pentru grupuri mixte de copii români și ucraineni, oferind acces la
            formare continuă pentru copii și tineri și integrarea întregii familii în comunitate, prin programe de
            dezvoltare fizică, creativă, cognitivă și emoțională, activități tematice pentru copii sau evenimente pentru
            întreaga familie.</p>
        <p class="font-bold">{{ __('txt.ngo_card.activity_domains') }} <span
                class="text-orange1">{{ __('txt.domains.education') }}, {{ __('txt.domains.youth') }},
                {{ __('txt.domains.research') }} </span> </p>
        <p class="font-bold">{{ __('txt.ngo_card.intervention_domains') }} <span
                class="text-orange1">{{ __('txt.domains.education') }} </span> </p>
        <p class="font-bold">{{ __('txt.ngo_card.beneficiaries_nr') }} <span class="text-orange1">13000</span> </p>

        <div class="flex flex-col sm:flex-row">
            <div class="flex w-full flex-col md:w-1/2">
                <p class="font-medium"> Contact </p>
                <p class="flex font-medium">
                    <x-heroicon-o-phone class="mr-1 h-5 w-5 text-gray1" /> 0712345678
                </p>
                <p class="flex font-medium">
                    <x-heroicon-o-mail class="mr-1 h-5 w-5 text-gray1" /> contact@organizatie.com
                </p>
                <p class="flex font-medium">
                    <x-heroicon-o-home class="mr-1 h-5 w-5 text-gray1" /> Turda, judetul Cluj
                </p>
                <p class="flex font-medium">
                    <x-heroicon-o-globe class="mr-1 h-5 w-5 text-gray1" /> www.site-organizatie.ro
                </p>
            </div>
            <div class="flex w-full flex-col md:w-1/2">
                <p class="font-medium"> Social Media </p>
                <p class="flex font-medium">

                    <svg fill="#6B7280" height="24px" width="24px" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-143 145 512 512" xml:space="preserve">
                        <g>
                            <path
                                d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M272.8,560.7
    c-20.8,20.8-44.9,37.1-71.8,48.4c-27.8,11.8-57.4,17.7-88,17.7c-30.5,0-60.1-6-88-17.7c-26.9-11.4-51.1-27.7-71.8-48.4
    c-20.8-20.8-37.1-44.9-48.4-71.8C-107,461.1-113,431.5-113,401s6-60.1,17.7-88c11.4-26.9,27.7-51.1,48.4-71.8
    c20.9-20.8,45-37.1,71.9-48.5C52.9,181,82.5,175,113,175s60.1,6,88,17.7c26.9,11.4,51.1,27.7,71.8,48.4
    c20.8,20.8,37.1,44.9,48.4,71.8c11.8,27.8,17.7,57.4,17.7,88c0,30.5-6,60.1-17.7,88C309.8,515.8,293.5,540,272.8,560.7z" />
                            <path
                                d="M146.8,313.7c10.3,0,21.3,3.2,21.3,3.2l6.6-39.2c0,0-14-4.8-47.4-4.8c-20.5,0-32.4,7.8-41.1,19.3
    c-8.2,10.9-8.5,28.4-8.5,39.7v25.7H51.2v38.3h26.5v133h49.6v-133h39.3l2.9-38.3h-42.2v-29.9C127.3,317.4,136.5,313.7,146.8,313.7z" />
                        </g>
                    </svg>
                    <svg class="mx-10" fill="#6B7280" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                        viewBox="0 0 169.063 169.063" xml:space="preserve">
                        <g>
                            <path
                                d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752
   c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407
   c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752
   c17.455,0,31.656,14.201,31.656,31.655V122.407z" />
                            <path
                                d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561
   C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561
   c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z" />
                            <path
                                d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78
   c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78
   C135.661,29.421,132.821,28.251,129.921,28.251z" />
                        </g>
                    </svg>

                    <svg fill="#6B7280" height="24px" width="24px" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-143 145 512 512" xml:space="preserve">
                        <g>
                            <path
                                d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M272.8,560.7
		c-20.8,20.8-44.9,37.1-71.8,48.4c-27.8,11.8-57.4,17.7-88,17.7c-30.5,0-60.1-6-88-17.7c-26.9-11.4-51.1-27.7-71.8-48.4
		c-20.8-20.8-37.1-44.9-48.4-71.8C-107,461.1-113,431.5-113,401s6-60.1,17.7-88c11.4-26.9,27.7-51.1,48.4-71.8
		c20.9-20.8,45-37.1,71.9-48.5C52.9,181,82.5,175,113,175s60.1,6,88,17.7c26.9,11.4,51.1,27.7,71.8,48.4
		c20.8,20.8,37.1,44.9,48.4,71.8c11.8,27.8,17.7,57.4,17.7,88c0,30.5-6,60.1-17.7,88C309.8,515.8,293.5,540,272.8,560.7z" />
                            <path
                                d="M234.3,313.1c-10.2,6-21.4,10.4-33.4,12.8c-9.6-10.2-23.3-16.6-38.4-16.6c-29,0-52.6,23.6-52.6,52.6c0,4.1,0.4,8.1,1.4,12
		c-43.7-2.2-82.5-23.1-108.4-55c-4.5,7.8-7.1,16.8-7.1,26.5c0,18.2,9.3,34.3,23.4,43.8c-8.6-0.3-16.7-2.7-23.8-6.6v0.6
		c0,25.5,18.1,46.8,42.2,51.6c-4.4,1.2-9.1,1.9-13.9,1.9c-3.4,0-6.7-0.3-9.9-0.9c6.7,20.9,26.1,36.1,49.1,36.5
		c-18,14.1-40.7,22.5-65.3,22.5c-4.2,0-8.4-0.2-12.6-0.7c23.3,14.9,50.9,23.6,80.6,23.6c96.8,0,149.7-80.2,149.7-149.7
		c0-2.3,0-4.6-0.1-6.8c10.3-7.5,19.2-16.7,26.2-27.3c-9.4,4.2-19.6,7-30.2,8.3C222.1,335.7,230.4,325.4,234.3,313.1z" />
                        </g>
                    </svg>
                </p>
            </div>
        </div>
    </div>
</div>
