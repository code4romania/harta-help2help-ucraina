@props([
    'point'
])

<div class="card mx-2 w-full md:w-1/2 point-services hidden" id="point-id-{{$point->id}}">
    <x-heroicon-o-x class="h-5 w-5 end-0 text-gray1" onclick="hideAllPoints()"/>
    <img class="w-64 mx-auto" src="{{$point->ngo->getFirstMediaUrl()? $point->ngo->getFirstMediaUrl(): Vite::asset('resources/images/design/placeholder.png') }}"
         alt="{{$point->ngo->name}}">
    <p class="my-2 flex">
        <x-heroicon-o-location-marker class="h-5 w-5 text-gray1 mr-3"/>
        {{$point->city->name}}, {{$point->county->name}}
    </p>
    <h4 class="my-2 text-xl font-bold">{{$point->name}}</h4>
    <p><span class="font-bold">{{ __('txt.service_card.provided_by') }} </span>{{$point->ngo->name}}</p>
    <p><span class="font-bold">{{ __('txt.service_card.intervention_domains') }}</span>  @foreach($point->interventionsDomainsName  as $id=>$domain)
            <span class="font-normal">{{$domain}}</span>
            @if(!$loop->last)
                ,
            @endif
        @endforeach</p>
    <p><span class="font-bold">{{ __('txt.service_card.beneficiary_type') }}</span>  @foreach($point->beneficiaryGroupsName as $id=>$group)
            <span class="font-normal">{{$group}}</span>
            @if(!$loop->last)
                ,
            @endif
        @endforeach</p>
    @if ($point->status=='finished')
        <p> {{__('txt.service_card.project_finished')}}</p>
    @else
        <p>{{__('txt.service_card.project_active')}}</p>
        <p><span class="font-bold">{{ __('txt.service_card.service_access') }}  </span></p>
        <div class="w-full flex justify-between flex-wrap">
            @foreach($point->application_methods as $method)
                <p class="flex">
                    <x-heroicon-o-check-circle class="h-5 w-5 text-gray1 fill-green-300 mr-1"/>
                    {{ __('txt.service_card.'.$method['type']) }} </p>

            @endforeach
        </div>
    @endif
    <a href="{{route('ngo.index',['local'=>app()->getLocale(),'slug'=>$point->ngo->slug]).'#'.$point->slug}}"
       class="h-12 w-full flex justify-center  text-center items-center rounded-md bg-orange1 text-black hover:bg-blue1">{{ __('txt.buttons.see_more') }}</a>
</div>

