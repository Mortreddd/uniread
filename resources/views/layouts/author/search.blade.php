@extends('index')

@section('title', 'Search')

@section('content')
    <main class="container box-border w-full min-h-full p-0 m-0">
        @include('partials.nav')
        <section class="flex flex-col items-center w-full min-h-[60vh]">
            <div class="flex w-full justify-evenly">
                <button class="py-4 mr-3 font-sans text-2xl border-solid tab-button active" data-tab="#stories">Stories</button>
                <button class="py-4 mr-3 font-sans text-2xl border-solid tab-button" data-tab="#authors">Authors</button>
            </div>
            <div class="flex justify-center w-full">
                <div class="tab-content my-5 px-4 md:px-20 min-h-[40vh] w-full flex-col flex items-center" id="stories">
                    @unless($books->isEmpty())
                        @foreach($books as $book)
                            <x-stories :book="$book"></x-stories>
                        @endforeach
                    @else
                        <h1 class="font-sans text-3xl text-center text-gray-600">No Result for Books</h1>
                    @endunless
                </div>
                <div class="hidden tab-content my-5 px-4 md:px-20 min-h-[40vh] flex-col  md:w-1/2 w-full flex items-center" id="authors">
                    @unless($authors->isEmpty())
                        @foreach($authors as $author)
                            <x-authors :author="$author"></x-authors>
                        @endforeach
                    @else
                        <h1 class="font-sans text-3xl text-center text-gray-600">No Result for Authors</h1>
                    @endunless
                </div>
            </div>
        </section>
        @include('partials.footer')
    </main>
@endsection