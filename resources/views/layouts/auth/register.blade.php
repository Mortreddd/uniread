@extends('index')

@section('title', 'Register')

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
        <div class="flex items-center justify-center w-full h-full p-2 md:bg-center md:bg-no-repeat md:bg-cover md:w-screen" style="background-image: url('{{ asset('storage/backgrounds/auth.webp') }}');">
            <div
                class="flex flex-col justify-center w-full p-2 border-2 border-gray-300 border-solid rounded-lg shadow-lg md:p-5 md:w-2/5"
            >
                <h1
                    class="font-serif text-4xl text-center text-bold text-fuchsia-950"
                >
                    Register
                </h1>
                <form action="{{ route('register.verify') }}" method="post" class="flex flex-col w-full">
                    @csrf
                    <div class="flex items-end justify-around w-full gap-3 p-2">
                        <div class="w-1/2 my-1">
                            <label for="fullname" class="font-sans text-xl font-semibold text-fuchsia-950">Full Name</label>
                            @error('fullname')
                                <p class="w-full font-sans text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            <input type="text" value="{{ old('fullname') }}" name="fullname" id="fullname" autocomplete="off" placeholder="Enter your fullname" class="w-full p-2 border-2 border-solid rounded-lg border-fuchsia-900 focus:border-fuchsia-900 focus:ring-0 focus:outline-none" required>
                        </div>
                        <div class="w-1/2 my-1">
                            <label for="username" class="font-sans text-xl font-semibold text-fuchsia-950">Username</label>
                            @error('username')
                                <p class="w-full font-sans text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            <input type="text" name="username" value="{{ old('username') }}" id="username" autocomplete="off" placeholder="Enter your username" class="w-full p-2 border-2 border-solid rounded-lg border-fuchsia-900 focus:border-fuchsia-900 focus:ring-0 focus:outline-none" required>
                        </div>
                    </div>
                    <div class="flex items-end justify-around w-full gap-3 p-2">
                        <div class="w-1/2 my-1">
                            <label for="birthday" class="font-sans text-xl font-semibold text-fuchsia-950">Birthday</label>
                            @error('birthday')
                                <p class="w-full font-sans text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            <div class="relative">
                                <input datepicker type="text" name="birthday" id="birthday" class="w-full p-2 border-2 border-solid rounded-lg border-fuchsia-900 focus:border-fuchsia-900 focus:outline-none focus:ring-0" placeholder="Select date">
                            </div>
                        </div>
                        <div class="w-1/2 my-1">
                            <label for="gender" class="font-sans text-xl font-semibold text-fuchsia-950">Gender</label>
                            @error('gender')
                                <p class="w-full font-sans text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            <select id="gender" name="gender" class="bg-gray-50 border-2 border-solid border-fuchsia-900 text-fuchsia-950 text-sm rounded-lg focus:ring-fuchsia-950 focus:border-fuchsia-950 block w-full p-2.5">
                                <option value="Other" selected disabled>Other</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-end justify-around w-full gap-3 p-2">
                        <div class="w-1/2 my-1">
                            <label for="email" class="font-sans text-xl font-semibold text-fuchsia-950">Email</label>
                            @error('email')
                                <p class="w-full font-sans text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            <input type="email" name="email" id="email" placeholder="Enter your email" class="w-full p-2 border-2 border-solid rounded-lg border-fuchsia-900 focus:border-fuchsia-900 focus:ring-0 focus:outline-none" required>
                        </div>
                        <div class="w-1/2 my-1">
                            <label for="password" class="font-sans text-xl font-semibold text-fuchsia-950">Password</label>
                            @error('password')
                                <p class="w-full font-sans text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            <input type="password" name="password" id="password" placeholder="Enter your password" class="w-full p-2 border-2 border-solid rounded-lg border-fuchsia-900 focus:border-fuchsia-900 focus:ring-0 focus:outline-none" required>
                        </div>
                    </div>

                    <div class="flex justify-center w-full my-2">
                        <button type="submit" class="px-10 py-2 font-sans text-xl font-semibold text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950">Register</button>
                    </div>
                    <div class="flex flex-col items-center w-full my-2">
                        <h2 class="font-sans text-lg text-gray-400">Already have an account?</h2>
                        <a href="{{ route('login') }}" class="font-sans text-lg font-semibold text-orange-400 hover:text-orange-500">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
@endsection
