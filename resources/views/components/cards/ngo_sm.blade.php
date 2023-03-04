<div class="card my-2 p-5 sm:p-10 md:w-[48%] lg:w-[32%]">
    <img class="w-24" src="{{$ngo->getFirstMediaUrl()}}" alt="sera">

    <h4 class="my-2 text-xl font-bold">{{$ngo->name}}</h4>
    <p>{{$ngo->description}}</p>
    <a href="{{route('ngo.index',$ngo->slug)}}"
        class="my-2 mt-3 h-12 w-full rounded-md bg-orange1 text-black hover:bg-blue1 md:mt-auto">{{ __('txt.buttons.see_more') }}</a>
</div>
