<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Votes;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $active = Author::groupBy('last_login')
                        ->where('last_login', '>', now()->subMonths(3))
                        ->get(['last_login']);
        $inactive = Author::groupBy('last_login')
                        ->where('last_login', '<=', now()->subMonths(3))
                        ->get(['last_login']);
        $totalVotes = Votes::sum('chapterID');
                        
        $activeAuthors = $active->count();
        $inActiveAuthors = $inactive->count();
        
        $activeAuthorsChart = DB::table('authors')
                                ->select(['id', DB::raw('MONTHNAME(last_login) as month'), DB::raw('COUNT(last_login) as total')])
                                ->where('last_login', '>', now()->subMonths(3))
                                ->groupBy( DB::raw('MONTHNAME(last_login)'))
                                ->orderBy(DB::raw('MONTHNAME(last_login)'))
                                ->get();

        $inActiveAuthorsChart = DB::table('authors')
                                ->select(['id', DB::raw('MONTHNAME(last_login) as month'), DB::raw('COUNT(last_login) as total')])
                                ->where('last_login', '<=', now()->subMonths(3))
                                ->groupBy( DB::raw('MONTHNAME(last_login)'))
                                ->orderBy(DB::raw('MONTHNAME(last_login)'))
                                ->get();

        // return Json::encode($totalVotes);
    
        // return Json::encode();
        return view('layouts.admin.dashboard',[
            'activeAuthors' => $activeAuthors,
            'inActiveAuthors' => $inActiveAuthors,
            'totalVotes' => $totalVotes,
            'activeAuthorsChart' => $activeAuthorsChart,
            'inActiveAuthorsChart' => $inActiveAuthorsChart
        ],
        compact('activeAuthors', 'inActiveAuthors', 'totalVotes'));
    }
}