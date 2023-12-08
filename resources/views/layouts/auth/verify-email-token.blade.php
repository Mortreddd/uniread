@extends('index')

@section('title', 'Verify token')

@section('content')
    <main class="container mx-auto">
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

        <div class="flex justify-center items-center w-full h-[80vh] bg-no-repeat bg-center bg-cover md:w-screen" style=" background-image: url({{ asset('storage/backgrounds/auth.webp') }})">
            <form action="" method="post" class="flex flex-col items-center p-5 border-2 border-solid rounded-xl border-fuchsia-950 w-96 h-fit">
                @csrf
                <h1 class="my-2 font-sans text-3xl font-bold text-fuchsia-950">Verify your Email</h1>
                <p class="my-2 font-sans text-lg text-fuchsia-950">
                    Please enter the verification code that was sent to your email.
                </p>
                <div class="my-2">
                    <label for="verification-code" class="font-sans text-lg text-left text-fuchsia-950">Verification Code</label>
                    @error('verificationCode')
                        <p class="font-sans text-sm font-semibold text-left text-red-500">{{ $message }}</p>
                    @enderror
                    <input type="hidden" name="fullname" value="{{ $author->fullname }}">
                    <input type="hidden" name="username" value="{{ $author->username }}">
                    <input type="hidden" name="birthday" value="{{ $author->birthday }}">
                    <input type="hidden" name="gender" value="{{ $author->gender }}">
                    <input type="hidden" name="email" value="{{ $author->email }}">
                    <input type="hidden" name="password" value="{{ $author->password }}">
                    <input id="verification-code" type="text" name="verificationCode" placeholder="Verification code" id="" autocomplete="off" class="w-full p-2 border-2 border-solid rounded-lg border-fuchsia-900 focus:border-fuchsia-900 focus:ring-0 focus:outline-none">
                </div>
                <button type="submit" class="w-full py-2 mt-2 font-sans text-xl font-semibold text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950 hover:text-gray-300">Verify</button>
            </form>
        </div>
    </main>
@endsection