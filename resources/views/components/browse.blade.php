<li>
    <button
        id="mega-menu-dropdown-button"
        data-dropdown-toggle="mega-menu-dropdown"
        class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-sm border-b md:text-lg md:hover:text-fuchsia-900 md:hover:bg-transparent md:text- md:text-gray-800 md:border-0 md:p-0 md:w-auto"
    >
        Browse
        <svg
            class="w-2.5 h-2.5 ml-2.5"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 10 6"
        >
            <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 1 4 4 4-4"
            />
        </svg>
    </button>
    <div
        id="mega-menu-dropdown"
        class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-3 dark:bg-gray-700"
    >
        <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
            <ul class="space-y-4" aria-labelledby="mega-menu-dropdown-button">
                <li>
                    <a
                        href="{{ route('genre.index', ['genreID' => 6])}}"
                        class="text-gray-600 hover:text-fuchsia-900"
                    >
                        Fantasy
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('genre.index', ['genreID' => 1])}}"
                        class="text-gray-600 hover:text-fuchsia-900"
                    >
                        Mystery
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('genre.index', ['genreID' => 7])}}"
                        class="text-gray-600 hover:text-fuchsia-900"
                    >
                        Thriller
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('genre.index', ['genreID' => 8])}}"
                        class="text-gray-600 hover:text-fuchsia-900"
                    >
                        Action
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('genre.index', ['genreID' => 5])}}"
                        class="text-gray-600 hover:text-fuchsia-900"
                    >
                        Historical Fiction
                    </a>
                </li>
            </ul>
        </div>
        <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
            <ul class="space-y-4">
                <li>
                    <a
                        href="{{ route('genre.index', ['genreID' => 2])}}"
                        class="text-gray-600 hover:text-fuchsia-900"
                    >
                        Teen Fiction
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('genre.index', ['genreID' => 3])}}"
                        class="text-gray-600 hover:text-fuchsia-900"
                    >
                        Science Fiction
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('genre.index', ['genreID' => 4])}}"
                        class="text-gray-600 hover:text-fuchsia-900"
                    >
                        General Fiction
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('genre.index', ['genreID' => 13])}}"
                        class="text-gray-600 hover:text-fuchsia-900"
                    >
                        Horror
                    </a>
                </li>
            </ul>
        </div>
        <div class="p-4">
            <ul class="space-y-4">
                <li>
                    <a
                        href="{{ route('genre.index', ['genreID' => 9])}}"
                        class="text-gray-600 hover:text-fuchsia-900"
                    >
                        Romance
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('genre.index', ['genreID' => 10])}}"
                        class="text-gray-600 hover:text-fuchsia-900"
                    >
                        Adventure
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('genre.index', ['genreID' => 12])}}"
                        class="text-gray-600 hover:text-fuchsia-900 "
                    >
                        Spiritual
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('genre.index', ['genreID' => 11])}}"
                        class="text-gray-600 hover:text-fuchsia-900"
                    >
                        Paranormal
                    </a>
                </li>
            </ul>
        </div>
    </div>
</li>
