@extends('index')


@section('title', $book->title)

@section('content')
    <main class="w-full h-full">
        @include('partials.nav')
        <main
            class="flex flex-col items-center w-full h-full py-2 md:py-4 rounded-mdjustify-normal md:items-start md:justify-center md:flex-row"
        >
            <figure
                class="inline-block mb-4 float-left w-[50vw] md:w-[30vw] m-5"
            >
                <img
                    src="{{ asset($book->image) }}"
                    class="w-full mb-4 leading-none align-middle rounded-lg shadow-lg h-80 md:h-5/6"
                    alt="Taking up Water with a Spoon"
                />
                <figcaption
                    class="flex justify-center w-full text-lg md:text-2xl text-neutral-600 dark:text-neutral-400"
                >
                    <div class="flex items-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="w-8 h-8 mr-1"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <a
                        href="/user/profile/{{ $book->author->id }}"
                        class="underline"
                    >
                        
                        {{ $book->author->username }}
                        </a>
                    </div>
                </figcaption>
            </figure>
            <section class="w-full md:w-[75vw] md:p-5">
                <x-information :book="$book" :ratings="$ratings" :parts="$parts" :belongsToLibrary="$belongsToLibrary"></x-information>
                <section
                    class="w-full p-5 bg-gray-100 border-2 border-gray-200 rounded-lg shadow-lg shadow-gray-300"
                >
                    <h3 class="font-sans text-2xl text-gray-500">
                        Recommendations
                    </h3>
                    <div
                        class="flex items-start py-3 overflow-x-scroll no-scrollbar"
                    >
                        @foreach($recommendations as $book)
                            <x-card :book="$book" :genre="$book->genre->name"></x-card>
                        @endforeach
                    </div>
            </section>
        </main>
        @include('partials.footer')
    </main>
@endsection