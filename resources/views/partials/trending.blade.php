<section class="w-full px-10 py-5 h-fit bg-slate-50" :trendingBooks="$trendingBooks">
    @if(Session::has('success'))
        <div class="px-8 py-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 " role="alert">
            <h1 class="font-sans text-2xl font-medium">{{ Session::get('success') }}</h1>
        </div>
    @endif
    <h1 class="block py-3 font-serif text-4xl text-gray-600">Trending Stories</h1>
    <div class="flex flex-wrap items-end h-full py-3">
        @foreach ($trendingBooks as $book)
            <x-card :book="$book"/>
        @endforeach
    </div>
</section>