<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class AuthorMonitorController extends Controller
{
    public function index()
    {
        $activeAuthors = Author::groupBy('last_login')
                        ->where('last_login', '>=', now()->subMonths(3))
                        ->get(['last_login'])
                        ->count();

        $authors = Author::all();
        // return Json::encode($activeAuthors);
        return view('layouts.admin.authors',compact("activeAuthors", 'authors'));
    }
}