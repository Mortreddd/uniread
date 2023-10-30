<section class="w-full p-3 h-fit" :works="$works">
    @unless(empty($works))
    <div class="flex items-start h-full py-3 overflow-x-scroll no-scrollbar">
        @foreach ($works as $work)
            <x-card :book="$work"/>
        @endforeach
    </div>
    @else
        <h1 class="text-4xl text-center text-slate-100">There is no works here</h1>   
    @endunless
</section>
