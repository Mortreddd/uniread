<section class="w-full" :library="$library">
    @unless($library->isEmpty())
    <div class="flex flex-wrap items-start justify-start">
        @foreach ($library as $book)
            <x-librarycard :book="$book"/>
        @endforeach
    </div>
    @else
    <h1 class="text-4xl text-center text-gray-500">Nothing has been added on library yet</h1>   
    @endunless
</section>
