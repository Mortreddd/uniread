<section class="w-full px-10 py-5 h-fit bg-slate-50" :trendingBooks="$trendingBooks">
    <h1 class="block py-3 font-serif text-4xl text-gray-600">Trending Stories</h1>
    <div class="flex flex-wrap items-end h-full py-3">
        @foreach ($trendingBooks as $book)
            <x-card :book="$book"/>
        @endforeach
    </div>
</section>