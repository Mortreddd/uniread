<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="scroll-smooth scroll-p-40"
>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <title>UniRead</title>
        @vite(['resources/css/app.css','resources/js/app.js', 'resources/js/tabs.js'])
        <script src="../../js/app.js"></script>
    </head>
    <body>
        <main class="container box-border w-full min-h-full p-0 m-0">
            @include('partials.nav')
            <section class="flex flex-col items-center w-full min-h-[60vh]">
                <div class="flex w-full justify-evenly">
                    <button class="py-4 mr-3 font-sans text-2xl border-solid tab-button active" data-tab="#stories">Stories</button>
                    <button class="py-4 mr-3 font-sans text-2xl border-solid tab-button" data-tab="#authors">Authors</button>
                    <button class="py-4 mr-3 font-sans text-2xl border-solid tab-button" data-tab="#tags">Tags</button>
                </div>
                <div class="flex w-full">
                    <div class="tab-content my-5 px-20 min-h-[40vh] w-screen flex-col flex items-center" id="stories">
                        @unless($books->isEmpty())
                            @foreach($books as $book)
                                <x-stories :book="$book"></x-stories>
                            @endforeach
                        @else
                            <h1 class="font-sans text-3xl text-center text-gray-600">No Result for Books</h1>
                        @endunless
                        
                    </div>
                    <div class="hidden tab-content my-5 px-20 min-h-[40vh] w-screen flex-col flex items-center" id="authors">
                        @unless($authors->isEmpty())
                            @foreach($authors as $author)
                                <x-authors :author="$author"></x-authors>
                            @endforeach
                        @else
                            <h1 class="font-sans text-3xl text-center text-gray-600">No Result for Books</h1>
                        @endunless
                    </div>
                    <div class="hidden tab-content my-5 px-20 min-h-[40vh] w-screen flex-col flex items-center" id="tags">Content for Tags</div>
                </div>
            </section>
            @include('partials.footer')
        </main>
    </body>
</html>
