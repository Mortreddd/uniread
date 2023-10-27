<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function show()
    {
        return view('layouts.register');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            "username" => 'required|min:4',
            "email" => "required|email|unique:authors",
            "password" => "required|min:8",
        ]);
        
        $author = Author::create($validated);
        if(!$author)
        {
            return redirect()->back()->withErrors([
                'error' => 'Cannot use this credentials',
                'email' => 'Email must be unique',
                'password' => 'Password must be at least 8 characters long',
                'username' => 'Username must be at least 4 characters long'
            ]);
        }

        Auth::login($author);

        return to_route('home')->with('success', "Welcome, ".Auth::user()->username);
    }
}