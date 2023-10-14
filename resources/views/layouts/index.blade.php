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
                @include("partials.nav")
                @include("partials.trending", ['books' => $books])
                @include("components.heading", ['id' => 'mystery',
                                                'books' => $books,
                                                'backgrounds' => 'backgrounds/Mystery.svg',
                                                'heading' => 'Unveil Mysteries',
                                                'description' => 'Embark on thrilling adventures, solve enigmatic puzzles, and explore the world of Mystery novels. Our web app is your gateway to suspense and intrigue.'
                                                ])
                @include("components.section", ['genre' => 'Mystery', 'books' => $books])

                @include("components.heading", ['id' => 'romance',
                                                'books' => $books, 
                                                'backgrounds' => 'backgrounds/RomanceBg.svg', 
                                                'heading' => "Explore Romance Novels",
                                                'description' => "Discover a world of passion, love, and adventure. Dive into a collection of captivating Romance novels on our web app and get lost in the magic of love stories."
                                                ])
                @include("components.section", ['genre' => 'Romance', 'books' => $books])

                @include("components.heading", ['id' => 'fiction',
                                                'bestbook' => $books, 
                                                'backgrounds' => 'backgrounds/Teen-Fiction.svg',
                                                'heading' => 'Dive into Fiction',
                                                'description' => 'Experience a world of imagination, creativity, and endless possibilities. Our web app offers a diverse collection of Fiction novels, where every page is a new adventure waiting to be explored.'
                                                ])
                @include("components.section", ['genre' => 'Fiction', 'books' => $books])

                @include("components.heading", ['id' => 'horror',
                                                'bestbook' => $books, 
                                                'backgrounds' => 'backgrounds/Horror.svg',
                                                'heading' => 'Face Your Fears',
                                                'description' => 'Brace yourself for spine-chilling stories and terrifying encounters. Dive into the world of Horror novels on our web app, where every page is a heart-pounding journey into the unknown.'])
                @include("components.section", ['genre' => 'Horror', 'books' => $books])
                @include("partials.footer")
        </main>
    </body>
</html>

