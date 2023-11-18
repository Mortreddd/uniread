<article class="flex justify-between w-full gap-20 p-10">
    <div class="flex flex-col items-center flex-grow p-4 border-4 border-gray-400 border-solid rounded-lg spacing-y-3">
        <h3 class="font-sans text-md text gray-200">Total active users</h3>
        <h4 class="flex flex-row items-center font-sans text-4xl text-green-500"><span class="flex w-3 h-3 mr-1 bg-green-500 rounded-full me-3"></span>{{ number_format($activeAuthors, 0, '.', ',') }}</h4>
    </div>
    <div class="flex flex-col items-center flex-grow p-4 border-4 border-gray-400 border-solid rounded-lg spacing-y-3">
        <h3 class="font-sans text-md text gray-200">Total inactive users</h3>
        <h4 class="flex flex-row items-center font-sans text-4xl text-red-500"><span class="flex w-3 h-3 mr-1 bg-red-500 rounded-full me-3"></span>{{ number_format($inActiveAuthors, 0, '.', ',') }}</h4>
    </div>
    <div class="flex flex-col items-center flex-grow p-4 border-4 border-gray-400 border-solid rounded-lg spacing-y-3">
        <h3 class="font-sans text-md text gray-200">Total book votes</h3>
        <h4 class="flex flex-row items-center font-sans text-4xl text-blue-500"><span class="flex w-3 h-3 mr-1 bg-blue-500 rounded-full me-3"></span>{{ number_format($totalVotes, 0, '.', ',') }}</h4>
    </div>
</article>