<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('table', ['authors' => Author::all()]);
    }

    public function show($id)
    {
        return view('table', ['authors' => Author::findOrFail($id)]);
    }
}