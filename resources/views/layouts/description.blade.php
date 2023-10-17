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
            @foreach ($books as $book)
            <main class="flex flex-col w-full h-full justify-normal md:justify-center md:flex-row ">
                <figure class="inline-block float-left max-w-sm md:m-4">
                    <img
                      src="{{ asset($book->image) }}"
                      class="max-w-full mb-4 leading-none align-middle rounded-lg shadow-lg h-5/6"
                      alt="Taking up Water with a Spoon" />
                    <figcaption class="text-lg text-center text-neutral-600 dark:text-neutral-400">
                      <a href="/authors/{{$book->authorID}}" class="underline">{{$book->username}}</a>
                    </figcaption>
                </figure>
                <section class="w-full rounded-sm md:m-4 ">
                    <x-information></x-information>
                </section>
            </main>
            
            @endforeach
            @include('partials.footer')
        </main>
    </body>
</html>

