@extends('index')

@section('title', 'My Stories')

@section('content')
    @include("partials.nav")
    <main class="container mx-auto md:px-10 md:py-5 min-h-[80vh]">
        <div class="flex justify-center w-full h-full">
            <div class="p-3 w-full md:w-[60vw]">
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
                                            
                                            <h1 class="block font-sans font-bold text-black text-md md:text-lg">{{ $book->title }}</h1>
                                            <p class="block font-sans text-sm text-fuchsia-900 md:text-md">@if($book->chapters->count() <= 1) {{ $book->chapters->count()}} Chapter @else {{ $book->chapters->count() }} Chapters @endif</p>
                                            <p class="font-sans text-sm text-fuchsia-900 md:text-md">Updated {{ ($book->updated_at->diffInHours() > 23 ? $book->updated_at->diffInDays() : $book->updated_at->diffInHours())}} hours ago</p>
                                        </div> 
                                    </div>
        
                                    <div class="flex items-center gap-3 py-2">
                                        <a href="{{ route('workspace.redirect', ['bookID' => $book->id]) }}" class="px-4 py-2 font-sans text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950">Continue Writing</a>
                                        <form action="{{ route('book.delete', ['id' => $book->id])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" data-modal-target="{{$book->id}}" data-modal-toggle="{{$book->id}}" class="flex items-center justify-center p-2 text-lg text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg> 
                                            </button>
                                            <div id="{{$book->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-md max-h-full p-4">
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{$book->id}}">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                        <div class="p-4 text-center md:p-5">
                                                            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                            </svg>
                                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this book? All of the contents of books will be deleted</h3>
                                                            <button type="submit" data-modal-hide="{{$book->id}}" type="button" class="text-white bg-fuchsia-900 hover:bg-fuchsia-950 focus:ring-4 focus:outline-none focus:ring-fuchsia-500 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                                Yes, I'm sure
                                                            </button>
                                                            <button data-modal-hide="{{$book->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
                                        
                                        <h1 class="font-sans font-bold text-black text-md md:text-lg">{{ $draft->title }}</h1>
                                        <p class="font-sans text-sm md:text-md text-fuchsia-900">@if($draft->chapters->count() <= 1) {{ $draft->chapters->count()}} Chapter @else {{ $draft->chapters->count() }} Chapters @endif</p>
                                        <p class="font-sans text-sm text-fuchsia-900 md:text-md">Updated {{ ($draft->updated_at->diffInHours() > 23 ? $draft->updated_at->diffInDays() : $draft->updated_at->diffInHours())}} hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 py-2">
                                    <a href="{{ route('workspace.redirect', ['bookID' => $draft->id]) }}" class="px-4 py-2 font-sans text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950">Continue Writing</a>
                                    <form action="{{ route('book.delete', ['id' => $draft->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-modal-target="{{$draft->id}}" data-modal-toggle="{{$draft->id}}" class="flex items-center justify-center p-2 text-lg text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg> 
                                        </button>
                                        <div id="{{$draft->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full p-4">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{$draft->id}}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-4 text-center md:p-5">
                                                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this book? All of the contents of books will be deleted</h3>
                                                        <button type="submit" data-modal-hide="{{$draft->id}}" type="button" class="text-white bg-fuchsia-900 hover:bg-fuchsia-950 focus:ring-4 focus:outline-none focus:ring-fuchsia-500 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                            Yes, I'm sure
                                                        </button>
                                                        <button data-modal-hide="{{$draft->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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