<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="scroll-smooth scroll-p-40"
>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>UniRead</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
        <script src="../../js/app.js"></script>
    </head>
    <body>
        <div class="w-full py-5 bg-fuchsia-900">
            <nav
                class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700"
            >
                <div
                    class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto"
                >
                    <x-logo></x-logo>
                </div>
            </nav>
        </div>
        <main
            class="container box-border flex w-full h-[80vh]"
        >
            
        </main>
    </body>
</html>
