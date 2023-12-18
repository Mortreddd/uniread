@extends('index')

@section('title', 'Workspace')


@section('content')
    @include("partials.nav")
    
    <main class="container mx-auto min-vh-full">
        <div class="flex w-full h-full">

        
            <div class="h-[80vh] w-[35vw] md:w-[30vw] p-3 md:p-8 flex flex-col md:justify-between">
                <section class="block w-full p-2 bg-gray-100 rounded-lg md:p-4 h-44 md:h-fit">
                    <form action="{{ route('chapter.create') }}" method="post" class="flex flex-col items-center w-full">
                        @csrf
                        <h1 class="py-2 font-sans text-black text-md md:text-3xl">Create New Part</h1>
                        <input type="hidden" name="bookID" value="{{ $selectedBook->id }}">
                        <input type="text" name="chapter" id="" autocomplete="off" placeholder="Ex: Epilogue, Prologue, 1, 2" class="block w-full mb-1 border-none rounded-md md:mb-3 text-md md:text-xl focus:border-2 focus:border-fuchsia-900 active:border-fuchsia-900">
                        <button type="submit" class="px-2 py-1 font-sans text-lg text-black bg-white border-2 border-solid rounded-lg md:px-5 md:py-3 md:text-2xl border-fuchsia-900 hover:bg-gray-200">+ Create Part</button>
                    </form> 
                </section>
                <h1 class="py-2 font-sans text-xl text-center text-black border-b-2 border-solid md:text-3xl border-fuchsia-900">Parts</h1>
                <section class="relative w-full h-full overflow-hidden overflow-y-hidden bg-gray-100 rounded-lg">
                    
                    <div class="flex flex-wrap w-full max-h-full overflow-y-scroll">
                        @unless($chapters->isEmpty())
                            @foreach ($chapters as $chapter)
                                <a href="{{ route("workspace", ["bookID" => $book->id, "chapterID" => $chapter->id]) }}" class="w-full h-24 px-3 py-2 border-b-2 border-solid md:h-32 line-clamp-1 hover:bg-gray-300 border-fuchsia-900">
                                    <h1 class="font-sans text-lg font-semibold text-left text-black md:text-2xl">Chapter {{ $chapter->chapter }}</h1>
                                    <p class="font-sans text-left text-gray-700 line-clamp-2 text-ellipsis opacity-80">
                                        {{ $chapter->content }}
                                    </p>
                                </a>
                            @endforeach
                        @else
                            <p class="my-4 font-sans text-xl text-center text-black">You have no parts yet.</p>
                        @endunless
                    </div>                    
                </section>
            </div>
                <form action="{{ route('chapter.track', ['bookID' => $selectedChapter->bookID, 'chapterID' => $selectedChapter->id]) }}" method="POST" class="w-full p-2 mx-2 md:mx-10 md:p-7 ">
                    @csrf
                    <div class="flex justify-start w-full gap-1 py-3 md:gap-4 md:justify-end">
                        <input type="hidden" name="bookID" value="{{ $selectedChapter->bookID }}">
                        <input value="Delete" type="submit" name="delete" class="px-2 py-1 font-sans text-white bg-red-700 rounded-lg md:px-4 md:py-2 text-md md:text-xl hover:bg-red-800"/>
                        <input value="Save" type="submit" name="save" class="px-2 py-1 font-sans text-white rounded-lg md:px-4 md:py-2 text-md md:text-xl bg-fuchsia-900 hover:bg-fuchsia-950"/>
                        @if($hasPublished)
                            <input value="Unpublish" type="submit" name="unpublish" class="px-2 py-1 font-sans text-white rounded-lg md:px-4 md:py-2 text-md md:text-xl bg-fuchsia-900 hover:bg-fuchsia-950"/>
                        @else
                            <input value="Publish" type="submit" name="publish" class="px-2 py-1 font-sans text-white rounded-lg md:px-4 md:py-2 text-md md:text-xl bg-fuchsia-900 hover:bg-fuchsia-950"/>
                        @endif
                    </div>
                    <div class="w-full py-3">
                        <input type="text" name="title" id="" value="{{ $selectedChapter->title }}" placeholder="Write your title here" class="w-full mb-3 font-sans text-lg font-semibold text-left text-black border-none outline-none md:text-4xl">
                        <div class="w-full border-2 border-solid h-fit">
                            <textarea id="content" name="content" placeholder="Write something..." id="" rows="10" class="w-full p-5 overflow-y-scroll text-black bg-white border border-gray-900 border-none rounded-lg resize-none text-md md:text-xl focus:outline-none focus:ring-0">{{ $selectedChapter->content }}</textarea>
                        </div>
                    </div>
                </form>
            
        </div>
    </main>

    
@endsection