<div class="card my-2 p-5 sm:p-10 md:w-[48%] lg:w-[32%]">
    <img class="w-24" src="{{$ngo->getFirstMediaUrl()}}" alt="sera">

    <h4 class="my-2 text-xl font-bold">{{$ngo->name}}</h4>
    <p>{{$ngo->description}}</p>
    <a href="{{route('ngo.index',$ngo->slug)}}"
        class="h-12 w-full flex justify-center  text-center items-center rounded-md bg-orange1 text-black hover:bg-blue1">{{ __('txt.buttons.see_more') }}</a>
</div>
