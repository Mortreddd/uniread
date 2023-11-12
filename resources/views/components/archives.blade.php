<section class="w-full" :archives="$archives">
    @unless($archives->isEmpty())
    <div class="flex flex-wrap items-start justify-start">
        @foreach ($archives as $archive)
            <x-archivecard :archive="$archive"/>
        @endforeach
    </div>
    @else
    <h1 class="text-4xl text-center text-gray-500">Nothing has been added on archives yet</h1>   
    @endunless
</section>
