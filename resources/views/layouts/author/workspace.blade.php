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
                                <article class="w-full px-3 py-2 border-b-2 border-solid line-clamp-1 border-fuchsia-900 h-28">
                                    <h1 class="font-sans text-2xl font-semibold text-left text-black">Chapter {{ $chapter->chapter }}</h1>
                                    <p class="font-sans text-left text-gray-700 line-clamp-2 text-ellipsis opacity-80">
                                        {{ $chapter->content }}
                                    </p>
                                </article>
                            @endforeach
                        @else
                            <p class="font-sans text-xl text-center text-black">You have no parts yet.</p>
                        @endunless
                        
                        
                    </div>
                </section>
                <section class="block w-full p-4 mt-2 bg-gray-100 rounded-lg h-fit">
                    <form action="" method="post" class="flex flex-col items-center w-full">
                        <h1 class="py-2 font-sans text-3xl text-black">Create New Part</h1>
                        <input type="text" name="title" id="" placeholder="Enter Title" class="block w-full mb-3 text-xl border-none rounded-md focus:border-2 focus:border-fuchsia-900 active:border-fuchsia-900">
                        <button type="submit" class="px-5 py-3 font-sans text-2xl text-black bg-white border-2 border-solid rounded-lg border-fuchsia-900 hover:bg-gray-200">+ Create Part</button>
                    </form> 
                </section>
            </div>
            <div class="w-full mx-10 p-7">
                <div class="flex justify-end w-full gap-4 py-3">
                    <button type="submit" class="px-4 py-2 font-sans text-xl text-white rounded-l-full rounded-r-full bg-fuchsia-900 hover:bg-fuchsia-950">Save</button>
                    <button type="submit" class="px-4 py-2 font-sans text-xl text-white rounded-l-full rounded-r-full bg-fuchsia-900 hover:bg-fuchsia-950">Publish</button>
                </div>
                <div class="w-full py-3">
                    <input type="text" name="title" id="" placeholder="Write your title here" class="w-full mb-3 font-sans text-4xl font-semibold text-left text-black border-none outline-none">
                    <div class="w-full h-fit">
                        <div class="relative flex justify-start px-5 py-1 bg-gray-200 border border-gray-900 rounded-md">
                            <button data-tooltip-target="bold" id="btn-strong" type="button" class="flex items-center justify-center w-10 h-10 p-3 font-sans text-xl font-bold text-black bg-transparent rounded-lg hover:bg-gray-300">B</button>
                            <div id="bold" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Bold
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <button data-tooltip-target="italic" id="btn-em" type="button" class="flex items-center justify-center w-10 h-10 p-3 font-sans text-xl font-bold text-black bg-transparent rounded-lg hover:bg-gray-300"><em>I</em></button>
                            <div id="italic" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Italic
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full border-2 border-solid h-fit">
                        <textarea id="content" name="content" placeholder="Write something..." id="" rows="10" class="w-full p-5 overflow-y-scroll text-xl text-black bg-white border border-gray-900 border-none rounded-lg resize-none focus:outline-none focus:ring-0"><strong>Hello</strong></textarea>
                </div>
            </div>
        </div>
    </main>
@endsection