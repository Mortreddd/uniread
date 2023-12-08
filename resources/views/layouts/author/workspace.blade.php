@extends('index')

@section('title', 'Workspace')


@section('content')
    @include("partials.nav")
    
    <main class="container mx-auto min-vh-full">
        <div class="flex w-full h-full">

        
            <div class="h-[80vh] w-[30vw] p-8 flex flex-col justify-between">
                <h1 class="py-2 font-sans text-3xl text-center text-black border-b-2 border-solid border-fuchsia-900">Parts</h1>
                <section class="relative w-full h-full overflow-hidden overflow-y-auto bg-gray-100 rounded-lg">
                    
                    <div class="flex flex-col w-full max-h-full overflow-y-auto">
                        @unless($chapters->isEmpty())
                            @foreach ($chapters as $chapter)
                                <a href="{{ route("workspace", ["bookID" => $book->id, "chapterID" => $chapter->id]) }}" class="w-full px-3 py-2 border-b-2 border-solid line-clamp-1 border-fuchsia-900 min-h-28">
                                    <h1 class="font-sans text-2xl font-semibold text-left text-black">Chapter {{ $chapter->chapter }}</h1>
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
                <section class="block w-full p-4 mt-2 bg-gray-100 rounded-lg h-fit">
                    <form action="{{ route('chapter.create') }}" method="post" class="flex flex-col items-center w-full">
                        @csrf
                        <h1 class="py-2 font-sans text-3xl text-black">Create New Part</h1>
                        <input type="hidden" name="bookID" value="{{ $selectedBook->id }}">
                        <input type="text" name="chapter" id="" autocomplete="off" placeholder="Ex: Epilogue, Prologue, 1, 2" class="block w-full mb-3 text-xl border-none rounded-md focus:border-2 focus:border-fuchsia-900 active:border-fuchsia-900">
                        <button type="submit" class="px-5 py-3 font-sans text-2xl text-black bg-white border-2 border-solid rounded-lg border-fuchsia-900 hover:bg-gray-200">+ Create Part</button>
                    </form> 
                </section>
            </div>
            @unless ($chapters->isEmpty())
                <form action="{{ route('chapter.track', ['bookID' => $selectedChapter->bookID, 'chapterID' => $selectedChapter->id]) }}" method="POST" class="w-full mx-10 p-7">
                    @csrf
                    <div class="flex justify-end w-full gap-4 py-3">
                        <input type="hidden" name="bookID" value="{{ $selectedChapter->bookID }}">
                        <input value="Delete" type="submit" name="delete" class="px-4 py-2 font-sans text-xl text-white bg-red-700 rounded-lg hover:bg-red-800"/>
                        <input value="Save" type="submit" name="save" class="px-4 py-2 font-sans text-xl text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950"/>
                        @if($selectedBook->published)
                            <input value="Unpublish" type="submit" name="unpublish" class="px-4 py-2 font-sans text-xl text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950"/>
                        @elseif (!$selectedBook->published)
                            <input value="Publish" type="submit" name="publish" class="px-4 py-2 font-sans text-xl text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950"/>
                        @endif
                    </div>
                    <div class="w-full py-3">
                        <input type="text" name="title" id="" value="{{ $selectedChapter->title }}" placeholder="Write your title here" class="w-full mb-3 font-sans text-4xl font-semibold text-left text-black border-none outline-none">
                        <div class="w-full border-2 border-solid h-fit">
                            <textarea id="content" name="content" placeholder="Write something..." id="" rows="10" class="w-full p-5 overflow-y-scroll text-xl text-black bg-white border border-gray-900 border-none rounded-lg resize-none focus:outline-none focus:ring-0">{{ $selectedChapter->content }}</textarea>
                        </div>
                    </div>
                </form>
            @endunless
            
        </div>
    </main>

    
@endsection