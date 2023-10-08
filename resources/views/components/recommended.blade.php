<main class="container">
    <div class="w-full m-10">
        <h1 class="pb-1 text-2xl font-bold tracking-tight">
            Recommended for you
        </h1>
        <a
            href="#"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700"
        >
            <img
                class="object-contain w-full rounded-t-lg h-96 md:h-auto md:w-60 md:rounded-none md:rounded-l-lg"
                src="{{ asset('static/hell_university.jpg') }}"
                alt=""
            />

            <div class="flex flex-col justify-between p-4 leading-normal">
                <div class="my-2">
                    <h5
                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                    >
                        {{$bestBook->title}}
                    </h5>
                    <p
                        class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                    >
                        {{$bestBook->description}}
                    </p>
                    <p
                        class="px-4 py-2 font-normal rounded-full bg-slate-500 text-slate-50 dark:text-gray-400"
                    >
                        {{$bestBook->genre}}
                    </p>
                </div>
            </div>
        </a>
    </div>
</main>
