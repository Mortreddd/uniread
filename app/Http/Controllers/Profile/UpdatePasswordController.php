<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\EditUsernameRequest;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function update(EditUsernameRequest $request)
    {
        $authorID = Auth::id();
        if(Author::find($authorID)->update(['password' => Hash::make($request->input('password'))]))
        {
            return back()->with(['success' => 'Password updated successfully']);
        }

        return back()->withErrors($request->messagese());
    }
}