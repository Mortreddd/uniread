@extends('layouts.admin.index')

@section('title', 'Authors')

@section('content')
    @include('layouts.admin.partials.sidebar')
    <main class="container mx-auto bg-gray-200">
        <div class="flex justify-start w-full p-10">
            <div class="flex flex-col items-center justify-center w-1/2 px-5 py-3 border-4 border-gray-300 border-solid rounded-lg bg-amber-50">
                <h1 class="flex items-center my-2 font-sans text-4xl font-semibold text-black">
                    {{ $activeAuthors }} 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-3 text-green-500 w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                      
                </h1>
                <h1 class="my-2 font-sans text-3xl font-semibold text-black">Active Authors</h1>
            </div>
        </div>
        <section class="min-h-[70vh] w-full bg-white p-2">
            <div class="flex items-center justify-between w-full">
                <div class="w-1/2 px-2 py-4">
                    <h1 class="font-sans text-3xl font-semibold text-black">Manage Authors</h1>
                </div>
                <div class="flex flex-col items-end justify-center w-1/2 h-full px-8 py-3 bg-transparent">
                    <div class="flex border-2 border-black rounded-lg">
                        <h2 class="p-2 text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </h2>
                        <input type="text" placeholder="Search..." name="" id="search" class="inline-block w-full text-black border-none rounded-lg outline-none focus:border-none focus:ring-0">
                    </div>
                </div>
                
            </div>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="font-sans text-xl font-semibold text-center text-black">Username</th>
                        <th class="font-sans text-xl font-semibold text-center text-black">Email</th>
                        <th class="font-sans text-xl font-semibold text-center text-black">Registered</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $author)
                        <tr>
                            <td class="px-5 font-sans text-lg text-black author">{{ $author->username }}</td>
                            <td class="px-5 font-sans text-lg text-black ">{{ $author->email }}</td>
                            <td class="px-5 font-sans text-lg text-black ">{{ date('d-m-Y', strtotime($author->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let searchBar = document.getElementById("search");
            const authors = document.querySelectorAll(".author");
    
            searchBar.addEventListener("input", () => {
                let input = searchBar.value.toLowerCase();
                for (let i = 0; i < authors.length; i++) {
                    let row = authors[i].parentNode; // Get the parent <tr> element
                    if (!authors[i].innerHTML.toLowerCase().includes(input)) {
                        row.classList.add("hidden"); // Hide the entire row
                    } else {
                        row.classList.remove("hidden"); // Show the row
                    }
                }
            });
        });
    </script>
    
    
    
@endsection