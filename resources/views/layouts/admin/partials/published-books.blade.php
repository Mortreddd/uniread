<section class="w-full">
    <div class="flex w-full py-5 shadow-lg justify-evenly shadow-gray-200">
        <button
            class="flex flex-col items-center py-4 mr-3 font-sans text-xl border-solid md:text-2xl md:flex-row md:items-start tab-button active"
            data-tab="#published-books"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="md:mr-2 w-7 h-7"
            >
                <path
                    d="M19.5 21a3 3 0 003-3v-4.5a3 3 0 00-3-3h-15a3 3 0 00-3 3V18a3 3 0 003 3h15zM1.5 10.146V6a3 3 0 013-3h5.379a2.25 2.25 0 011.59.659l2.122 2.121c.14.141.331.22.53.22H19.5a3 3 0 013 3v1.146A4.483 4.483 0 0019.5 9h-15a4.483 4.483 0 00-3 1.146z"
                />
            </svg>

            Published Books
        </button>
        <button
            class="flex flex-col items-center py-4 font-sans text-xl border-solid md:mr-3 md:flex-row md:items-start md:text-2xl tab-button"
            data-tab="#trending-books"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-7 md:mr-2 h-7"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"
                />
            </svg>

            Trending Books
        </button>
    </div>
    <div class="flex w-full min-h-screen px-5 py-10">
        <div class="w-full px-2 tab-content" id="published-books">
            @include('layouts.admin.statistics.published-books', ['publishedBooks' => $publishedBooks])
        </div>
        <div class="hidden w-full px-2 tab-content min-h-[50vh]" id="trending-books">
            @include('layouts.admin.chart.trending-books-chart', ['genreCounts' => $genreCounts])
        </div>
    </div>
</section>