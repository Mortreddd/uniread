<a href="/books/{{ $book->id }}" class="inline-block p-3" :book="$book" :genre="$genre">
  <div class="overflow-hidden text-left rounded-md shadow-lg w-28 md:w-40 card h-fit" style="background-color: rgba(235, 235, 235, 0.7)">
    <img class="w-full" src="{{ asset($book->image) }}"/>
    <figure class="py-2 text-center">
      <blockquote class="w-full">
        <p class="w-40 overflow-hidden text-xl text-ellipsis whitespace-nowrap">{{ $book->title }}</p>
      </blockquote>
    </figure>
    <div class="px-6 pb-2">
      <span class="block px-3 py-1 text-sm font-semibold text-center text-gray-700 bg-gray-200 rounded-full align-self-center">{{ $genre }}</span>
    </div>
  </div>
</a>
  