@extends('index')


@section('title', 'Login')

@section('content')
    <div class="w-full py-5 bg-fuchsia-900">
        <nav
            class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700"
        >
            <div
                class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto"
            >
                <x-logo></x-logo>
            </div>
        </nav>
    </div>
    <main
        class="container box-border flex w-full h-[80vh]"
    >
        <div class="flex items-center justify-center w-full p-2">
            <div
                class="flex flex-col justify-center p-2 border-2 border-gray-300 border-solid rounded-lg shadow-lg md:p-5"
            >
                <h1
                    class="font-serif text-4xl text-center text-bold text-fuchsia-900"
                >
                    Login
                </h1>
                
                <form
                    action="/login/process"
                    class="flex flex-col justify-center p-3 mx-2 my-2"
                    method="POST"
                >
                @csrf
                @error('email')
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>
                @enderror
                    <div class="mb-3">
                        <label
                            for=""
                            class="text-2xl text-fuchsia-900 font serif"
                            >Email Address</label
                        >
                        <div
                            class="flex items-center border-2 border-gray-500 border-solid rounded-md"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="m-2 w-7 h-7"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                                />
                            </svg>

                            <input
                                type="email"
                                name="email"
                                placeholder="Enter Email"
                                class="w-full h-auto bg-transparent border-none rounded-md focus:border-none focus:ring-0"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label
                            for=""
                            class="text-2xl text-fuchsia-900 font serif"
                            >Password</label
                        >
                        <div
                            class="flex items-center border-2 border-gray-500 border-solid rounded-md"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="m-2 w-7 h-7"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"
                                />
                            </svg>

                            <input
                                type="password"
                                name="password"
                                placeholder="Enter Password"
                                class="w-full h-auto bg-transparent border-none rounded-md focus:border-none focus:ring-0"
                            />
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            
                        <input id="default-checkbox" type="checkbox" value="" name="remember" class="w-4 h-4 mr-1 bg-transparent border-2 border-solid rounded-md active:outline-fuchsia-950 text-fuchsia-900 border-fuchsia-900">
                        <label for="default-checkbox" class="font-sans text-sm font-medium text-fuchsia-900">Remember Me</label>
                        </div>
                        <button type="button" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="px-3 font-sans text-sm font-medium bg-transparent text-fuchsia-900 hover:text-fuchsia-950">Forgot Password?</button>
                    </div>
                    <button
                        type="submit"
                        class="py-2 mb-4 text-2xl text-white rounded-lg bg-fuchsia-800 hover:bg-fuchsia-900"
                    >
                        Login
                    </button>
                    <div class="flex justify-start">
                        
                    </div>
                    <p class="font-sans text-lg text-center text-gray-700">
                        Doesn't have an account?
                    </p>
                    <a
                        href="/register"
                        class="font-sans text-lg text-center text-red-400 hover:text-red-500 hover:cursor-pointer"
                        >Register here</a
                    >
                </form>
                
  
            </div>
        </div>
        <div
            class="w-0 h-full bg-no-repeat bg-cover md:w-screen"
            style="background-image: url('{{
                asset('storage/backgrounds/Login.webp')
            }}');"
        ></div>
        
    </main>

    <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full p-4">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t bg-fuchsia-950 md:p-5 dark:border-gray-600">
                    <button type="button" class="end-2.5 text-white bg-transparent hover:bg-fuchsia-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="{{ route('verify.email') }}" method="POST">
                        @csrf
                        <h3 class="text-xl font-semibold text-fuchsia-950 ">
                            Forgot Password
                         </h3>
                        <p class="text-gray-500">
                            Enter your UniRead email address that you used to register. 
                            We'll send you an email with your username and a link to reset your password.
                        </p>
                        <div>
                            <div class="mb-3">
                                <div
                                    class="flex items-center border-2 border-gray-500 border-solid rounded-md"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="m-2 w-7 h-7"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                                        />
                                    </svg>
        
                                    <input
                                        type="email"
                                        name="email"
                                        placeholder="Enter Email"
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
    @if(Session::has('token'))
    <div id="toast-danger" class="fixed bottom-0 right-0 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="text-sm font-normal ms-3">{{ Session::get('token')}}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 disabled:bg-fuchsia-950 disabled:text-gray-500 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif
    @if(Session::has('success'))
        <div id="toast-success" class="fixed bottom-0 right-0 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ Session::get('success')}}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif

@endsection