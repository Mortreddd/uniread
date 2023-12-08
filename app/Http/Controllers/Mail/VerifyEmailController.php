<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Mail\MailVerificationForgotPassword;
use App\Models\Author;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
        
        try{
            Mail::to($author->email)->send(new MailVerificationForgotPassword($author, $token));
        }
        catch(Exception $e){
            throw new HttpException(    404, 'Something went wrong');
        }
        DB::table('password_reset_tokens')->insert([
            'email' => $request->input('email'),
            'token' => $token
        ]);
        // return Json::encode($author);
        return view('layouts.auth.verify-token', ['email' => $author->email]);

    }

}