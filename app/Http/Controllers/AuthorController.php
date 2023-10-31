<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    
    

    public function create()
    {
        return view();
    }

    public function follower()
    {
        
    }

    // public function libraries()
    // {
    //     return view('layouts.profile.library');
    // }
}