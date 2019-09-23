<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\Topic;
use App\Comment;
use App\User;
use App\StatBlock;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		
		$statWreel = StatBlock::allStats();
        return view('home', ['stats' => $statWreel]);
		
    }

    public function account()
    {
		$statWreel = StatBlock::allStats();
        return view('account', ['stats' => $statWreel] );
    }
}
