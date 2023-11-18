<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookMonitorController extends Controller
{
    public function index()
    {
        return view('layouts.admin.books');
    }
}