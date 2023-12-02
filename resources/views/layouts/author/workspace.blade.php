@extends('index')

@section('title', 'Workspace')


@section('content')
    @include("partials.nav")
    <main class="container min-vh-full mx-auto">
        <div class="flex h-full w-full">

        
            <div class="h-[80vh] w-[30vw] p-8 flex flex-col justify-between">
                <h1 class="text-3xl text-black font-sans border-b-2 border-solid border-fuchsia-900 text-center py-2">Parts</h1>
                <section class="relative w-full h-full overflow-hidden overflow-y-auto bg-gray-100 rounded-lg">
                    
                    <div class="flex flex-col max-h-full overflow-y-auto w-full">
                        <article class="w-full py-2 border-b-2 border-solid border-fuchsia-900 h-28 px-3">
                            <h1 class="text-left font-semibold font-sans text-2xl text-black">Prologue</h1>
                            <p class="text-left font-sans text-gray-700 opacity-80">
                                Part 1
                            </p>
                        </article>
                        <article class="w-full py-2 border-b-2 border-solid border-fuchsia-900 h-28 px-3">
                            <h1 class="text-left font-semibold font-sans text-2xl text-black">Prologue</h1>
                            <p class="text-left font-sans text-gray-700 opacity-80">
                                Part 1
                            </p>
                        </article>
                        <article class="w-full py-2 border-b-2 border-solid border-fuchsia-900 h-28 px-3">
                            <h1 class="text-left font-semibold font-sans text-2xl text-black">Prologue</h1>
                            <p class="text-left font-sans text-gray-700 opacity-80">
                                Part 1
                            </p>
                        </article>
                        <article class="w-full py-2 border-b-2 border-solid border-fuchsia-900 h-28 px-3">
                            <h1 class="text-left font-semibold font-sans text-2xl text-black">Prologue</h1>
                            <p class="text-left font-sans text-gray-700 opacity-80">
                                Part 1
                            </p>
                        </article>
                    </div>
                </section>
                <section class="mt-2 p-4 block rounded-lg bg-gray-100 w-full h-fit">
                    <form action="" method="post" class="w-full flex flex-col items-center">
                        <h1 class="text-3xl font-sans text-black py-2">Create New Part</h1>
                        <input type="text" name="title" id="" placeholder="Enter Title" class="rounded-md mb-3 border-none focus:border-2 focus:border-fuchsia-900 active:border-fuchsia-900 w-full block text-xl">
                        <button type="submit" class="rounded-lg border-2 border-fuchsia-900 bg-white border-solid hover:bg-gray-200 text-black px-5 py-3 text-2xl font-sans">+ Create Part</button>
                    </form> 
                </section>
            </div>
            <div class="w-full p-7 mx-10">
                <div class="py-3 flex gap-4 justify-end w-full">
                    <button type="submit" class="text-white bg-fuchsia-900 hover:bg-fuchsia-950 px-4 py-2 font-sans text-xl rounded-l-full rounded-r-full">Save</button>
                    <button type="submit" class="text-white bg-fuchsia-900 hover:bg-fuchsia-950 px-4 py-2 font-sans text-xl rounded-l-full rounded-r-full">Publish</button>
                </div>
                <div class="w-full py-3">
                    <h1 class="text-4xl text-center font-sans mb-3 font-bold">Prologue</h1>
                    <div class="w-full h-fit">
                        <div class="flex px-5 relative bg-gray-200 py-1 justify-start rounded-md border border-gray-900">
                            <button data-tooltip-target="bold" id="btn-strong" type="button" class="text-black font-bold font-sans text-xl p-3 h-10 w-10 items-center flex justify-center rounded-lg bg-transparent hover:bg-gray-300">B</button>
                            <div id="bold" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Bold
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <button data-tooltip-target="italic" id="btn-em" type="button" class="text-black font-bold font-sans text-xl p-3 h-10 w-10 items-center flex justify-center rounded-lg bg-transparent hover:bg-gray-300"><em>I</em></button>
                            <div id="italic" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Italic
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full h-fit border-2 border-solid">
                        <textarea id="content" name="content" placeholder="Write something..." id="" rows="10" class="w-full overflow-y-scroll text-xl border-none focus:outline-none focus:ring-0 bg-white text-black resize-none border border-gray-900 rounded-lg p-5"></textarea>
                </div>
            </div>
        </div>
    </main>
@endsection