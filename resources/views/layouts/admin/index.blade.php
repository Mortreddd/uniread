<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth scroll-p-40">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>@yield('title', 'Modirator')</title>
        @vite(['resources/css/app.css','resources/js/app.js', 'resources/js/charts.js'])
    </head>
    <body>
        <main class="container mx-auto p-auto">
        @yield('sidebar') 
        {{-- <div class="m-auto w-autfull">
            <canvas id="myChart"></canvas>
        </div> --}}
        </main>
    </body>
</html>

