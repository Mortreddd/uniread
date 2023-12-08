<div class="relative w-full my-3 md:my-5 card" :comment="$comment">
    <div class="flex items-start justify-between w-full h-full px-5 py-2 border-2 border-solid rounded-lg shadow-lg md:items-center md:min-h-32 shadow-gray-300">
        <div class="flex items-start w-full">
            <img src="{{ asset($comment->authors->first()->image) }}" alt="" class="block float-right object-contain h-24 mr-5 border-4 border-gray-500 rounded-full md:max-w-32 md:max-h-32 aspect-square" />
            <div class="flex flex-col justify-start py-2">
                <h2 class="block font-sans text-xl text-black md:text-2xl">{{ $comment->authors->first()->username }}</h2>
                <p class="block font-sans text-gray-700 text-md">{{ $comment->content }}</p>
            </div>
        </div>  
    </div>
</div>
