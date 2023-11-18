
<div class="min-h-screen w-[20vw] px-2 py-10 bg-fuchsia-900">
    <ul class="flex flex-col justify-start w-full space-y-5 font-sans text-2xl font-semibold text-white">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="flex flex-row items-center w-full px-3 py-2 bg-transparent rounded-lg hover:bg-fuchsia-950 hover:text-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                </svg>
                Dashboard           
            </a>
        </li>
        <li>
            <a href="{{ route('admin.authors') }}" class="flex flex-row items-center w-full px-3 py-2 bg-transparent rounded-lg hover:bg-fuchsia-950 hover:text-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                  
                Authors           
            </a>
        </li>
        <li>
            <a href="{{ route('admin.books') }}" class="flex flex-row items-center w-full px-3 py-2 bg-transparent rounded-lg hover:bg-fuchsia-950 hover:text-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                </svg>
                Books           
            </a>
        </li>
    </ul>
</div>