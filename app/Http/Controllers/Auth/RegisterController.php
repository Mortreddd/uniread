<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            "username" => ["required", 'min:4'],
            "email"=> ["required","email"],
            "password"=> ["required"],
        ]);


        
    }
}