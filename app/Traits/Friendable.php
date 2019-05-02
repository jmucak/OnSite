<?php

namespace App\Traits;

use App\Friendship;

trait Friendable {

    public function add_friend($user_requested_id) {
        
        if($this->id === $user_requested_id) {
            
            return 0;
        }

        if($this->has_pending_friend_request_sent_to($user_requested_id) === 1) {

            return 'friend request already sent';
        }

        if($this->has_pending_friend_request_from($user_requested_id) === 1) {

            return $this->accept_friend($user_requested_id);
        }

        // create a friendship
        $friendship = Friendship::create([
            'user_requester' => $this->id,
            'user_requested' => $user_requested_id
        ]);


        // if friendship exists
        if($friendship) {

            return 1;
        } 
        
        return 0;
    }

    public function accept_friend($user_requested_id) {

        if($this->has_pending_friend_request_from($user_requested_id) === 0) {

            return 0;
        }

        if($this->is_friends_with($user_requested_id) === 1) {

            return 'already friends'; 
        }

        $friendship = Friendship::where('user_requester', $user_requested_id)->where('user_requested', $this->id)->first();

        if($friendship) {
            
            $friendship->update([
                'status' => 1
            ]);

            return 1;
        }

        return 0;
    }

    public function friends() {
        
        $friends = array();

        $f1 = Friendship::where('status', 1)->where('user_requester', $this->id)->get();

        foreach ($f1 as $friendship) {
            array_push($friends, \App\User::find($friendship->user_requested));
        }

        $friends2 = array();

        $f2 = Friendship::where('status', 1)->where('user_requested', $this->id)->get();

        foreach ($f2 as $friendship) {
            array_push($friends2, \App\User::find($friendship->user_requester));
        }

        return array_merge($friends, $friends2);
    }

    public function pending_friend_requests() {

        $users = array();

        $friendships = Friendship::where('status', 0)->where('user_requested', $this->id)->get();

        foreach ($friendships as $friendship) {
            array_push($users, \App\User::find($friendship->user_requester));
        }

        return $users;
    }

    public function friends_ids() {

        return collect($this->friends())->pluck('id');
    }

    public function is_friends_with($user_id) {

        if(in_array($user_id, $this->friends_ids()->toArray())) {
            
            return 1;
        }

        return 0;
        
    }

    public function pending_friend_requests_ids() {

        return collect($this->pending_friend_requests())->pluck('id')->toArray();
    }

    public function pending_friend_requests_sent() {

        $users = array();

        $friendships = Friendship::where('status', 0)->where('user_requester', $this->id)->get();

        foreach ($friendships as $friendship) {
            array_push($users, \App\User::find($friendship->user_requested));
        }

        return $users;
    }

    public function pending_friend_requests_sent_ids() {

        return collect($this->pending_friend_requests_sent())->pluck('id')->toArray();
    }

    public function has_pending_friend_request_from($user_id) {

        if(in_array($user_id, $this->pending_friend_requests_ids())) {

            return 1;
        }
            
        return 0;
    }

    public function has_pending_friend_request_sent_to($user_id) {

        if(in_array($user_id, $this->pending_friend_requests_sent_ids())) {
            
            return 1;
        } 

        return 0;
    }
}