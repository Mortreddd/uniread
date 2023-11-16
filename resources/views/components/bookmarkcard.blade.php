<a href="/bookmarks/chapter/{{ $bookmark->id }}" class="w-full my-3 md:my-5 card" :bookmark="$bookmark">
    <div class="flex items-start w-full h-full px-5 py-2 rounded-lg shadow-md md:shadow-lg bookmark-border md:items-center md:min-h-32 shadow-gray-200 md:shadow-gray-200">
        <div class="flex flex-col justify-start py-2">
            <h2 class="block font-sans text-xl text-black line-clamp-3 md:text-2xl">{{ $bookmark->content }}</h2>
            <div class="flex flex-col items-start justify-start md:items-center md:flex-row">
                <p class="block mr-2 font-sans text-gray-400 text-md">{{ $bookmark->title }}</p>
                <p class="block mr-2 font-sans text-gray-400 text-md">Chapter - {{ $bookmark->chapterNumber }}</p>
            </div>
        </div>
        <button class="p-3 bg-transparent rounded-full text-fuchsia-900 hover:text-fuchsia-950 hover:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
            </svg>
        </button>
    </div>
</a>