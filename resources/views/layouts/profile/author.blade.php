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
        <x-nav></x-nav>
        <main class="container box-border flex w-full h-full">
            <section
                class="flex justify-center items-end h-[60vh] w-screen bg-cover bg-no-repeat bg-center"
                style="background-image: url({{
                    asset('backgrounds/Profile.webp')
                }})"
            >
                <div class="flex flex-col items-center p-3 m-4 bg-transparent">
                    <img src="{{ asset('profiles/gojo.jpg') }}" alt="" class="w-48 h-48 mb-3 border-4 border-gray-500 rounded-full ">
                    <h3 class="mb-3 font-serif text-4xl text-center text-gray-200 font-weight text-bold">{{'@'}}{{ auth()->user()->username }}</h3>
                    <div class="flex flex-row justify-between w-auto">
                        <div class="flex flex-col items-center mx-3">
                            <a
                                class="flex items-center justify-between w-full font-sans text-2xl text-gray-200 border-0 cursor-pointer font-weight text-bold"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="mr-2 w-7 h-7"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"
                                    />
                                </svg>

                                Works
                            </a>
                            <h2
                                class="font-sans text-2xl text-gray-200 font-weight text-bold"
                            >
                                {{ $workCount }}
                            </h2>
                        </div>

                        <div class="flex flex-col items-center mx-3">
                            <a
                                class="flex items-center justify-between w-full font-sans text-2xl text-gray-200 border-0 cursor-pointer font-weight text-bold"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="mr-2 w-7 h-7"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"
                                    />
                                </svg>

                                Followers
                            </a>
                            <h2
                                class="font-sans text-2xl text-gray-200 font-weight text-bold"
                            >
                                {{ $followerCount }}
                            </h2>
                        </div>

                        <div class="flex flex-col items-center mx-3">
                            <a
                                class="flex items-center justify-between w-full font-sans text-2xl text-gray-200 border-0 cursor-pointer font-weight text-bold"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="mr-2 w-7 h-7"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"
                                    />
                                </svg>

                                Following
                            </a>
                            <h2
                                class="font-sans text-2xl text-gray-200 font-weight text-bold"
                            >
                                {{ $followedCount }}
                            </h2>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>
