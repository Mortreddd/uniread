@extends('index') 

@section('title', 'Verify Email') 


@section('content')
    <div class="w-full py-5 bg-fuchsia-900">
        <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
            <div
                class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto"
            >
                <x-logo></x-logo>
            </div>
        </nav>
    </div>
    <main class="container box-border flex w-full h-[80vh]">
        <div
            class="w-0 h-full bg-no-repeat bg-cover md:w-screen"
            style="background-image: url('{{ asset('backgrounds/Login.webp') }}');"
        ></div>
        <div class="flex items-center justify-center w-full h-full p-10">
            <div
                class="flex flex-col justify-center p-2 py-10 border-2 border-gray-300 border-solid rounded-lg shadow-lg md:w-9/12 h-fit md:py-12 md:px-5"
            >
                <h1
                    class="font-serif text-4xl font-medium text-center text-bold text-fuchsia-900"
                >
                    Token Confirmation
                </h1>

                <form
                    action="{{ route('verify.token', ['email' => $email]) }}"
                    class="flex flex-col justify-center p-3 mx-2 my-2"
                    method="POST"
                >
                    @csrf 
                    @error('token')
                    <div
                        class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert"
                    >
                        <span class="font-medium">{{ $message }}</span>
                    </div>
                    @enderror
                    <div class="mb-3">
                        <div class="mb-3">
                            <h3
                                class="mb-3 font-serif text-lg text-fuchsia-900"
                            >
                                The verification code has been sent to your email
                            </h3>
                            <div
                                class="flex items-center mb-4 border-2 border-gray-500 border-solid rounded-md"
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
                                        d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"
                                    />
                                </svg>
                                <input
                                    type="text"
                                    name="password"
                                    placeholder="Enter verification token"
                                    class="w-full h-auto bg-transparent border-none rounded-md focus:border-none focus:ring-0"
                                />
                            </div>
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="py-2 mb-4 text-2xl text-white rounded-lg bg-fuchsia-800 hover:bg-fuchsia-900"
                    >
                        Verify
                    </button>
                </form>
            </div>
        </div>
    </main>
    {{-- <script>
        window.addEventListener('beforeunload', function(event) {
        // Make an AJAX request to delete the token when the user leaves the page
        // This code will be executed when the user closes the browser or navigates away
        // You'll need to define an appropriate URL endpoint to handle this deletion
        // Example using jQuery AJAX:
        $.ajax({
            type: 'POST',
            url: '/delete-token',
            data: {
                email: 'user@example.com', // Provide the user's email here
                token: 'user_token' // Provide the user's token here
            },
            success: function(response) {
                console.log('Token deleted successfully.');
            },
            error: function(xhr, status, error) {
                console.error('Failed to delete token:', error);
            }
        });
    });
    </script> --}}
@endsection
