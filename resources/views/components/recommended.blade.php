
<div class="min-h-full py-10 bg-fixed bg-center bg-no-repeat bg-cover" :bestBook="$bestBook" style="background-image: url('{{ asset($backgrounds) }}');" :backgrounds="$backgrounds">
    <h1 class="pb-1 text-3xl font-bold tracking-tight text-white">
        Recommended for you
    </h1>
    <a
        href="#"
        class="flex flex-col items-center mx-4 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700"
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
                    {{$bestbook->title}}
                </h5>
                <p
                    class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                >
                    {{$bestbook->description}}
                </p>
                <p
                    class="px-4 py-2 font-normal rounded-full bg-slate-500 text-slate-50 dark:text-gray-400"
                >
                    {{$bestbook->genre}}
                </p>
            </div>
        </div>
    </a>
</div>

