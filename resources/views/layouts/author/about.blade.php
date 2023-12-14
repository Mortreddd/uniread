@extends('index')

@section('title', 'UniRead - About')


@section('content')
    @include('partials.nav')
    <div class="container w-full p-0 m-0">
        <div
        class="w-full flex justify-center items-center h-[50vh] bg-no-repeat bg-cover bg-center md:w-screen"
        style="background-image: url('{{
            asset('about.webp')
        }}');">
            <h1 class="font-serif font-bold text-center text-white text-5xl md:text-9xl">UniRead Platform</h1>
        </div>
    </div>

    <main class="container flex md:p-4 p-1">
        <aside id="default-sidebar" class="sticky h-screen transition-transform w-[30vw] md:w-[40vw]" aria-label="Sidebar">
            <div class="h-full p-3 md:p-10 overflow-y-auto ">
                <ul class="space-y-2 font-medium">
                    <li class="flex justify-center p-2 my-3 border-l-4 border-solid items">
                        <a href="#about" class="font-sans text-xl md:text-2xl text-black">About Us</a>
                    </li>
                    <li class="flex justify-center p-2 my-3 border-l-4 border-solid items">
                        <a href="#missions" class="font-sans text-xl md:text-2xl text-black">Mission</a>
                    </li>
                    <li class="flex justify-center p-2  my-3 border-l-4 border-solid items">
                        <a href="#join-us" class="font-sans text-xl md:text-2xl text-black">Join us on this literacy journey</a>
                    </li>
                </ul>
            </div>
        </aside>

        <section class="flex flex-col items-center w-auto h-full p-2 md:p-10">
            <h1 id="about" class="mb-3 text-2xl md:text-4xl font-semibold text-black">About Us</h1>
            <h3 class="mb-3 text-xl md:text-2xl text-black c font-weight">Welcome to UniRead, your portal to an infinite world filled with knowledge, imagination, and stories.</h3>
            <p class="p-3 mb-5 text-lg md:text-2xl text-justify bg-gray-100 shadow-lg shadow-gray-300 rounded-xl text black">
                Uniread Platform offers a way to find untapped writing 
                potential and help authors become internationally renowned.
                The first reader-powered publisher in the world.
                <br>
                <br>
                At UniRead, we are enthusiastic about literature and its power to enlighten, inspire, 
                and amuse. We consider reading to be an essential component of personal development and a way to go 
                to new worlds without ever leaving your comfortable chair.

            </p>

            <h1 id="missions" class="mb-3 text-xl md:text-3xl text-left text-black">Missions</h1>
            <p class="p-3 mb-5 text-lg md:text-2xl text-justify text-black bg-gray-100 shadow-lg shadow-gray-300 rounded-xl"> 
                Our goal is to provide them with a practical plan that will enable them to fulfill their dream of 
                becoming a well-known author. additionally to provide the chance for persons without access 
                to books to read for enjoyment, education, and lifetime learning.
                <br>
                <br>
                Our mission is to spread the love of reading to everyone, anywhere. We aim to break down 
                barriers, make books available to everyone, and promote a love of reading among individuals 
                from every aspect of life.
            </p>

            <h1 id="join-us" class="mb-3 text-xl md:text-3xl text-left text-black font-weight-bold">Join Us on This Literary Journey
            </h1>
            <p class="p-3 mb-8 text-lg md:text-2xl text-justify text-black bg-gray-100 shadow-lg shadow-gray-300 rounded-xl"> 
                We warmly invite you to go with us on this literary journey as we honor 
                the written word in all of its beauty. Whether you've been a lifetime reader or 
                are only beginning to dive into the world of books, UniRead is here to carry your reading 
                experiences with you.
                <br>
                <br>
                Happy reading!

            </p>
        </section>

    </main>
@endsection
