<section class="w-full px-3 py-4 bg-fixed bg-center bg-no-repeat bg-cover md:px-10 md:py-10 h-fit" style="background-image: url('{{ asset('storage/backgrounds/BooksBackground.webp') }}');" :genre="$genre" :books="$books">
    <h1 class="block py-3 font-serif text-5xl text-center text-slate-100">{{ $genre }}</h1>
    @unless(empty($books))
    <div class="flex items-start h-full py-3 overflow-x-scroll no-scrollbar">
        @foreach ($books as $book)
            <x-card :book="$book" :genre="$genre"></x-card>
        @endforeach
    </div>
    @else
        <h1 class="text-4xl text-center text-slate-100">Temporarily no books for {{ $genre }} category as of the moment</h1>   
    @endunless
</section>
