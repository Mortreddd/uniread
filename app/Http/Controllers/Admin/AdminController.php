<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return to_route('admin.dashboard');
    }
}