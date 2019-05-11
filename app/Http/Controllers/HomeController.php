<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Story;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stories = Story::where('user_id', auth()->id())->get();

        if(auth()->user()) {
            return view('home', compact('stories'));
        } 

        return view('welcome');
    }

    public function friends() {
        $friends = auth()->user()->friends();

        return view('friends', compact('friends'));
    }
}
