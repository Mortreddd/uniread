<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\Author;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class VerifiedResetPassword extends Controller
{
    public function show(Request $request, $id, $token)
    {
        $author = Author::findOrFail($id);
        if(!DB::table('password_reset_tokens')->where('token', $token)->where('email', $author->email)->exists())
        {
            return new HttpException(404, 'Author not Found');
        }

        return view('layouts.auth.reset-password');
    }

    public function reset(ResetPasswordRequest $request)
    {

    }

}