<button type="button" data-modal-target="password-modal" data-modal-toggle="password-modal" class="px-3 font-sans text-sm font-medium bg-transparent rounded-xl text-fuchsia-900 hover:text-fuchsia-950 hover:bg-gray-400">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
    </svg>
</button>

<div id="password-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t bg-fuchsia-950 md:p-5 dark:border-gray-600">
                <button type="button" class="end-2.5 text-white bg-transparent hover:bg-fuchsia-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="password-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                {{-- Change the route for editing the username --}}
                <form class="space-y-4" action="{{ route('update.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h3 class="text-xl font-semibold text-fuchsia-950 ">
                        New Password
                    </h3>
                    <div>
                        <div class="mb-3">
                            <div
                                class="flex items-center border-2 border-gray-500 border-solid rounded-md"
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="m-2 w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                              
                                <input
                                    type="password"
                                    name="password"
                                    placeholder="Enter Password"
                                    class="w-full h-auto bg-transparent border-none rounded-md focus:border-none focus:ring-0"
                                />
                            </div>
                        </div>
                        <h3 class="mb-3 text-xl font-semibold text-fuchsia-950">
                            Confirm Password
                         </h3>
                        <div>
                            <div class="mb-3">
                                <div
                                    class="flex items-center border-2 border-gray-500 border-solid rounded-md"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="m-2 w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                                  
                                    <input
                                        type="password"
                                        name="password_confirmation"
                                        placeholder="Enter Password"
                                        class="w-full h-auto bg-transparent border-none rounded-md focus:border-none focus:ring-0"
                                    />
                                </div>
                            </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-fuchsia-900 hover:bg-fuchsia-950 focus:ring-4 focus:outline-none focus:ring-fuchsia-950 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>