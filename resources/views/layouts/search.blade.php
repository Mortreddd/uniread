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
                {{-- border-b-2 border-solid border-fuchsia-800 hover:border-fuchsia-900 text-fuchsia-800 hover:text-fuchsia-900 --}}
                <div class="flex justify-center w-full px-10 border-2 border-solid">
                    <div class="px-2 tab-content" id="stories">
                        <x-stories></x-stories>
                    </div>
                    <div class="hidden px-2 tab-content" id="authors">Content for Authors</div>
                    <div class="hidden px-2 tab-content" id="tags">Content for Tags</div>
                </div>
            </section>
            @include('partials.footer')
        </main>
    </body>
</html>
