<section class="w-full px-10 py-10 bg-fixed bg-center bg-no-repeat bg-cover h-fit" style="background-image: url('{{ asset('backgrounds/butterflies.svg') }}');" :genre="$genre" :books="$books">
    <h1 class="block py-3 font-serif text-5xl text-center text-slate-100">{{ $genre }}</h1>
    @unless(empty($books))
    <div class="flex items-end h-full py-3 overflow-hidden">
        @foreach ($books as $book)
            <x-card :book="$book"/>
        @endforeach
    </div>
    @else
        <h1 class="text-4xl text-center text-slate-100">Temporarily no books for {{ $genre }} category as of the moment</h1>   
    @endunless
</section>
