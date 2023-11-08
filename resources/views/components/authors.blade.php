<a href="/books/{{ $author->id }}" class="block w-full my-3 card" :author="$author">
    <div class="flex flex-row w-full border-2 border-solid rounded-lg shadow-lg h-72 shadow-gray-300">
        <p class="font-sans text-2xl text-black">{{ $author->username }}</p>
    </div>
  </a>