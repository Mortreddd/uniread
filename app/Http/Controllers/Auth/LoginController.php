<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function show()
    {
        return view('layouts.login');
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            "email" => 'required|email|string',
            'password' => 'required|string'
        ]);


        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return to_route('home')->with('success', "Welcome back, ".Auth::user()->username);
        }

        return redirect()->back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
            'email' => 'Email must be unique',
        ])->withInput($request->only('email'));
    }


}