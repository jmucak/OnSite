<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Story;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stories = Story::where('user_id', auth()->id())->get();

        return view('home', compact('stories'));
    }

    public function friends() {
        $friends = Auth::user()->friends();

        return view('friends', compact('friends'));
    }
}
