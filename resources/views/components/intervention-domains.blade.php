<section class="-mt-24 flex-col justify-start" id="domains-container">
    <h2 class="text-xl md:text-2xl lg:text-3xl 2xl:text-4xl"> {{ __('txt.intervention_domains.intervention_domains') }}</h2>
    <div class="mt-4 flex w-full flex-col flex-wrap md:flex-row">
        @foreach($domains as $domain)
            <a href="{{route('services',['service'=>$domain['name']])}}"
               class="group card my-2 bg-gray2 p-10 text-gray1 hover:bg-blue3 hover:text-white hover:stroke:text-blue1 md:w-[48%] lg:w-[32%] aspect-square justify-center items-center">
                <x-dynamic-component :component="$domain['icon']"
                                     class="mx-auto w-24 md:w-24 lg:w-24 visible group-"/>
                <h4 class="my-2 text-center text-xl md:text-2xl lg:text-3xl font-bold">{{__('txt.intervention_domains.'.$domain['name'])}}</h4>
            </a>
        @endforeach
    </div>
</section>
