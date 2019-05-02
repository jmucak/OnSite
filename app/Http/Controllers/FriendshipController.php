<?php

namespace App\Http\Controllers;

use App\Friendship;
use Auth;
use Illuminate\Http\Request;

class FriendshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check($id)
    {
        if(Auth::user()->is_friends_with($id) === 1) {

            return ['status' => 'friends'];
        }

        if(Auth::user()->has_pending_friend_request_from($id)) {

            return ['status' => 'pending'];
        }

        if(Auth::user()->has_pending_friend_request_sent_to($id)) {

            return ['status' => 'waiting'];
        }

        return ['status' => 0];
    }

    public function add_friend($id) {

        // sending notifications to user
       $res = Auth::user()->add_friend($id);

       return $res;
    }

    public function accept_friend($id) {

        return Auth::user()->accept_friend($id);
    }
}
