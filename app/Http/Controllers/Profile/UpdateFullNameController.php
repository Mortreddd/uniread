<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\EditFullNameRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateFullNameController extends Controller
{
    public function update(EditFullNameRequest $request)
    {
        $authorID = Auth::id();
        
        if(Author::find($authorID)->update(['fullname' => $request->input('fullname')]))
        {
            return back()->with(['success' => "Fullname updated successfully"]);
        }
        return back()->withError($request->messages());
    }
}