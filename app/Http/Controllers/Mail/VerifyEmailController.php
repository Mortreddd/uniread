<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Mail\MailVerificationForgotPassword;
use App\Models\Author;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class VerifyEmailController extends Controller
{
    public function verify(Request $request)
    {
        $email = $request->input('email');

        if($email == null)
        {
            return back();
        }

        $isValidEmail = Author::where('email', $email)->exists();
        if( !$isValidEmail )
        {
            return redirect()->back()->with('token', 'Email not found');
        }
        
        $token = Str::random(60);
        $author = Author::where('email', $email)->first();
        DB::table('password_reset_tokens')->insert([
            'email' => $request->input('email'),
            'token' => $token
        ]);

        Mail::to($author->email)->send(new MailVerificationForgotPassword($author, $token));

        // return Json::encode($author);
        return view('layouts.auth.verify-token', ['email' => $author->email]);

    }

}