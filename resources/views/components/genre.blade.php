

    {{-- $caption, $description --}}

<article class="container mx-auto">
    <div class="w-full px-4 py-6 bg-fixed bg-center bg-no-repeat bg-cover md:px-20 h-fit md:py-24" style="background-image: url('{{ asset($background) }}');">
        @if($title->id === 2)
            <h1 class="mx-16 font-serif text-2xl font-bold text-gray-900 md:text-5xl">{{$caption}}</h1>
            <h1 class="mx-16 font-serif font-bold text-gray-900 text-md md:text-2xl">{{$description}}</h1>
        @else
            <h1 class="mx-2 font-serif text-2xl font-bold text-gray-200 md:mx-16 md:text-5xl">{{$caption}}</h1>
            <h1 class="mx-2 font-serif font-bold text-gray-200 md:mx-16 text-md md:text-2xl">{{$description}}</h1>
        @endif
    </div>
    
        
    
    <div class="flex flex-wrap mx-3 my-5 justify-stretch md:mx-28">
        @foreach ($books as $book)
        <a href="{{ route('book.description', ['bookID' => $book->id]) }}" class="w-1/2 my-5 shadow-lg h-fit md:h-64 px-7 shadow-gray-100 card">
            <img src="{{ asset($book->image) }}" alt="" class="inline-block float-left object-contain h-full mr-5 border-4 rounded-md border-fuchsia-950" />
            <div class="py-4 pl-0 space-y-5 font-sans text-sm text-left text-gray-500 md:pl-5 md:text-md">
                <div class="mb-4">
                    <h1 class="font-semibold text-md md:text-lg">{{ $book->title }}</h1>
                    <h2>by {{ $book->author->username}}</h2>
                </div>
                

                <p class="text-md line-clamp-2 md:line-clamp-4">{{ $book->description }}</p>
                <div class="w-full">
                    <h4 class="inline-block px-5 py-1 mr-2 font-sans text-white rounded-l-full rounded-r-full bg-fuchsia-900">
                        @if($book->status === 1) Completed @else Ongoing @endif
                    </h4>
                    @if($book->mature === 1)
                        <div class="mr-4">
                            <h4 class="inline-block px-5 py-1 mr-2 font-sans text-white bg-orange-600 rounded-l-full rounded-r-full text-md ">
                                Mature
                            </h4>
                        </div>
                    @endif
                    {{-- <h4 class="inline-block px-5 py-1 mr-2 font-sans text-white bg-orange-600 rounded-l-full rounded-r-full text-md ">
                        Mature
                    </h4> --}}
                </div>
            </div>
        </a>
        
        @endforeach
    </div>
    
</article>