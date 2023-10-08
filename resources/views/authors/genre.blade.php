<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>UniRead</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="box-border w-full p-0 m-0 bg-fixed bg-center bg-no-repeat bg-cover">
        @include('partials.header')
        @include('components.recommended')
        @include('partials.footer')
    </body>
</html>