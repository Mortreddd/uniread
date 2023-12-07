<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\EditPasswordRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UpdateUsernameController extends Controller
{
    public function update(EditPasswordRequest $request)
    {
        $authorID = Auth::id();
        
        if(Author::find($authorID)->update(['username' => $request->input('username')]))
        {
            return back()->with(['success' => "Username updated Successfully"]);
        }
        return back()->withError($request->messages());
    }
}