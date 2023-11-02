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
        <main class="container box-border w-full min-h-screen p-0 m-0">
            @include('partials.nav')
            <section class="flex h-[80vh] bg-gray-300 justify-center items-center w-full">
                <h1 class="font-sans text-5xl text-gray-600 text-bold">Please enter text to search for</h1>
            </section>
            
            @include('partials.footer')
        </main>
    </body>
</html>
