<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="scroll-smooth scroll-p-40"
>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>UniRead</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
        <script src="../../js/app.js"></script>
    </head>
    <body>
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
                    @error('error')
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                        <div class="mb-3">
                            @error('email')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            @enderror
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
                                    id=""
                                    placeholder="Enter Email"
                                    class="w-full h-auto bg-transparent border-none rounded-md focus:border-none focus:ring-0"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            @error('password')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            @enderror
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
                                    id=""
                                    placeholder="Enter Password"
                                    class="w-full h-auto bg-transparent border-none rounded-md focus:border-none focus:ring-0"
                                />
                            </div>
                        </div>
                        <button
                            type="submit"
                            class="py-2 my-5 text-2xl text-white rounded-lg bg-fuchsia-800 hover:bg-fuchsia-900"
                        >
                            Login
                        </button>
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
                    asset('backgrounds/Login.svg')
                }}');"
            ></div>
        </main>
    </body>
</html>
