<section class="-mt-24 flex-col justify-start" id="domains-container">
    <h2 class="text-xl md:text-2xl lg:text-3xl 2xl:text-4xl"> {{ __('txt.intervention_domains.intervention_domains') }}</h2>
    <div class="grid gap-x-0 gap-y-8 md:grid-cols-3 sm:grid-cols-1 ">
        @foreach($domains as $domain)

                <a href="{{route('services',['local'=>app()->getLocale(), 'intervention_domain'=>$domain['url']])}}"
                   class="group card my-2 bg-gray2 p-10 text-gray1 hover:bg-blue3 hover:text-white  w-64 hover:stroke:text-blue1 aspect-square justify-center items-center">
                    <div>
                        @if($domain['icon']==='icon-finance_support')
                            @svg($domain['icon'],'w-50 h-50')
                        @else
                            @svg($domain['icon'],'fill-current w-50 h-50')
                        @endif
                    </div>
                    <h4 class="my-4 text-center text-xl md:text-xl lg:text-xl font-bold">{{__('txt.intervention_domains.'.$domain['name'])}}</h4>

                </a>

        @endforeach
    </div>
</section>
