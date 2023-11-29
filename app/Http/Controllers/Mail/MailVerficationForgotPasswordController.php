<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Mail\MailVerificationForgotPassword;
use App\Models\Author;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class MailVerficationForgotPasswordController extends Controller
{

    public function show()
    {
        return view('layouts.auth.verify-token');
    }
    public function send(Request $request)
    {
        $author = Author::where('email', $request->only('email'))->first();

        if (!$author) {
            return redirect()->back()->with('token', 'Email does not exist');
        }
        $token = Str::random(16);
        DB::table('password_reset_tokens')->insert([
            'email' => $author->email,
            'token' => $token,
            'created_at' => now()
        ]);
        Mail::to($author->email)->send(new MailVerificationForgotPassword($author, $token));
        return view('layouts.auth.verify-token', ['email' => $author->email]);
    }

    public function verify(Request $request)
    {
        $isVerified = DB::table('password_reset_tokens')->where('email', $request->only('email'))->where('token', $request->only('token'))->exists();
        if (!$isVerified) {
            return redirect()->back()->with('token', 'Invalid token');
        }

        DB::table('password_reset_tokens')->where('email', $request->only('email'))->where('token', $request->only('token'))->delete();
        return view('layouts.auth.reset-password');
    }

    public function update(ResetPasswordRequest $request)
    {
        
        $author = Author::where('email', $request->only('password'))->first();

        if (!$author) {
            return redirect()->back()->with($request->messages());
        }
        
        $author->password = Hash::make($request->only('update.password'));
        return redirect()->route('login');
    }
} 