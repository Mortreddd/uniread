<section class="w-full h-full py-3">
    <div class="px-5">
        <div class="flex justify-between w-full h-full ">
            <h1 class="font-sans text-2xl font-semibold text-black">Stories</h1>
            <h1 class="font-sans text-2xl font-semibold text-black">Date Published</h1>
        </div>
        <div class="flex flex-col items-center w-full h-full py-7">
            @foreach($publishedBooks as $published)
                <div class="flex items-center justify-between w-full h-full my-3">
                    <div>
                        
                        <h1 class="font-sans text-2xl font-semibold text-black">{{ $published->book->title }}</h1>
                        <h1 class="text-xl text-black">{{'@'}}{{ $published->author->username }}</h1>
                    </div>
                    <h1 class="font-sans text-xl font-semibold text-black">{{ $published->created_at }}</h1>
                </div>
            @endforeach
        </div>
    </div>
    
</section>