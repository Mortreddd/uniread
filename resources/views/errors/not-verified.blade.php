@extends('index')

@section('title', "You're not verified")


@section('content')
    @include('partials.nav')

    <main class="container mx-auto">
        <div class="flex h-[80vh] items-center justify-center w-full">
            <h1 class="font-sans text-4xl font-semibold text-black">You're not verified</h1>
        </div>
    </main>

@endsection