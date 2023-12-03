@extends('index')

@section('title', 'My Stories')

@section('content')
    @include("partials.nav")
    <main class="container mx-auto px-10 py-5 min-h-[80vh]">
        <div class="flex justify-center w-full h-full">
            <div class="p-3 w-[60vw]">
                <h1 class="mb-3 font-sans text-4xl font-bold text-left text-black">My Stories</h1>
                <div class="h-[60vh] overflow-hidden w-full rounded-lg border-2 border-gray-300">
                    <div class="flex items-center justify-start w-full gap-5 px-5 py-3 border-b-2 border-gray-300 border-solid">
                        <button
                            class="flex flex-col items-center py-2 mr-3 font-sans text-xl border-solid active md:flex-row md:items-start md:text-2xl tab-button"
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
                        @unless($published->isEmpty())
                            @foreach ($published as $book)
                                <article class="flex justify-between w-full px-2">
                                    <div class="flex items-center py-2">   
                                        <img src="{{ asset($book->image) }}" alt="" class="object-contain mx-2 rounded-lg h-36 w-fit" />
                                        <div class="px-2">
                                            
                                            <h1 class="block font-sans text-lg font-bold text-black">{{ $book->title }}</h1>
                                            <p class="block font-sans text-fuchsia-900 text-md">1 Published Part</p>
                                            <p class="block font-sans text-fuchsia-900 text-md">5 Drafts</p>
                                            <p class="font-sans text-fuchsia-900 text-md">Updated {{ ($book->updated_at->diffInHours() > 23 ? $book->updated_at->diffInDays() : $book->updated_at->diffInHours())}} hours ago</p>
                                        </div>
                                    </div>
        
                                    <div class="flex items-center gap-3 py-2">
                                        <a href="{{ route('workspace', ['bookID' => $book->id]) }}" class="px-4 py-2 font-sans text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950">Continue Writing</a>
                                        <button class="flex items-center justify-center p-2 text-lg text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </article>
                                
                            @endforeach
                        @else
                            <p class="font-sans text-lg text-center text-black">You have no published stories yet.</p>
                        @endunless
                        
                        
                    </div>
                    <div class="hidden w-full px-2 tab-content max-h-[50vh]  overflow-y-auto" id="draft">
                        {{-- iterate all the published books of the authenticated user --}}
                        @unless ($drafts->isEmpty())
                            @foreach ($drafts as $draft)
                            <article class="flex justify-between w-full px-2">
                                <div class="flex items-center py-2">   
                                    <img src="{{ asset($draft->image) }}" alt="" class="object-contain mx-2 rounded-lg h-36 w-fit" />
                                    <div class="px-2">
                                        
                                        <h1 class="font-sans text-lg font-bold text-black">{{ $draft->title }}</h1>
                                        <p class="font-sans text-lg text-fuchsia-900">5 Drafts</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 py-2">
                                    <a href="{{ route('workspace', ['bookID' => $draft->id]) }}" class="px-4 py-2 font-sans text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950">Continue Writing</a>
                                    <button class="flex items-center justify-center p-2 text-lg text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </article>
                            @endforeach
                        @else
                            <p class="font-sans text-lg text-center text-black">You have no drafts yet.</p>
                        @endunless
                       
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection