<section class="w-full px-10 py-10 bg-fixed bg-center bg-no-repeat bg-cover h-fit" style="background-image: url('{{ asset('backgrounds/butterflies.svg') }}');" :genre="$genre" :books="$books">
    <h1 class="block py-3 font-serif text-5xl text-center text-slate-100">{{ $genre }}</h1>
    <div class="flex items-end h-full py-3 overflow-hidden">
        @foreach ($books as $book)
            @if ($genre === $book->genre)
                <x-card :book="$book"/>
            @endif
        @endforeach
    </div>
</section>
