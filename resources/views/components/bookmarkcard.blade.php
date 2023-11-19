
<div class="flex items-start w-full h-full px-5 py-2 my-3 rounded-lg shadow-md md:my-5 card md:shadow-lg bookmark-border md:items-center md:min-h-32 shadow-gray-200 md:shadow-gray-200">
    <a href="/bookmarks/chapter/{{ $bookmark->id }}" class="w-full">
        <div class="flex flex-col justify-start py-2">
            <h2 class="block font-sans text-xl text-black line-clamp-3 md:text-2xl">{{ $bookmark->content }}</h2>
            <div class="flex flex-col items-start justify-start md:items-center md:flex-row">
                <p class="block mr-2 font-sans text-gray-400 text-md">{{ $bookmark->title }}</p>
                <p class="block mr-2 font-sans text-gray-400 text-md">Chapter - {{ $bookmark->chapterNumber }}</p>
            </div>
        </div>
    </a>
    <button data-modal-target="{{$bookmark->id}}" data-modal-toggle="{{$bookmark->id}}" class="p-3 bg-transparent rounded-full text-fuchsia-900 hover:text-fuchsia-950 hover:bg-gray-200" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
        </svg>
    </button>
</div>



    
<div id="{{$bookmark->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{$bookmark->id}}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 text-center md:p-5">
                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to remove this bookmark?</h3>
                <form class="inline-block" action="{{ route('bookmark.remove', ["authorID" => auth()->user()->id, "chapterID" => $bookmark->bookmark->chapterID]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button data-modal-hide="{{$bookmark->id}}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                        Yes, I'm sure
                    </button>
                </form>
                <button data-modal-hide="{{$bookmark->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            </div>
        </div>
    </div>
</div>
    