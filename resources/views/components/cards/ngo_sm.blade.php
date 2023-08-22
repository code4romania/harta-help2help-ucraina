<div class="card my-2 p-5 sm:p-10 md:w-[48%] lg:w-[32%]">
    <img class="w-24" src="{{ $ngo->getFirstMediaUrl() ?: Vite::asset('resources/images/design/placeholder.png') }}"
        alt="{{ $ngo->name }}">

    <h4 class="my-2 text-xl font-bold">{{ $ngo->name }}</h4>
    <p>{{ Str::limit($ngo->description, 520, '...') }}</p>
    <a href="{{ localized_route('ngo.index', ['ngo' => $ngo]) }}"
        class="flex items-center justify-center w-full h-12 text-center text-black rounded-md bg-orange1 hover:bg-blue1">{{ __('txt.buttons.see_more') }}</a>
</div>
