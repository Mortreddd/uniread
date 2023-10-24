<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
            "password" => "required|confirmed|min:8",
        ]);

        $author = Author::create($validated);
        if(!$author)
        {
            return redirect()->back()->withErrors(['error' => 'Cannot use this credentials']);
        }

        Auth::login($author);
        return redirect()->route('/');
    }
}