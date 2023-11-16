<div class="min-h-[90vh] w-full md:w-[60vw] px-5 md:p-0" :chapter="$chapter">
    <div>
        <h1 class="mb-5 font-sans text-3xl font-semibold text-center text-black">{{ $chapter->title }}</h1>
        <p id="content" class="font-serif text-xl text-left text-gray-700">{{ $chapter->content }}</p>
    </div>
</div>