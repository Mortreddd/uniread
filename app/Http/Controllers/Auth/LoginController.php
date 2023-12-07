<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAuthorRequest;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LoginController extends Controller
{
    public function show()
    {
        return view('layouts.auth.login');
    }

    public function process(LoginAuthorRequest $request)
    {
        
        $isRembembered = $request->has('remember');
        $isAuthenticated = Auth::attempt($request->validated(), $isRembembered);
        if($isAuthenticated){
            $author = Auth::user();
            Author::find(Auth::id())->update(['last_login' => now(), 'status' => 'active']);
            $request->session()->regenerate();

            switch($author->role){
                case 'admin':
                    return to_route('admin.index')->with('success', "Welcome back, ".$author->username);
                case 'author':
                    return to_route('home')->with('success', "Welcome back, ".$author->username); 
                default:
                    throw new HttpException(403, "You are not allowed to access this page");     
            }
        }

        return redirect()->back()->withErrors($request->messages());

        
    }

    


}