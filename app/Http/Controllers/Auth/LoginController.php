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
            return redirect()->intended('/');
        }

        return Auth::flash()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->withInput($request->only('email'));;
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}