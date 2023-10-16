<a href="/books/{{ $book->id }}" class="inline-block p-3" :book="$book">
  <div class="w-40 overflow-hidden text-left rounded-md shadow-lg card h-fit" style="background-color: rgba(235, 235, 235, 0.7)">
    <img class="w-full" src="{{ asset($book->image) }}"/>
    <figure class="py-2 text-center">
      <blockquote class="w-full">
        <p class="w-40 overflow-hidden text-xl text-ellipsis whitespace-nowrap">{{ $book->title }}</p>
      </blockquote>
      <figcaption class="text-sm text-neutral-600 dark:text-neutral-400">
        - <cite title="Source Author">{{ $book->username }}</cite>
      </figcaption>
    </figure>
    <div class="px-6 pb-2">
      <span class="block px-3 py-1 text-sm font-semibold text-center text-gray-700 bg-gray-200 rounded-full align-self-center">{{ $book->genre }}</span>
    </div>
  </div>
</a>
  