<a
    href="/user/profile/{{ $author->id }}"
    class="relative w-full my-3 card"
    :author="$author"
>
    <div
        class="flex items-center w-full h-32 px-5 py-4 border-2 border-solid rounded-lg shadow-lg md:h-52 shadow-gray-300"
    >
        <img
            src="{{ asset('profiles/default-profile.jpg') }}"
            alt=""
            class="block float-right object-contain h-full mr-5 border-4 border-gray-500 rounded-full md:w-40 md:h-40 aspect-square"
        />
        <div class="flex flex-col justify-around w-full h-full py-10">
        <h2 class="block font-sans text-lg text-black md:text-2xl">{{'@'}}{{ $author->username }}</h2>
        <div class="flex ">
            <p class="mr-5 font-sans text-gray-500 text-md md:text-xl">{{ number_format($author->books->count(), 0, '.', ',') }} @if($author->books->count() > 1) Stories @else Story @endif</p>
            <p class="font-sans text-gray-500 text-md md:text-xl">{{ number_format($author->followers->count(), 0, '.', ',') }} @if($author->followers->count() > 1) Followers @else Follower @endif</p>
        </div>
    </div>
    </div>
</a>