@extends('index')

@section('title', $title->name)

@section('content')
    <main class="w-full h-full">
        @include("partials.nav")
        @foreach ($captions as $caption => $description)
            @switch($title->id)
                @case(1)
                    @include('components.genre', ['books' => $books,'background' => $background, 'caption' => $caption, 'description' => $description])
                    @break

                @case(2)
                    @include('components.genre', ['books' => $books,'background' => $background, 'caption' => $caption, 'description' => $description, 'title' => $title])
                    @break

                @case(3)

                    @include('components.genre', ['books' => $books,'background' => $background, 'caption' => $caption, 'description' => $description])
                    @break

                @case(4)
                    @include('components.genre', ['books' => $books,'background' => $background, 'caption' => $caption, 'description' => $description])
                    @break

                @case(5)
                    @include('components.genre', ['books' => $books,'background' => $background, 'caption' => $caption, 'description' => $description])
                    @break

                @case(6)
                    @include('components.genre', ['books' => $books,'background' => $background, 'caption' => $caption, 'description' => $description])
                    @break

                @case(7)
                    @include('components.genre', ['books' => $books,'background' => $background, 'caption' => $caption, 'description' => $description])
                    @break

                @case(8)
                    @include('components.genre', ['books' => $books,'background' => $background, 'caption' => $caption, 'description' => $description])
                    @break

                @case(9)
                    @include('components.genre', ['books' => $books,'background' => $background, 'caption' => $caption, 'description' => $description])
                    @break

                @case(10)
                    @include('components.genre', ['books' => $books,'background' => $background, 'caption' => $caption, 'description' => $description])
                    @break

                @case(11)
                    @include('components.genre', ['books' => $books,'background' => $background, 'caption' => $caption, 'description' => $description])
                    @break

                @case(12)
                    @include('components.genre', ['books' => $books,'background' => $background, 'caption' => $caption, 'description' => $description])
                    @break

                @case(13)
                    @include('components.genre', ['books' => $books,'background' => $background, 'caption' => $caption, 'description' => $description])
                    @break
                    
                @default
                    
                    @break
            @endswitch
        @endforeach
        @include("partials.footer")
    </main>
@endsection