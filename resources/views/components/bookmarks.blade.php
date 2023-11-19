<section class="flex justify-center w-full h-full" :bookmarks="$bookmarks">
    <div class="w-full md:w-[70vw]">
        @if($bookmarks->isNotEmpty())
            <div class="flex flex-col items-center w-full">
                @foreach ($bookmarks as $bookmark)
                    @include('components.bookmarkcard', ['bookmark' => $bookmark])
                @endforeach
            </div>
        
        @else
            <h1 class="text-4xl text-center text-gray-500">Nothing has been added on bookmarks yet</h1>   
        @endif
    </div>
</section>
