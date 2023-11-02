<section class="w-full p-3 h-fit" :works="$works">
    @unless($works->isEmpty())
    <div class="flex items-start h-full py-3 overflow-x-scroll no-scrollbar">
        @foreach ($works as $work)
            <x-card :book="$work"/>
        @endforeach
    </div>
    @else
        <h1 class="my-10 text-lg text-center text-gray-500 md:text-4xl">Empty works</h1>   
    @endunless

</section>