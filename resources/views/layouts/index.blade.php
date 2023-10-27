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
                @if(Session::has('success'))
                    <div class="px-8 py-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 " role="alert">
                        <h1 class="text-2xl  font-sans font-medium">{{ Session::get('success') }}</h1>
                    </div>
                @endif
                
                @if(request()->is('/'))
                    @include("partials.trending", ['trendingBooks' => $trendingBooks])
                @endif
                {{--
                * -------------------------------------------------------
                * GET ALL THE BOOKS AND 
                * ITERATE ALL THE BOOKS BASED ON THEIR GENRES
                * -------------------------------------------------------
                *--}}  
                @foreach($groupedBooks as $genre => $books)
                    @if(request()->is('/'))

                    {{-- ! THIS IS A SECTION OF MYSTERY GENRE --}}
                        @if($genre == 'Mystery' || request()->is('books/mystery'))
                            @include("components.heading", ['id' => 'mystery',
                                                        'backgrounds' => 'backgrounds/Mystery.svg',
                                                        'heading' => 'Unveil Mysteries',
                                                        'description' => 'Embark on thrilling adventures, solve enigmatic puzzles, and explore the world of Mystery novels. Our web app is your gateway to suspense and intrigue.'
                                                        ])
                            @include("components.section", ['genre' => $genre, 'books' => $books])
                        @endif

                    {{-- ! THIS IS A SECTION OF ROMANCE GENRE --}}
                        @if($genre == 'Romance' || request()->is('books/romance'))
                            @include("components.heading", ['id' => 'romance',
                                                    'backgrounds' => 'backgrounds/RomanceBg.svg', 
                                                    'heading' => "Explore Romance Novels",
                                                    'description' => "Discover a world of passion, love, and adventure. Dive into a collection of captivating Romance novels on our web app and get lost in the magic of love stories."
                                                    ])
                            @include("components.section", ['genre' => $genre, 'books' => $books])
                        @endif

                    {{-- ! THIS IS A SECTION OF FICTION GENRE --}} 
                        @if($genre == 'Teen Fiction' || request()->is('books/fiction'))
                            @include("components.heading", ['id' => 'fiction',
                                                            'backgrounds' => 'backgrounds/Teen-Fiction.svg',
                                                            'heading' => 'Dive into Fiction',
                                                            'description' => 'Experience a world of imagination, creativity, and endless possibilities. Our web app offers a diverse collection of Fiction novels, where every page is a new adventure waiting to be explored.'
                                                            ])
                            @include("components.section", ['genre' => $genre, 'books' => $books])
                        @endif
                    
                    {{-- ! THIS IS A SECTION OF HORROR GENRE --}} 
                        @if($genre == 'Horror' || request()->is('books/horror'))
                            @include("components.heading", ['id' => 'horror',
                                                            'backgrounds' => 'backgrounds/Horror.svg',
                                                            'heading' => 'Face Your Fears',
                                                            'description' => 'Brace yourself for spine-chilling stories and terrifying encounters. Dive into the world of Horror novels on our web app, where every page is a heart-pounding journey into the unknown.'])
                            @include("components.section", ['genre' => $genre, 'books' => $books])
                        @endif
                    @endif
                @endforeach
                @include("partials.footer")
        </main>
    </body>
</html>

