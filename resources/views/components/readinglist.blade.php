<section class="w-full" :library="$library">
    @unless($library->isEmpty())
    <div class="flex flex-wrap items-start justify-start">
        @foreach ($library as $book)
            <x-buttoncard :book="$book"/>
        @endforeach
    </div>
    @else
    <div class="flex justify-center w-full border-2 border-solid">
        <h1 class="text-4xl text-gray-500">Nothing has been added on library yet</h1>   
    </div>
    @endunless
</section>
