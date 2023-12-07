<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class VerifyTokenController extends Controller
{
    

    public function verify(Request $request)
    {
        $token = $request->input('token');
        $email = $request->input('email');
        $isTokenValid = DB::table('password_reset_tokens')->where('email', $email)->where('token', $token)->exists();
        if($email == null)
        {   
            return back();
        }
        else if(!$isTokenValid)
        {
            return redirect()->back()->withErrors('token', 'Invalid token');
        }

        DB::table('password_reset_tokens')->where('email', $email)->delete();
        return view('layouts.auth.reset-password', ['email' => $email]);
    }
}