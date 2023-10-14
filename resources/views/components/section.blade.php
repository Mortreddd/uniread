<section class="w-full px-10 h-fit bg-gradient-to-br from-pink-500 to-orange-400" :genre="$genre" :books="$books">
    <div class="py-3">
        <h1 class="block py-3 font-serif text-4xl text-white">{{ $genre }}</h1>
        @foreach ($books as $book)
            <x-card :book="$book"/>
        @endforeach
    </div>
</section>
