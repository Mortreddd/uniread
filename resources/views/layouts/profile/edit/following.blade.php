<div id="following-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t bg-fuchsia-950 md:p-5 dark:border-gray-600">
                <button type="button" class="end-2.5 text-white bg-transparent hover:bg-fuchsia-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="following-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                {{-- Change the route for editing the fullname --}}
                <h3 class="text-xl font-semibold text-fuchsia-950 ">
                    Followings of {{ $author->fullname }}
                </h3>   
                    <div class="w-full flex justify-center h-80 flex-wrap overflow-x-hidden overflow-y-auto">
                        
                    
                    @unless($following->isEmpty())

                        @foreach ($following as $followed)
                        <a href="{{ route('author.profile', ['id' => $followed->followed->id]) }}" class="flex items-center justify-center w-full h-20 mx-1 bg-gray-100 border-2 border-gray-200 border-solid rounded-lg md:justify-normal hover:cursor-pointer md:p-2 hover:bg-gray-300 md:h-24">

                            <img
                                src="{{ asset($followed->followed->image) }}"
                                alt=""
                                class="w-10 h-10 border-2 border-gray-500 rounded-full md:mr-2 md:w-12 md:h-12"
                            />
                            <div class="items-center justify-between hidden w-full flex-nowrap md:flex">
                                <div class="flex flex-col w-full h-full justify-evenly">
                                    <h1 class="font-sans text-sm md:text-md font-semibold text-black">
                                        {{ $followed->followed->fullname }}
                                    </h1>
                                    <p class="w-full font-sans text-gray-400 text-ellipsis line-clamp-1 text-xs md:text-sm">
                                        {{ $followed->followed->username }}
                                    </p>
                                </div>
                            </div>
                        </a>
                            
                        @endforeach
                    @else
                        <p class="text-lg font-semibold text-fuchsia-950 ">
                            {{ $author->fullname }} has no followers yet.
                        </p>
                        
                    @endunless
                </div>
            </div>
        </div>
    </div>
</div>