@extends('index')

@section('title', 'New Story')


@section('content')
    @include('partials.nav')
    <form action="{{ route('book.create') }}" method="POST" class="flex justify-center w-full h-full py-5 md:py-10 px-7 md:px-52" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col items-center w-full rounded-lg bg-fuchsia-950">
            <h1 class="px-12 py-3 my-3 font-sans text-xl antialiased text-center bg-gray-100 rounded-l-full rounded-r-full text-fuchsia-950 justify-self-center w-fit md:text-4xl">Details of your new story</h1>
            <div class="flex flex-col items-center w-full px-8 my-1 md:my-4 md:flex-row">
                
                <h2 class="flex items-center mb-2 mr-4 font-sans text-xl text-white md:mb-0 md:text-3xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                      </svg>
                      Title
                </h2>
                <input type="text" name="title" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50" placeholder="Untitled Story">
            </div>
            <div class="flex flex-col items-center w-full px-8 my-1 md:my-4 md:flex-row">
                
                <h2 class="flex items-center mb-2 mr-4 font-sans text-xl text-white md:mb-0 md:text-3xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>                      
                      Sypnosis
                </h2>
                <textarea name="description" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50" placeholder="Write your sypnosis....."></textarea>
            </div>
            <div class="flex flex-col items-center justify-between w-full px-8 my-1 md:my-4 md:flex-row">
                <div class="flex flex-col items-center justify-center w-full my-1 md:justify-between md:flex-row md:my-4">
                    <div class="flex flex-col mb-2 md:flex-row md:mb-0">
                        <h2 class="flex items-center mb-2 mr-4 font-sans text-xl text-white md:text-3xl md:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                            </svg>
                                                  
                              Category / Genre
                              
                        </h2>
                        <select id="countries" name="genreID" class="bg-gray-50 ml-3 border w-fit border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 ">
                            @foreach($genres as $genre)
                                <option value="{{$genre->id}}" {!! $loop->first ? 'selected' : ''!!}>{{$genre->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col md:flex-row">
                        <h2 class="flex items-center mr-4 font-sans text-xl text-white md:text-3xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                            </svg>
                            Classification(Mature)
                            <label for="mature" class="relative inline-flex items-center ml-3 cursor-pointer">
                                <input id="mature" type="checkbox" name="mature" class="sr-only peer">
                                <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center w-full px-8 my-1 md:my-4 md:flex-row">
                
                <h2 class="flex items-center mr-4 font-sans text-xl text-white md:text-3xl">
                    <span class="mr-2 font-sans text-3xl text-white">
                        ©
                    </span>             
                    Copyright
                    
                </h2>
                <select id="copyright" name="copyright" class="bg-gray-50 ml-3 border w-fit border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 ">
                    <option value="All Rights Reserved" selected>All Rights Reserved</option>
                    <option value="Public Domain">Public Domain</option>
                    <option value="Creative Commons (CC) Attribution">Creative Commons (CC) Attribution</option>
                </select>
            </div>
            <div class="flex items-center w-full px-8 my-4 md:flex-row">
                <input class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="image" accept="jpeg, jpg, png" aria-describedby="file_input_help" id="file_input" type="file" onchange="displayImage(this)">
            </div>
            <div class="flex flex-col items-center w-full px-8 my-4 md:flex-row">
                <img id="book-cover" src="{{ asset('storage/covers/default-cover.png') }}" alt="" class="float-right object-contain h-full mb-2 mr-4 border-4 rounded-lg w-52 border-fuchsia-950 md:mb-0" />
                <p class="font-sans text-lg text-white">
                    Once you submit this photo, it becomes a permanent part of this story 
                    and cannot be modified or removed, so please choose your image carefully. 
                    (This photo is for the purpose of enhancing your story and should be relevant 
                    to the theme or subject of your story.)
                </p>
            </div>
            
            <div class="flex justify-end w-full px-8 my-4 md:flex-row">
                <button type="submit" class="py-3 font-sans text-3xl text-white rounded-l-full rounded-r-full px-7 bg-fuchsia-950 hover:bg-fuchsia-900">Submit</button>
            </div>
            
        </div>
    </form>
    

    @include('partials.footer')

    <script>
        function displayImage(input) {
            const preview = document.getElementById("book-cover");
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };

                reader.onerror = function (e) {
                    preview.src = "{{ asset('covers/default-cover.png') }}";
                    preview.style.display = "block";
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "{{ asset('covers/default-cover.png') }}";
                preview.style.display = "block";
            }
        }
    </script>
@endsection