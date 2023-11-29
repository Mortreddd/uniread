<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAuthorRequest;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function show()
    {
        return view('layouts.auth.register');
    }
    public function store(CreateAuthorRequest $request)
    {
        $author = Author::create($request->validated());
        if(!$author)
        {
            return redirect()->back()->withErrors($request->messages());
        }

        Auth::login($author);

        return to_route('home')->with('success', "Welcome, ".Auth::user()->username);
    }


}