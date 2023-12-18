@extends('index')

@section('title', $username)


@section('content')
    <x-nav></x-nav>
    <main class="container box-border w-full h-full">
        <section
            class="flex justify-center items-end h-[60vh] bg-cover w-full bg-no-repeat bg-center"
            style="background-image: url({{
                asset('storage/backgrounds/Profile.webp')
            }})"
        >
            <div class="flex flex-col items-center p-3 m-4 bg-transparent">
                @if ($author->id === Auth::id())
                    <button data-modal-target="profile-image-modal" data-modal-toggle="profile-image-modal">
                        <img
                            src="{{ asset($author->image) }}"
                            alt=""
                            class="w-32 h-32 mb-3 border-4 border-gray-500 rounded-full md:w-48 md:h-48"
                        />
                    </button>
                    @include('layouts.profile.edit.profile-image')
                @else
                    <img
                        src="{{ asset($author->image) }}"
                        alt=""
                        class="w-32 h-32 mb-3 border-4 border-gray-500 rounded-full md:w-48 md:h-48"
                    />
                @endif
                <h3
                    class="mb-3 font-serif text-2xl text-center text-gray-200 md:text-4xl font-weight text-bold"
                >
                    {{ "@" }}{{ $username }}
                </h3>
                <div class="flex flex-row justify-between w-auto">
                    <div class="flex flex-col items-center mx-3">
                        <button
                            
                            class="flex items-center justify-between w-full font-sans text-xl text-gray-200 border-0 cursor-pointer md:text-2xl font-weight text-bold"
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
                        </button>
                        
                        <h2
                            class="font-sans text-xl text-gray-200 md:text-2xl font-weight text-bold"
                        >
                            {{ $workCount }}
                        </h2>
                    </div>

                    <div class="flex flex-col items-center mx-3">
                        <button
                            data-modal-target="followers-modal" data-modal-toggle="followers-modal"
                            class="flex items-center justify-between w-full font-sans text-xl text-gray-200 border-0 cursor-pointer md:text-2xl font-weight text-bold"
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
                        </button>
                        @include('layouts.profile.edit.followers', ['author' => $author, 'followers' => $followers])
                        <h2
                            class="font-sans text-xl text-gray-200 md:text-2xl font-weight text-bold"
                        >
                            {{ $followerCount }}
                        </h2>
                    </div>

                    <div class="flex flex-col items-center mx-3">
                        <button
                        data-modal-target="following-modal" data-modal-toggle="following-modal"
                            class="flex items-center justify-between w-full font-sans text-xl text-gray-200 border-0 cursor-pointer md:text-2xl font-weight text-bold"
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
                        </button>
                        @include('layouts.profile.edit.following', ['author' => $author, 'following' => $following])
                        <h2
                            class="font-sans text-xl text-gray-200 md:text-2xl font-weight text-bold"
                        >
                            {{ $followedCount }}
                        </h2>
                    </div>
                </div>
            </div>
        </section>

        <section
            class="flex justify-between mx-3 mb-4 border-b border-gray-200 md:mx-14 dark:border-gray-700"
        >
            <ul
                class="flex flex-wrap -mb-px text-lg font-medium text-center"
                id="profile-tab"
                data-tabs-toggle="#profile-tab-content"
                role="tablist"
            >
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block py-4 mr-3 font-sans text-2xl border-solid tab-button active"
                        id="works-tab"
                        data-tab="#works"
                        type="button"
                        role="tab"
                    >
                        Works
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block py-4 mr-3 font-sans text-2xl border-solid tab-button"
                        id="about-tab"
                        data-tab="#about"
                        type="button"
                        role="tab"
                    >
                        About
                    </button>
                </li>
            </ul>
            @if(auth()->user()->username !== $username)
            <ul class="flex">
                <li class="py-2 mr-4">
                    @if($isFollowing)
                        <form action="{{ route('follow.delete') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="flex px-4 py-2 font-sans text-2xl text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950"
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
                                <input type="hidden" name="followerAuthorID" value="{{ Auth::id() }}">
                                <input type="hidden" name="followedAuthorID" value="{{ $author->id }}">
                                Following
                            </button>
                        </form>
                    @else
                        <form action="{{ route('follow.add') }}" method="post">
                            @csrf
                            <button type="submit"
                                class="flex px-4 py-2 font-sans text-2xl text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950"
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
                                <input type="hidden" name="followedAuthorID" value="{{ $author->id }}">
                                <input type="hidden" name="followerAuthorID" value="{{ Auth::id() }}">
                                Follow
                            </button>
                        </form>
                    @endif

                </li>
                <li class="py-2">
                    <a
                        href="{{ route('messages.open.inbox', ['username' => $author->username]) }}"
                        class="flex px-4 py-2 font-sans text-2xl text-white rounded-lg bg-fuchsia-900 hover:bg-fuchsia-950"
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
                                d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"
                            />
                        </svg>
                        Message
                    </a>
                </li>
            </ul>
            @endif
        </section>
        <section id="profile-tab-content">
            <div
                class="p-4 rounded-lg tab-content bg-gray-50 dark:bg-gray-800"
                id="works"
            >
                <x-works :works="$works"></x-works>
            </div>
            <div
                class="hidden w-full p-4 rounded-lg tab-content bg-gray-50"
                id="about"
            >
                <section class="flex items-center justify-center w-full p-5 bg-gray-300 rounded-lg">
                    <h3 class="font-sans text-3xl font-semibold text-black">
                        "The more that you read, the more the things will know"
                    </h3>
                </section>
            </div>
        </section>
    </main>
    @include('partials.footer')
    <script>
        function displayImage(input) {
            const preview = document.getElementById("profile-image");
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };

                reader.onerror = function (e) {
                    preview.src = "{{ asset('storage/profiles/default-profile.jpg') }}";
                    preview.style.display = "block";
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "{{ asset('storage/profiles/default-profile.jpg') }}";
                preview.style.display = "block";
            }
        }
    </script>
@endsection
