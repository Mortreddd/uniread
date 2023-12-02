<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VerifyResetPasswordController extends Controller
{

    public function update(ResetPasswordRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
       
        if($request->input('email') == null)
        {
            return back();
        }
        
        $author = Author::where('email', $email)->update([
            'password' => Hash::make($password),
            'updated_at' => now()
        ]);
        if(!$author)
        {
            return redirect()->back()->with('token', 'Invalid token');
        }

        return redirect()->route('login')->with('success', 'Password has been updated');
    }
}