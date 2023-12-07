@extends('index')



@section('title', 'Settings')

@section('content')
    <main class="container mx-auto">
        @include('partials.nav')
            <section class="flex flex-col items-center w-full h-fit">
                <div class="flex justify-start w-full gap-10 px-10 bg-white">
                    <button class="py-4 mr-3 font-sans text-2xl border-solid tab-button active" data-tab="#profile">Profile and Account</button>
                    <button class="py-4 mr-3 font-sans text-2xl border-solid tab-button" data-tab="#notifications">Notifications</button>
                </div>
                <div class="flex justify-center w-full bg-gray-200  min-h-[60vh]">
                    <div class="flex flex-col items-center w-full min-h-full px-4 my-5 tab-content md:px-20" id="profile">
                        <div class="w-full my-2">
                            <h3 class="font-sans text-xl text-left text-black">Modify your privacy and account information</h3>
                        </div>
                        <section class="flex flex-col items-center w-full px-10 py-5 border-2 border-solid rounded-lg border-fuchsia-950 bg-fuchsia-100">
                            <div class="flex w-full my-1">
                                <div class="flex justify-start w-full py-3 items-cente">
                                    <h1 class="inline-block mr-3 font-sans text-xl text-black">Full Name: </h1>
                                    <p class="inline-block mr-3 font-sans text-xl text-black">{{ auth()->user()->fullname }}</p>
                                    @include('layouts.profile.edit.fullname')
                                </div>
                                <div class="flex justify-start w-full py-3 items-cente">
                                    <h1 class="inline-block mr-3 font-sans text-xl text-black">Username: </h1>
                                    <p class="inline-block mr-3 font-sans text-xl text-black">{{ auth()->user()->username }}</p>
                                    @include('layouts.profile.edit.username')
                                </div>
                            </div>
                            <div class="flex w-full my-1">
                                <div class="flex justify-start w-full py-3 items-cente">
                                    <h1 class="inline-block mr-3 font-sans text-xl text-black">Email: </h1>
                                    <p class="inline-block mr-3 font-sans text-xl text-black">{{ auth()->user()->email }}</p>
                                </div>
                                <div class="flex justify-start w-full py-3 items-cente">
                                    <h1 class="inline-block mr-3 font-sans text-xl text-black">Password: </h1>
                                    <p id="password" class="inline-block mr-3 font-sans text-xl text-black">************</p>
                                    @include('layouts.profile.edit.password')
                                </div>
                            </div>
                            
                            
                        </section>
                    </div>
                    <div class="flex flex-col items-center hidden w-full h-full min-h-full px-4 my-5 tab-content md:px-20 md:w-1/2" id="notifications">
                        
                    </div>
                </div>
            </section>
            @error('email')
            <div id="toast-danger" class="fixed bottom-0 right-0 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="text-sm font-normal ms-3">{{ $message }}</div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 disabled:bg-fuchsia-950 disabled:text-gray-500 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            @enderror

            @if(Session::has('success'))
                <x-toast :message="Session::get('success')"></x-toast>
            @endif
        @include('partials.footer')
    </main>

    <script>
        
    </script>
@endsection