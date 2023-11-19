<section class="w-full p-2 mb-4 bg-gray-100 border-2 border-gray-200 rounded-lg shadow-lg shadow-gray-300 md:p-5 " :book="$book" :ratigns="$ratings" :parts="$parts" :belongsToLibrary="$belongsToLibrary">
    <div class="mx-3">
        <h1 class="text-4xl text-slate-400">{{ $book->title }}</h1>
        <div class="flex flex-row flex-wrap items-center w-full my-1 md:my-3">
            <div class="mr-4">
                <h4 class="flex gap-2 text-xl text-gray-400">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-7 h-7"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"
                        />
                    </svg>
                    {{ number_format($book->votes, 0, '.', ',') }}
                    <!-- count-->
                </h4>
            </div>
            <div class="mr-4">
                <h4 class="flex gap-2 text-xl text-gray-400">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-7 h-7"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"
                        />
                    </svg>
                    {{ number_format($ratings, 0, '.', ',') }}
                    <!-- count-->
                </h4>
            </div>
            <div class="mr-4">
                <h4 class="flex gap-2 text-xl text-gray-400">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-7 h-7"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5"
                        />
                    </svg>
                    {{ number_format($parts, 0, '.', ',') }}@if($parts < 1) part @else parts @endif
                    <!-- count-->
                </h4>
            </div>
            <div class="mr-4">
                <h4 href="" class="px-5 py-1 font-sans text-white rounded-l-full rounded-r-full bg-fuchsia-900">
                    @if($book->status === 1) Completed @else Ongoing @endif
                </h4>
            </div>
            {{-- @if($book->mature === 1)
                <div class="mr-4">
                    <h4 href="" class="px-5 py-1 font-sans text-white bg-orange-600 rounded-l-full rounded-r-full text-md ">
                        Mature
                    </h4>
                </div>
            @endif --}}
        </div>
        <div class="flex flex-row items-center w-full my-1 md:my-3">
            <div class="mr-4">
                @if($parts < 1)

                    <a
                        href="/books/{{ $book->id }}/read"
                        class="hidden px-4 py-2 text-white rounded-full bg-fuchsia-900 hover:bg-fuchsia-950"
                        >
                        Start Reading
                    </a>
                @else
                    <a
                    href="/books/{{ $book->id }}/read"
                    class="flex flex-row px-4 py-2 text-white rounded-full bg-fuchsia-900 hover:bg-fuchsia-950"
                    >
                        Start Reading
                    </a>
                @endif
                
            </div>
            <div class="mr-4">
                @unless($belongsToLibrary || Session::has('success'))
                    
                    <form action="{{ route('library.add') }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="number" name="authorID" value="{{ Auth::id() }}" class="hidden">
                        <input type="number" name="bookID" value="{{ $book->id }}" class="hidden">
                        <button
                            type="submit"
                            class="flex flex-row px-4 py-2 text-white rounded-full bg-fuchsia-900 hover:bg-fuchsia-950"
                        >
                            Add to your library
                        </button>
                    </form>
                @endunless
                
            </div>
        </div>
        <div class="w-full my-1 md:my-3">
            <div class="">
                <p class="mb-3 font-sans text-lg text-justify text-gray-500">
                    {{ $book->description }}
                </p>
            </div>
        </div>
        <div class="flex flex-row w-full my-1 md:my-3">
            <div>
                <h3 class="px-4 py-2 text-white bg-gray-600 rounded-full">
                    {{ $book->genre->name }}
                </h3>
            </div>
        </div>
    </div>
</section>
