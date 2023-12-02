<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="scroll-smooth scroll-p-40"
>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <title>@yield('title', 'UniRead')</title>
        @vite(['resources/css/app.css','resources/js/app.js', 
        'resources/js/tabs.js', 'resources/js/page.js', 
        'resources/js/voice.js', 'resources/js/bookmarks.js',
        'resources/js/workspace.js'])
    </head>
    <body>
        @yield('content')
    </body>
</html>
