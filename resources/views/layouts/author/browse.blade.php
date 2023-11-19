@extends('index')

@section('title', $genre->name)

@section('content')
    <main class="container box-border w-full min-h-full p-0 m-0">
        @include("partials.nav")
        @switch($genre->id)
            @case(4)
                <div class="w-full flex flex-row justify-start bg-fixed bg-center bg-no-repeat bg-cover px-5 py-3" style="background-image: url('{{ asset($backgrounds) }}');">
                    
                </div>
                @break
        
            @default
                
                @break
        @endswitch
        @include("partials.footer")
    </main>
@endsection