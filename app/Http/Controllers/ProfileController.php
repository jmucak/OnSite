<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Story;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();
        $stories = Story::where([
            'user_id'=> $user->id,
            'published' => true
        ])->get();

        $friends = Auth::user()->friends();

        return view('profiles.index', compact('user', 'stories', 'friends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $info = Auth::user()->profile;
        
        return view('profiles.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $this->validate($request, [
            'about' => 'max:255'
        ]);

        // update auth user profile data
        Auth::user()->profile()->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'about' => $request->about
        ]);

        if($request->hasFile('avatar')) {
            Auth::user()->update([
                'avatar' => $request->avatar->store('public/avatars')
            ]);
        }

        // redirect back
        return redirect()->back()->with('success', 'Your profile has been updated!');
    }
}
