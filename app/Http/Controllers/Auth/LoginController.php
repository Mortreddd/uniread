<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAuthorRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function show()
    {
        return view('layouts.login');
    }

    public function process(LoginAuthorRequest $request)
    {
        

        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return to_route('home')->with('success', "Welcome back, ".Auth::user()->username);
        }

        return redirect()->back()->withErrors($request->messages());

        
    }

    


}