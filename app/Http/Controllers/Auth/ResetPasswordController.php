<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index(Request $request)
    {
        return view('layouts.auth.reset-password', ['email' => $request->email]);
    }

    public function update(ResetPasswordRequest $request)
    {
        $author = Author::where('email', $request->email)->first();

        $author->password = Hash::make($request->password);
        $author->save();
        
        return redirect()->route('login');
    }

    public function verify(Request $request)
    {
        $isVerified = DB::table('password_reset_tokens')->where('email', $request->only('email'))->where('token', $request->only('token'))->exists();
        if (!$isVerified) {
            return redirect()->back()->with('token', 'Invalid token');
        }

        DB::table('password_reset_tokens')->where('email', $request->only('email'))->where('token', $request->only('token'))->delete();
        return view('layouts.auth.reset-password', ['email' => $request->email]);
        
    }
}