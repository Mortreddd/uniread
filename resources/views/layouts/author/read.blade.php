<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="scroll-smooth scroll-p-40"
>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link
            rel="shortcut icon"
            href="{{ asset('favicon.ico') }}"
            type="image/x-icon"
        />
        <title>Read - {{ $chapter->title }}</title>
        @vite(['resources/css/app.css','resources/js/app.js',
        'resources/js/tabs.js', 'resources/js/voice.js'])
        <script src="../../js/app.js"></script>
        <script src="https://code.responsivevoice.org/responsivevoice.js"></script>

    </head>
    <body>
        @include('partials.nav')
        <main class="container box-border w-full min-h-full p-0 m-0">
            <section class="flex items-center justify-between w-full px-3 py-5 border-b-2 border-gray-200 border-solid shadow-lg shadow-gray-100">
                <div class="flex flex-row items-center">
                    <button id="dropdownChapters" data-dropdown-toggle="chapters" class="flex items-center px-5 py-3 ml-2 text-lg font-semibold bg-transparent rounded-lg text-fuchsia-900 hover:text-fuchsia-950 hover:bg-gray-200" type="button">Chapter - {{ $chapter->chapterNumber }}<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <form action="" method="post">
                        <button data-popover-target="bookmark" type="submit" class="flex flex-row items-center justify-center p-3 font-sans text-lg font-semibold rounded-full hover:bg-gray-200 md:hidden text-fucshia-900 text-fuchsia-900 hover:text-fuchsia-950">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button type="submit" class="flex-row items-center hidden font-sans text-lg font-semibold md:flex text-fucshia-900 text-fuchsia-900 hover:text-fuchsia-950">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                                <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z" clip-rule="evenodd" />
                            </svg>
                            Add to bookmark
                        </button>

                        <div data-popover id="bookmark" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-fit">
                            <div class="px-3 py-2">
                                <p>Add to bookmark</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                    </form>
                        <!-- Dropdown menu -->
                    <div id="chapters" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownChapters">
                            @foreach($chapters as $chapter)
                                <li>
                                    <a href="/books/{{ $chapter->bookID }}/read/chapter/{{ $chapter->chapterNumber }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Chapter - {{ $chapter->chapterNumber }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="flex items-center">
                    <button id="talk" data-popover-target="voice-speech" type="button" class="flex items-center p-3 mx-1 bg-transparent rounded-full md:p-5 md:mx-3 text-fuchsia-900 hover:text-fuchsia-950 hover:bg-gray-200">
                        <svg id="speak" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M8.25 4.5a3.75 3.75 0 117.5 0v8.25a3.75 3.75 0 11-7.5 0V4.5z" />
                            <path d="M6 10.5a.75.75 0 01.75.75v1.5a5.25 5.25 0 1010.5 0v-1.5a.75.75 0 011.5 0v1.5a6.751 6.751 0 01-6 6.709v2.291h3a.75.75 0 010 1.5h-7.5a.75.75 0 010-1.5h3v-2.291a6.751 6.751 0 01-6-6.709v-1.5A.75.75 0 016 10.5z" />
                        </svg>
                    </button>

                    <div data-popover id="voice-speech" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-fit">
                        <div class="px-3 py-2">
                            <p>Voice Speech</p>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                    <form action="" method="post" class="mx-1 md:mx-3">
                        @csrf
                        <button type="submit" class="flex items-center px-2 py-2 text-white bg-gray-500 rounded-lg md:px-4 hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                                <path d="M7.493 18.75c-.425 0-.82-.236-.975-.632A7.48 7.48 0 016 15.375c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75 2.25 2.25 0 012.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23h-.777zM2.331 10.977a11.969 11.969 0 00-.831 4.398 12 12 0 00.52 3.507c.26.85 1.084 1.368 1.973 1.368H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 01-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227z" />
                              </svg>
                              
                            Vote
                        </button>
                    </form>
                    <button data-popover-target="report" type="button" class="flex items-center p-3 mx-1 bg-transparent rounded-full md:p-5 md:mx-3 text-fuchsia-900 hover:text-fuchsia-950 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M3 2.25a.75.75 0 01.75.75v.54l1.838-.46a9.75 9.75 0 016.725.738l.108.054a8.25 8.25 0 005.58.652l3.109-.732a.75.75 0 01.917.81 47.784 47.784 0 00.005 10.337.75.75 0 01-.574.812l-3.114.733a9.75 9.75 0 01-6.594-.77l-.108-.054a8.25 8.25 0 00-5.69-.625l-2.202.55V21a.75.75 0 01-1.5 0V3A.75.75 0 013 2.25z" clip-rule="evenodd" />
                      </svg>
                      
                    </button>

                    <div data-popover id="report" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-fit">
                        <div class="px-3 py-2">
                            <p>Report</p>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </div>
            </section>
            <article class="flex flex-col items-center w-full h-full py-5">
                <div class="min-h-[90vh] w-[60vw]">
                    <div>
                        <h1 class="mb-5 font-sans text-3xl font-semibold text-center text-black">{{ $chapter->title }}</h1>
                        <p id="content" class="font-serif text-xl text-left text-gray-700">{!! $chapter->content !!}</p>
                    </div>
                </div>
                <div class="w-full md:w-[60vw] px-2 md:px-10 border-2 border-gray-200 rounded-md shadow-xl h-fit shadow-gray-200">
                    
                    @unless($comments->isEmpty())
                        @foreach($comments as $comment)
                            <x-comment :comment="$comment"></x-comment>
                        @endforeach
                    @else
                        <p class="font-sans text-2xl text-center text-gray-500">No comments yet.</p>
                    @endunless
                    <form action="" method="post" class="mb-5">
                        <div class="relative flex flex-row items-center bg-transparent border-2 border-gray-200 border-solid rounded-full outline-none">
                            <input type="text" class="w-full border-none rounded-full outline-none focus:border-none focus:outline-none focus:outline-0"  placeholder="Write something...">
                            <button type="submit" class="flex flex-row items-center p-2 bg-transparent rounded-full hover:bg-gray-200 text-fuchsia-900 hover:text-fuchsia-950">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </article>
            
        </main>
    </body>
</html>