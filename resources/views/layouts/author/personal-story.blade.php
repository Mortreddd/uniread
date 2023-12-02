@extends('index')

@section('title', 'My Stories')

@section('content')
    @include("partials.nav")
    <main class="container mx-auto px-10 py-5 min-h-[80vh]">
        <div class="w-full h-full flex justify-center">
            <div class="p-3 w-[60vw]">
                <h1 class="text-4xl font-sans text-black text-left mb-3 font-bold">My Stories</h1>
                <div class="h-[60vh] overflow-hidden w-full rounded-lg border-2 border-gray-300">
                    <div class="flex gap-5 border-b-2 border-solid border-gray-300 justify-start px-5 items-center w-full py-3">
                        <button
                            class="flex flex-col active items-center py-2 mr-3 font-sans text-xl border-solid md:flex-row md:items-start md:text-2xl tab-button"
                            data-tab="#published"
                        >
                            Published
                        </button>
                        <button
                            class="flex flex-col items-center py-2 mr-3 font-sans text-xl border-solid md:flex-row md:items-start md:text-2xl tab-button"
                            data-tab="#draft"
                        >
                            Drafts
                        </button>
                    </div>
                    <div class="w-full px-2 tab-content max-h-[50vh] overflow-y-auto " id="published">
                        {{-- iterate all the published books of the authenticated user --}}
                        <article class="w-full px-2 flex justify-between">
                            <div class="flex items-center py-2">   
                                <img src="{{ asset('storage/covers/cover1.jpeg') }}" alt="" class="h-36 w-fit object-contain mx-2 rounded-lg" />
                                <div class="px-2">
                                    
                                    <h1 class="block text-lg text-black font-sans font-bold">Love in the Fast Lane</h1>
                                    <p class="block text-fuchsia-900 text-md font-sans">1 Published Part</p>
                                    <p class="block text-fuchsia-900 text-md font-sans">5 Drafts</p>
                                    <p class="text-fuchsia-900 text-md font-sans">Updated 3 hours ago</p>
                                </div>
                            </div>

                            <div class="py-2 flex gap-3 items-center">
                                <button class="px-4 py-2 rounded-lg text-white font-sans bg-fuchsia-900 hover:bg-fuchsia-950">Continue Writing</button>
                                <button class="p-2 text-lg text-white flex items-center justify-center bg-fuchsia-900 hover:bg-fuchsia-950 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </button>
                            </div>
                        </article>
                        <article class="w-full px-2 flex justify-between">
                            <div class="flex items-center py-2">   
                                <img src="{{ asset('storage/covers/cover1.jpeg') }}" alt="" class="h-36 w-fit object-contain mx-2 rounded-lg" />
                                <div class="px-2">
                                    
                                    <h1 class="block text-lg text-black font-sans font-bold">Love in the Fast Lane</h1>
                                    <p class="block text-fuchsia-900 text-md font-sans">1 Published Part</p>
                                    <p class="block text-fuchsia-900 text-md font-sans">5 Drafts</p>
                                    <p class="text-fuchsia-900 text-md font-sans">Updated 3 hours ago</p>
                                </div>
                            </div>

                            <div class="py-2 flex gap-3 items-center">
                                <button class="px-4 py-2 rounded-lg text-white font-sans bg-fuchsia-900 hover:bg-fuchsia-950">Continue Writing</button>
                                <button class="p-2 text-lg text-white flex items-center justify-center bg-fuchsia-900 hover:bg-fuchsia-950 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </button>
                            </div>
                        </article>
                        <article class="w-full px-2 flex justify-between">
                            <div class="flex items-center py-2">   
                                <img src="{{ asset('storage/covers/cover1.jpeg') }}" alt="" class="h-36 w-fit object-contain mx-2 rounded-lg" />
                                <div class="px-2">
                                    
                                    <h1 class="block text-lg text-black font-sans font-bold">Love in the Fast Lane</h1>
                                    <p class="block text-fuchsia-900 text-md font-sans">1 Published Part</p>
                                    <p class="block text-fuchsia-900 text-md font-sans">5 Drafts</p>
                                    <p class="text-fuchsia-900 text-md font-sans">Updated 3 hours ago</p>
                                </div>
                            </div>

                            <div class="py-2 flex gap-3 items-center">
                                <button class="px-4 py-2 rounded-lg text-white font-sans bg-fuchsia-900 hover:bg-fuchsia-950">Continue Writing</button>
                                <button class="p-2 text-lg text-white flex items-center justify-center bg-fuchsia-900 hover:bg-fuchsia-950 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </button>
                            </div>
                        </article>
                        <article class="w-full px-2 flex justify-between">
                            <div class="flex items-center py-2">   
                                <img src="{{ asset('storage/covers/cover1.jpeg') }}" alt="" class="h-36 w-fit object-contain mx-2 rounded-lg" />
                                <div class="px-2">
                                    
                                    <h1 class="block text-lg text-black font-sans font-bold">Love in the Fast Lane</h1>
                                    <p class="block text-fuchsia-900 text-md font-sans">1 Published Part</p>
                                    <p class="block text-fuchsia-900 text-md font-sans">5 Drafts</p>
                                    <p class="text-fuchsia-900 text-md font-sans">Updated 3 hours ago</p>
                                </div>
                            </div>

                            <div class="py-2 flex gap-3 items-center">
                                <button class="px-4 py-2 rounded-lg text-white font-sans bg-fuchsia-900 hover:bg-fuchsia-950">Continue Writing</button>
                                <button class="p-2 text-lg text-white flex items-center justify-center bg-fuchsia-900 hover:bg-fuchsia-950 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </button>
                            </div>
                        </article>
                    </div>
                    <div class="hidden w-full px-2 tab-content max-h-[50vh]  overflow-y-auto" id="draft">
                        {{-- iterate all the published books of the authenticated user --}}
                        <article class="w-full px-2 flex justify-between">
                            <div class="flex items-center py-2">   
                                <img src="{{ asset('storage/covers/cover1.jpeg') }}" alt="" class="h-36 w-fit object-contain mx-2 rounded-lg" />
                                <div class="px-2">
                                    
                                    <h1 class="text-lg text-black font-sans font-bold">Love in the Fast Lane</h1>
                                    <p class="text-fuchsia-900 text-lg font-sans">5 Drafts</p>
                                </div>
                            </div>

                            <div class="py-2 flex gap-3 items-center">
                                <button class="px-4 py-2 rounded-lg text-white font-sans bg-fuchsia-900 hover:bg-fuchsia-950">Continue Writing</button>
                                <button class="p-2 text-lg text-white flex items-center justify-center bg-fuchsia-900 hover:bg-fuchsia-950 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </button>
                            </div>
                        </article>
                        <article class="w-full px-2 flex justify-between">
                            <div class="flex items-center py-2">   
                                <img src="{{ asset('storage/covers/cover1.jpeg') }}" alt="" class="h-36 w-fit object-contain mx-2 rounded-lg" />
                                <div class="px-2">
                                    
                                    <h1 class="text-lg text-black font-sans font-bold">Love in the Fast Lane</h1>
                                    <p class="text-fuchsia-900 text-lg font-sans">5 Drafts</p>
                                </div>
                            </div>

                            <div class="py-2 flex gap-3 items-center">
                                <button class="px-4 py-2 rounded-lg text-white font-sans bg-fuchsia-900 hover:bg-fuchsia-950">Continue Writing</button>
                                <button class="p-2 text-lg text-white flex items-center justify-center bg-fuchsia-900 hover:bg-fuchsia-950 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </button>
                            </div>
                        </article>
                        <article class="w-full px-2 flex justify-between">
                            <div class="flex items-center py-2">   
                                <img src="{{ asset('storage/covers/cover1.jpeg') }}" alt="" class="h-36 w-fit object-contain mx-2 rounded-lg" />
                                <div class="px-2">
                                    
                                    <h1 class="text-lg text-black font-sans font-bold">Love in the Fast Lane</h1>
                                    <p class="text-fuchsia-900 text-lg font-sans">5 Drafts</p>
                                </div>
                            </div>

                            <div class="py-2 flex gap-3 items-center">
                                <button class="px-4 py-2 rounded-lg text-white font-sans bg-fuchsia-900 hover:bg-fuchsia-950">Continue Writing</button>
                                <button class="p-2 text-lg text-white flex items-center justify-center bg-fuchsia-900 hover:bg-fuchsia-950 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </button>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection