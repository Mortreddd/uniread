<li>
    <button
        id="mega-menu-dropdown-button"
        data-dropdown-toggle="dropdownInformation"
        class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-sm border-b md:text-lg md:hover:text-fuchsia-900 md:hover:bg-transparent md:text- md:text-gray-800 md:border-0 md:p-0 md:w-auto"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="mr-1 w-7 h-7"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"
            />
        </svg>
        {{ auth()->user()->username }}
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
        id="dropdownInformation"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600"
    >
        <ul
            class="flex flex-col items-center text-sm text-gray-700 dark:text-gray-200"
            aria-labelledby="dropdownInformationButton"
        >
            <li>
                <form
                    action="/profile/{{ auth()->user()->username }}"
                    method="GET"
                    class="py-2"
                >
                    <button
                        type="submit"
                        class="w-full px-10 py-2 text-sm text-gray-700 rounded-md px-auto hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                    >
                        My Profile
                    </button>
                </form>
            </li>
            <li>
                <a
                    href="{{ route('profile.settings') }}"
                    class="w-full px-10 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    >Settings</a
                >
            </li>
            <li>
                <form action="/logout" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="w-full px-10 py-2 text-sm text-gray-700 rounded-md px-auto hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                    >
                        Sign out
                    </button>
                </form>
            </li>
        </ul>
    </div>
</li>
