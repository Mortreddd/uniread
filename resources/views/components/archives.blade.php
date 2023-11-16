<section class="static w-full h-auto" :archives="$archives">
    <div class="flex flex-wrap items-start justify-start">
        @if($archives->isNotEmpty())
            @foreach ($archives as $archive)
                <x-archivecard :archive="$archive"/>
            @endforeach
        @else
            <div class="w-full">
                <h1 class="text-xl text-center text-gray-500 md:text-4xl">Nothing has been added to the archives yet</h1>
            </div>
        @endif
    </div>
</section>
