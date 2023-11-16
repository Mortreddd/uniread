<section class="w-full h-full" :bookmarks="$bookmarks">
    <div class="flex flex-col items-center md:w-[70vw] w-full">
        @if($bookmarks->isNotEmpty())
        <div class="w-full">
            @foreach ($bookmarks as $bookmark)
                <x-bookmarkcard :bookmark="$bookmark"/>
            @endforeach
        </div>
        @else
        <h1 class="text-4xl text-center text-gray-500">Nothing has been added on bookmarks yet</h1>   
        @endif
    </div>
</section>
