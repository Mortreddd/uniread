<div class="relative w-full my-3 md:my-5 card" :comment="$comment">
    <div class="flex items-start w-full h-full px-5 py-2 border-2 border-solid rounded-lg shadow-lg md:items-center md:min-h-32 shadow-gray-300">
        <img src="{{ asset($comment->authors->first()->image) }}" alt="" class="block float-right object-contain h-24 mr-5 border-4 border-gray-500 rounded-full md:max-w-32 md:max-h-32 aspect-square" />
        <div class="flex flex-col justify-start py-2">
            <h2 class="block font-sans text-xl text-black md:text-2xl">{{ $comment->authors->first()->username }}</h2>
            <p class="block font-sans text-gray-700 text-md">{{ $comment->content }}</p>
            <div class="flex flex-row items-center py-2">
                <form action="" method="post">
                    <button class="mr-5 font-semibold bg-transparent border-none outline-none text-fuchsia-900 text-md hover:text-fuchsia-950">Like</button>
                </form>
                <div>
                    <button class="mr-5 font-semibold bg-transparent border-none outline-none text-fuchsia-900 text-md hover:text-fuchsia-950">Reply</button>
                </div>
            </div>
        </div>
        <button class="p-3 bg-transparent rounded-full text-fuchsia-900 hover:text-fuchsia-950 hover:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
            </svg>
        </button>
    </div>
</div>
