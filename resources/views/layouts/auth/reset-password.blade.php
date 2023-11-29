@extends('index')

@section('title', 'Update Password')

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
        <main class="container box-border flex w-full h-[80vh]">
            <div class="flex items-center justify-center w-full p-2">
                <div
                    class="flex flex-col justify-center p-5 border-2 border-gray-300 border-solid rounded-lg shadow-lg w-fit min-h-3/4"
                >
                    <h1
                        class="font-serif text-4xl font-semibold text-center text-bold text-fuchsia-900"
                    >
                        Reset Password
                    </h1>
                    <form
                        action="{{ route('update.password') }}"
                        class="flex flex-col justify-center px-10"
                        method="POST"
                    >
                    @csrf
                        <div class="mb-3">
                            @error('password')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                            <label
                                for=""
                                class="text-lg text-fuchsia-900 font serif"
                                >New Password</label
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
                                    placeholder="Enter your new password"
                                    class="w-full h-auto bg-transparent border-none rounded-md focus:border-none focus:ring-0"
                                />
                            </div>
                        </div>
                        <div class="mb-3">
                            @error('password_confirmation')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                            <label
                                for=""
                                class="text-lg text-fuchsia-900 font serif"
                                >Confirm Password</label
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
                                    name="password_confirmation"
                                    id=""
                                    placeholder="Password confirmation"
                                    class="w-full h-auto bg-transparent border-none rounded-md focus:border-none focus:ring-0"
                                />
                            </div>
                        </div>
                        <button
                            type="submit"
                            class="py-2 my-5 text-lg text-white rounded-lg bg-fuchsia-800 hover:bg-fuchsia-900"
                        >
                            Confirm
                        </button>
                    </form>
                </div>
            </div>
        </main>
@endsection