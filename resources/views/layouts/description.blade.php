<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth scroll-p-40">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>UniRead</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
        <script src="../../js/app.js"></script>
    </head>
    <body>
        
        <main class="container box-border w-full min-h-full p-0 m-0">
            
            @include('partials.nav')
            <main class="flex flex-col items-center w-full h-full py-4 rounded-mdjustify-normal md:items-start md:justify-center md:flex-row">
                <figure class="inline-block float-left w-[35vw] m-5">
                    <img
                      src="{{ asset($book->image) }}"
                      class="w-full mb-4 leading-none align-middle rounded-lg shadow-lg h-5/6"
                      alt="Taking up Water with a Spoon" />
                    <figcaption class="w-full text-2xl text-center text-neutral-600 dark:text-neutral-400">
                      <a href="/authors/{{$book->authorID}}" class="underline">{{'@'}}{{$book->author->username}}</a>
                    </figcaption>
                </figure>
                <section class="w-full">
                    <x-information></x-information>
                    <section class="w-full p-5 bg-gray-100 border-2 border-gray-200" recommendations="$recommendations">
                        <h3 class="font-sans text-2xl text-gray-500">Recommendations</h3>
                        <div class="flex flex-row overflow-hidden">
                            @foreach($recommendations as $book)
                                <x-card :book="$book"></x-card>
                            @endforeach
                        </div>
                    </section>
                </section>
            </main>
            
            @include('partials.footer')
        </main>
    </body>
</html>

