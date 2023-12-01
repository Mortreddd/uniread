<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Mail\MailVerificationForgotPassword;
use App\Models\Author;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MailVerficationForgotPasswordController extends Controller
{
    public function send(Request $request)
    {
        $author = Author::where('email', $request->only('email'))->first();

        if (!$author) {
            return redirect()->back()->with('token', 'Email does not exist');
        }
        $token = Str::random(60);
        DB::table('password_reset_tokens')->insert([
            'email' => $author->email,
            'token' => $token,
            'created_at' => now()
        ]);
        Mail::to($author->email)->send(new MailVerificationForgotPassword($author, $token));
        return redirect()->back()->with('success', 'Email has been sent');
    }
} 