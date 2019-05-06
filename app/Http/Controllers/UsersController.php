<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('roles:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get me users
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        request()->user()->authorizeRoles('admin');

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = new User();
        $user->name = request('name');
        $user->slug = str_slug($user->name);
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->gender = request('gender');
        if($user->gender) {
            $avatar = 'public/defaults/avatars/male.png';
        } else {
            $avatar = 'public/defaults/avatars/female.png';
        }
        $user->avatar = $avatar;
        $user->save();
        $user->roles()->attach(Role::where('role', 'user')->first());

        return redirect()->route('users.index')->with('User created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = request('name');
        $user->slug = str_slug($user->name);
        $user->email = request('email');
        if(!empty(request('password'))){
            $user->password = Hash::make(request('password'));
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->profile->delete();
        $user->roles()->detach(Role::where('role', 'user')->first());
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
