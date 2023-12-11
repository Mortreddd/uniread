@extends('index')



@section('title', 'Messages')



@section('content')
    <x-nav></x-nav> 
    <main class="container mx-auto">
        <div class="mx-auto flex h-[80vh] w-full">
            <div class="md:py-3 p-1 w-[25vw] md:w-[30vw] h-full overflow-y-hidden border-gray-200 bg-white">
                
                <h1 class="font-sans text-2xl font-semibold text-center text-fuchsia-950">Inbox</h1>
                <div class="flex flex-wrap w-full max-h-full py-6 overflow-y-auto">
                
                    @unless($messages->isEmpty() || $messages === null)
                        @foreach($messages as $message)

                            <a href="{{ route('messages.open.inbox', ['username' => $message->sender->username]) }}" class="flex items-center justify-center w-full h-20 mx-1 bg-gray-100 border-2 border-gray-200 border-solid rounded-lg md:justify-normal hover:cursor-pointer md:p-2 hover:bg-gray-300 md:h-24">

                                <img
                                    src="{{ asset($message->sender->image) }}"
                                    alt=""
                                    class="w-16 h-16 border-2 border-gray-500 rounded-full md:mr-2 md:w-20 md:h-20"
                                />
                                <div class="items-center justify-between hidden w-full flex-nowrap md:flex">
                                    <div class="flex flex-col w-full h-full justify-evenly">
                                        <h1 class="font-sans text-lg font-semibold text-black">
                                            {{ $message->sender->fullname }}
                                        </h1>
                                        <p class="w-full font-sans text-gray-400 text-ellipsis line-clamp-1 text-md">
                                            {{ $message->content }}
                                        </p>
                                    </div>
                                    <p class="font-sans font-semibold text-right text-black w-28 text-md">
                                        {{  \Carbon\Carbon::parse($message->created_at)->format('g:i A')  }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <p class="my-4 font-sans text-5xl text-center text-black">You have no messages yet.</p>
                    @endunless
                </div>
            </div>
            <section class="w-[75vw] md:w-[70vw] flex flex-col justify-between h-full bg-fuchsia-900">
                
                @unless($conversations->isEmpty() || $conversations === null)
                    <div class="flex items-center w-full p-3 bg-white md:p-5 h-fit">
                        <h1 class="font-sans text-lg font-semibold text-fuchsia-900 md:text-3xl">{{ $conversations->first()->sender->fullname }}</h1>
                    </div>
                        <div class="flex flex-wrap items-end w-full h-full px-1 overflow-y-scroll md:px-3">
                            @foreach ($conversations as $conversation)
                                <div class="flex flex-col justify-end w-full">
                                    @if($conversation->sender->id !== Auth::id())
                                        <div class="flex justify-start w-full my-2 h-fit">
                                            <div class="flex items-end max-w-xs bg-transparent md:max-w-lg h-fit">
                                                <img
                                                    src="{{ asset($message->sender->image) }}"
                                                    alt=""
                                                    class="w-10 h-10 mr-1 border-2 border-gray-500 rounded-full md:mr-4 md:w-16 md:h-16"
                                                />
                                                <p class="p-2 font-sans text-sm text-black bg-gray-200 border-2 border-gray-300 rounded-lg md:p-4 md:text-lg">{{ $conversation->content }}</p>
                                            </div>
                                        </div>
                                    @else 
                                        <div class="flex justify-end w-full my-2 h-fit">
                                            <div class="flex items-end max-w-xs bg-transparent md:max-w-lg h-fit">
                                                
                                                <p class="p-2 font-sans text-sm text-black bg-gray-200 border-2 border-gray-300 rounded-lg md:p-4 md:text-lg">{{ $conversation->content }}</p>
                                                <img
                                                    src="{{ asset($message->receiver->image) }}"
                                                    alt=""
                                                    class="w-10 h-10 ml-2 border-2 border-gray-500 rounded-full md:ml-4 md:w-16 md:h-16"
                                                />
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="flex items-end justify-center w-full h-full">
                            <p class="font-sans text-gray-300 text 3xl md:text-xl">Say Hi to start the conversation</p>
                        </div>
                    @endunless
                <form action="{{ route("messages.create") }}" method="post" class="w-full px-4 py-2 bg-white md:px-10 md:py-5">
                    @csrf
                    <div class="flex bg-transparent border-2 border-gray-200 border-solid rounded-full outline-none">
                        <input type="text" name="content" class="w-full bg-transparent border-none rounded-full outline-none focus:border-fuchsia-950 focus:ring-0 focus:outline-none"  placeholder="Write something..." required>
                        <input type="hidden" name="receiverAuthorID" value="{{ $author->id }}">
                        <input type="hidden" name="senderAuthorID" value="{{ Auth::id() }}">
                        <button type="submit" class="flex flex-row items-center p-2 bg-transparent rounded-full hover:bg-gray-200 text-fuchsia-900 hover:text-fuchsia-950">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </main>

@endsection 