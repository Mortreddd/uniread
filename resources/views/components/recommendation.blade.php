<section class="w-full p-5 bg-gray-100 border-2 border-gray-200" :recommendations = 'recommendations'>
    <h3 class="font-sans text-2xl text-gray-500">Recommendations</h3>
    <div class="flex flex-row overflow-hidden">
        @foreach($recommendations as $book)
            <x-card :book="$book"></x-card>
        @endforeach
    </div>
</section>