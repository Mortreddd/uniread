<?php

namespace App\Http\Controllers\Auth;
use App\Mail\VerifyEmailNotification;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function show()
    {
        return view('layouts.auth.register');
    }
    public function store(CreateAuthorRequest $request)
    {
        $author = Author::create($request->validated());
        Author::find($author->id)->update(['last_login' => now(), 'status' => 'active']);
        $request->session()->regenerate();
        Auth::login($author);
        return redirect()->route('home')->with(['success' => 'Welcome '.$author->username]);
    
        
        // return view('layouts.auth.verify-email-token', compact('author'));
    }


    public function send(Request $request)
    {
        $token = Str::random(60);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->input('email'),
            'token' => $token
        ]);
        $author = [];
        // Mail::to($author->email)->send(new VerifyEmailNotification($author, $token));
    }

}