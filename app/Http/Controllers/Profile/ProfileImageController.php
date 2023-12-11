<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Author;
use DeepCopy\Filter\ReplaceFilter;
use Exception;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Add this import statement
class ProfileImageController extends Controller
{
    public function update(Request $request)
    {
        $authorID = $request->user()->id;

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        
        $filename = time() . '_' . str_replace(' ', '_', $request->file('image')->getClientOriginalName());
        $path = 'storage/profiles/'.$filename;
        $storePath = 'public/profiles/'.$filename;

        $request->file('image')->storeAs($storePath); 
        // return Json::encode($authorID);

        Author::find($authorID)->update(['image' => $path]); 

        return back();
    }
}