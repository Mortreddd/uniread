<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        return view('layouts.login');
    }
    public function login(Request $request)
    {
       $validated = $request->validate([
        "email"=> ["required","email"],
        'password' => 'required'
       ]);
    }
}