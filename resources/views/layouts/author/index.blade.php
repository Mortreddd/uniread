@extends('index')

@section('title', 'UniRead')


@section('content')
    <main class="container box-border w-full min-h-full p-0 m-0">
        @include("partials.nav")
        @include("partials.trending", ['trendingBooks' => $trendingBooks]) 
        @if(Session::has('success'))
            <x-toast :message="Session::get('success')"></x-toast>
        @endif
        @foreach ($genres as $genre)    
            @if($genre->id === 1)
                @include("components.heading", ['id' => $genre->name,
                                            'backgrounds' => 'storage/backgrounds/Mystery.webp',
                                            'heading' => 'Unveil Mysteries',
                                            'description' => 'Embark on thrilling adventures, solve enigmatic puzzles, and explore the world of Mystery novels. Our web app is your gateway to suspense and intrigue.'
                                            ])
                @include("components.section", ['genre' => $genre->name, 'books' => $genre->books])
                @continue
            @endif
            @if($genre->id === 9)
                @include("components.heading", ['id' => $genre->name,
                                        'backgrounds' => 'storage/backgrounds/Romance.webp', 
                                        'heading' => "Explore Romance Novels",
                                        'description' => "Discover a world of passion, love, and adventure. Dive into a collection of captivating Romance novels on our web app and get lost in the magic of love stories."
                                        ])
                @include("components.section", ['genre' => $genre->name, 'books' => $genre->books])
                @continue
            @endif
            @if($genre->id === 2)
                @include("components.heading", ['id' => $genre->name,
                                                'backgrounds' => 'storage/backgrounds/TeenFiction.webp',
                                                'heading' => 'Dive into Fiction',
                                                'description' => 'Experience a world of imagination, creativity, and endless possibilities. Our web app offers a diverse collection of Fiction novels, where every page is a new adventure waiting to be explored.'
                                                ])
                @include("components.section", ['genre' => $genre->name, 'books' => $genre->books])
                @continue
            @endif
            @if($genre->id === 13)
                @include("components.heading", ['id' => $genre->name,
                                                'backgrounds' => 'storage/backgrounds/Horror.webp',
                                                'heading' => 'Face Your Fears',
                                                'description' => 'Brace yourself for spine-chilling stories and terrifying encounters. Dive into the world of Horror novels on our web app, where every page is a heart-pounding journey into the unknown.'])
                @include("components.section", ['genre' => $genre->name, 'books' => $genre->books])
                @continue
            @endif
        @endforeach
        @include("partials.footer")
    </main>
@endsection
