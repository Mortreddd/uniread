<div id="profile-image-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t bg-fuchsia-950 md:p-5 dark:border-gray-600">
                <button type="button" class="end-2.5 text-white bg-transparent hover:bg-fuchsia-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="profile-image-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                {{-- Change the route for editing the fullname --}}
                <form class="space-y-4" action="{{ route('update.profile-image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h3 class="text-xl font-semibold text-fuchsia-950 ">
                        Update Image
                    </h3>
                    <div>
                        <div class="w-full flex flex-col items-center">
                            <div class="my-2">
                                <img id="profile-image" src="{{ asset('storage/profiles/default-profile.jpg') }}" alt="" class="float-right object-cover rounded-full mr-4 border-4 w-52 h-52 border-fuchsia-950" />
                            </div>
                            <div class="mt-2">
                                <input class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="image" accept="jpeg, jpg, png" aria-describedby="file_input_help" id="file_input" type="file" onchange="displayImage(this)">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-fuchsia-900 hover:bg-fuchsia-950 focus:ring-4 focus:outline-none focus:ring-fuchsia-950 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>