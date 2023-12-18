<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Message;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::with(['sender', 'receiver'])->where('receiverAuthorID', $request->user()->id)->orderBy('updated_at')->get();
        
        $author = $messages->first()->sender;
        $hasConversation = Message::where('receiverAuthorID', $author->id)->where('senderAuthorID', $request->user()->id )->exists();
        $hasMessages = Message::where('receiverAuthorID', $request->user()->id)->exists();
        $conversations = Message::with(['sender', 'receiver'])
                        ->where(function ($query) use ($author, $request) {
                            $query->where('senderAuthorID', $author->id)
                                ->where('receiverAuthorID', $request->user()->id);
                        })
                        ->orWhere(function ($query) use ($author, $request) {
                            $query->where('senderAuthorID', $request->user()->id)
                                ->where('receiverAuthorID', $author->id);
                        })
                        ->orderBy('created_at')
                        ->get();

        // return Json::encode($conversations);
        return view('layouts.author.messages', ['messages' => $messages, 'conversations' => $conversations], compact('author', 'hasMessages', 'hasConversation'));
    }


    public function show(Request $request, $username)
    {
        
        
        $author = Author::where('username', $username)->first();
        $hasConversation = Message::where('receiverAuthorID', $author->id)->where('senderAuthorID', $request->user()->id )->exists();
        $hasMessages = Message::where('receiverAuthorID', $request->user()->id)->exists();
        $conversations = Message::with(['sender', 'receiver'])
                    ->where(function ($query) use ($author, $request) {
                        $query->where('senderAuthorID', $author->id)
                            ->where('receiverAuthorID', $request->user()->id);
                    })
                    ->orWhere(function ($query) use ($author, $request) {
                        $query->where('senderAuthorID', $request->user()->id)
                            ->where('receiverAuthorID', $author->id);
                    })
                    ->orderBy('created_at')
                    ->get();
        $messages = Message::with(['sender', 'receiver'])->where('receiverAuthorID', $request->user()->id)->groupBy('senderAuthorID')->orderByDesc('created_at')->get();
        // return Json::encode($conversations);
        // return dd($messages);
            
        return view('layouts.author.messages', ['conversations' => $conversations, 'messages' => $messages], compact( 'author', 'hasConversation', 'hasMessages'));
    }


    public function store(Request $request)
    {
        Message::create([
            'senderAuthorID' => $request->input('senderAuthorID'),
            'receiverAuthorID' => $request->input('receiverAuthorID'),
            'content' => $request->input('content'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // return Json::encode($request->all());
        return back();
    }
}