<section class="w-full px-10 py-5 bg-fixed bg-slate-50 h-fit" :trendingBooks="$trendingBooks">
    <x-toast :message="Session::get('success')"></x-toast>
    <h1 class="block py-3 font-serif text-4xl text-gray-600">Trending Stories</h1>
    <div class="flex items-start py-3 overflow-x-scroll no-scrollbar h-fit">
        @foreach ($trendingBooks as $book)
            <x-card :book="$book"/>
        @endforeach
    </div>
</section>