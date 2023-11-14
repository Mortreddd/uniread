<button data-modal-target="{{ $book->id }}" data-modal-toggle="{{ $book->id }}" class="inline-block p-3" :book="$book">
    <div class="w-40 overflow-hidden text-left rounded-md shadow-lg card h-fit" style="background-color: rgba(235, 235, 235, 0.7)">
      <img class="w-full" src="{{ asset($book->image) }}"/>
      <figure class="py-2 text-center">
        <blockquote class="w-full">
          <p class="w-40 overflow-hidden text-xl text-ellipsis whitespace-nowrap">{{ $book->title }}</p>
        </blockquote>
      </figure>
      <div class="px-6 pb-2">
        <span class="block px-3 py-1 text-sm font-semibold text-center text-gray-700 bg-gray-200 rounded-full align-self-center">{{ $book->genre }}</span>
      </div>
    </div>
</button>
    
<div id="{{ $book->id }}" tabindex="-1" class="fixed card top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full rounded-lg bg-fuchsia-900">
        <div class="relative bg-transparent rounded-lg ">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:text-white hover:bg-fuchsia-950 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center " data-modal-hide="{{ $book->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        <div class="flex flex-col p-6 text-center rounded-2xl bg-fuchsia-900">
            <h3 class="mb-5 text-2xl font-normal text-white ">{{ $book->title }}</h3>
            <div class="flex items-center mx-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                  </svg>
                <a href="/books/{{ $book->id }}/read" data-modal-hide="{{ $book->id }}" href="" class="font-sans text-lg text-white hover:text gray-100">Read</a>
            </div>
            <div class="flex items-center mx-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                  </svg>
                <a data-modal-hide="{{ $book->id }}" href="/books/{{ $book->id }}" class="font-sans text-lg text-white hover:text gray-100">Info</a>
            </div>
            <form class="flex items-center mx-2" method=POST action="{{ route('archive.add') }}">
              @csrf
              @method('PUT')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                </svg>
                <input type="number" name="authorID" value="{{ Auth::id() }}" class="hidden">
                <input type="number" name="bookID" value="{{ $book->id }}" class="hidden">
                <button data-modal-hide="{{ $book->id }}" type="submit" class="font-sans text-lg text-white hover:text gray-100">Archive Story</button>
            </form>
            <form class="flex items-center mx-2" action="{{ route('library.remove') }}" method="POST">
                @csrf
                @method('DELETE')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
                <input type="number" name="authorID" value="{{ Auth::id() }}" class="hidden">
                <input type="number" name="bookID" value="{{ $book->id }}" class="hidden">
                <button type="submit" data-modal-hide="{{ $book->id }}" class="font-sans text-lg text-white hover:text gray-100">Remove</button>
            </form>
        </div>
    </div>
</div>
</div>