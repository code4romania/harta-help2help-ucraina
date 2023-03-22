@props(['service'])
<div class=" card my-2 p-5 sm:p-10  md:w-[48%] lg:w-[32%]">
    <img class="w-24" src="{{$service->ngo->getFirstMediaUrl()}}" alt="sera">
    <p class="my-2 flex">
        <x-heroicon-o-location-marker class="h-5 w-5 text-gray1 mr-3"/>
        București
    </p>
    <h4 class="my-2 text-xl font-bold">{{$service->name}}</h4>
    <p>{{ __('txt.service_card.provided_by') }} <span class="font-bold">{{$service->ngo->name}}</span></p>
    <p>{{ __('txt.service_card.intervention_domains') }}  @foreach($service->interventionsDomainsName  as $id=>$domain)
            <span class="font-normal">{{$domain}}</span>
            @if(!$loop->last)
                ,
            @endif
        @endforeach</p>
    <p>{{ __('txt.service_card.beneficiary_type') }}  @foreach($service->beneficiaryGroupsName as $id=>$group)
            <span class="font-normal">{{$group}}</span>
            @if(!$loop->last)
                ,
            @endif
        @endforeach</p>
    @if ($service->status=='finished')
        <p> {{__('txt.service_card.project_finished')}}</p>
    @else
        <p>{{__('txt.service_card.project_active')}}</p>
        <p><span class="font-bold">{{ __('txt.service_card.service_access') }}  </span></p>
        <div class="w-full flex justify-between flex-wrap">
            @foreach($service->application_methods as $method)
                <p class="flex">
                    <x-heroicon-o-check-circle class="h-5 w-5 text-gray1 fill-green-300 mr-1"/>
                    {{ __('txt.service_card.'.$method['type']) }} </p>

            @endforeach
        </div>
    @endif
    <a href="{{route('ngo.index',['local'=>app()->getLocale(),'slug'=>$service->ngo->slug]).'#'.$service->slug}}"
       class="h-12 w-full flex justify-center  text-center items-center rounded-md bg-orange1 text-black hover:bg-blue1">{{ __('txt.buttons.see_more') }}</a>
</div>
