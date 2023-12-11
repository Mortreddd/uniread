<a href="/books/{{ $book->id }}" class="block w-full my-3 overflow-hidden card h-fit line-clamp-2 text-ellipsis" :book="$book">
  <div class="flex flex-row border-2 border-solid rounded-lg shadow-md md:shadow-lg h-52 md:h-60 shadow-gray-300">
    <img class="object-contain rounded-l-lg aspect-auto" src="{{ asset($book->image) }}"/>
      <section class="h-full p-4 md:px-10 text-align text-ellipsis md:py-5">
        <h1 class="text-xl md:text-4xl text-slate-400">{{ $book->title }}</h1>
        <div class="flex flex-row flex-wrap my-1 md:my-3">
            <div class="mr-4">
                <h4 class="flex gap-2 text-gray-400 text-md md:text-xl">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6 md:w-7 md:h-7"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"
                        />
                    </svg>
                    {{ number_format($book->reads, 0, '.', ',') }}
                    <!-- count-->
                </h4>
            </div>
            <div class="mr-4">
                <h4 class="flex gap-2 text-gray-400 text-md md:text-xl">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6 md:w-7 md:h-7"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"
                        />
                    </svg>
                    {{ number_format($book->ratings->count(), 0, '.', ',') }}
                    <!-- count-->
                </h4>
            </div>
            <div class="mr-4">
                <h4 class="flex gap-2 text-gray-400 text-md md:text-xl">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6 md:w-7 md:h-7"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5"
                        />
                    </svg>
                    {{ number_format($book->chapters->count(), 0, '.', ',') }} @if($book->chapters->count() > 1) parts @else part @endif
                    <!-- count-->
                </h4>
            </div>
            <div class="mr-4">
                @if($book->completed)

                    <h4 href="" class="px-2 py-1 text-white rounded-l-full rounded-r-full md:px-5 text-md bg-fuchsia-900">
                        Completed
                    </h4>
                @else
                    <h4 href="" class="px-2 py-1 text-white bg-orange-700 rounded-l-full rounded-r-full md:px-5 text-md">
                        Ongoing
                    </h4>
                @endif
                
            </div>  
            <p class="mt-2 font-serif text-left text-gray-600 text-clip line-clamp-3 md:line-clamp-5 text-md md:text-lg ">{{ $book->description }}</p>
        </section>
    </div>
</a>