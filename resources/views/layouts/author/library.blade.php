@extends('index')


@section('title', 'Library')


@section('content')
    <main class="container box-border w-full min-h-full p-0 m-0">
        <div class="w-full py-5 bg-fuchsia-900">
            <nav
                class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700"
            >
                <div
                    class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto"
                >
                    <x-logo></x-logo>
                    <button
                        data-collapse-toggle="navbar-multi-level"
                        type="button"
                        class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-multi-level"
                        aria-expanded="false"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 17 14"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15"
                            />
                        </svg>
                    </button>
                    <div
                        class="hidden w-full md:block md:w-auto"
                        id="navbar-multi-level"
                    >
                        <ul
                            class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                        >
                            <li>
                                <a
                                    href="{{ route('messages.inbox') }}"
                                    class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-sm border-b cursor-pointer md:text-lg md:hover:text-fuchsia-900 md:hover:bg-transparent md:text- md:text-gray-800 md:border-0 md:p-0 md:w-auto"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                        class="w-6 h-6 mr-2"
                                    >
                                        <path
                                            d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z"
                                        />
                                        <path
                                            d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z"
                                        />
                                    </svg>

                                    Messages
                                </a>
                            </li>
                            
                            <x-profile></x-profile>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="flex justify-between md:justify-evenly">
            <button
                class="flex flex-col items-center py-2 mr-3 font-sans text-lg border-solid md:py-4 md:text-2xl md:flex-row md:items-start tab-button active"
                data-tab="#readlist"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="w-5 h-5 md:mr-2 md:w-7 md:h-7 "
                >
                    <path
                        d="M19.5 21a3 3 0 003-3v-4.5a3 3 0 00-3-3h-15a3 3 0 00-3 3V18a3 3 0 003 3h15zM1.5 10.146V6a3 3 0 013-3h5.379a2.25 2.25 0 011.59.659l2.122 2.121c.14.141.331.22.53.22H19.5a3 3 0 013 3v1.146A4.483 4.483 0 0019.5 9h-15a4.483 4.483 0 00-3 1.146z"
                    />
                </svg>

                Current Reading List
            </button>
            <button
                class="flex flex-col items-center py-2 font-sans text-lg border-solid md:py-4 md:mr-3 md:flex-row md:items-start md:text-2xl tab-button"
                data-tab="#bookmarks"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="w-5 h-5 md:mr-2 md:w-7 md:h-7"
                >
                    <path
                        fill-rule="evenodd"
                        d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z"
                        clip-rule="evenodd"
                    />
                </svg>

                Bookmarks
            </button>
            <button
                class="flex flex-col items-center py-2 mr-3 font-sans text-lg border-solid md:py-4 md:flex-row md:items-start md:text-2xl tab-button"
                data-tab="#archive"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="w-5 h-5 md:mr-2 md:w-7 md:h-7"
                >
                    <path
                        fill-rule="evenodd"
                        d="M19.5 21a3 3 0 003-3V9a3 3 0 00-3-3h-5.379a.75.75 0 01-.53-.22L11.47 3.66A2.25 2.25 0 009.879 3H4.5a3 3 0 00-3 3v12a3 3 0 003 3h15zm-6.75-10.5a.75.75 0 00-1.5 0v4.19l-1.72-1.72a.75.75 0 00-1.06 1.06l3 3a.75.75 0 001.06 0l3-3a.75.75 0 10-1.06-1.06l-1.72 1.72V10.5z"
                        clip-rule="evenodd"
                    />
                </svg>
                Archive
            </button>
        </div>
        <div class="flex w-full px-5 py-4 md:py-8">
            <div class="w-full px-2 tab-content" id="readlist">
                <x-readinglist :library="$library"></x-readinglist>
            </div>
            <div class="hidden w-full px-2 tab-content" id="bookmarks">
                <x-bookmarks :bookmarks="$bookmarks"></x-bookmarks>
            </div>
            <div class="hidden w-full px-2 tab-content" id="archive">
                <x-archives :archives="$archives"></x-archives>
            </div>
        </div>
    </main>
@endsection
