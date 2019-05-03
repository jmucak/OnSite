<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Story;
use Illuminate\Http\Request;

class FeedsController extends Controller
{
    public function feed() {

        // get all friends of authenticated user
        $friends = Auth::user()->friends();

        $feed = array();
        $feed_published = array();

        foreach ($friends as $friend) {
            foreach ($friend->stories as $story) {
                array_push($feed, $story);
            }

        }
        foreach (Auth::user()->stories as $story) {
            array_push($feed, $story);
        }

        usort($feed, function($f1, $f2) {
            return $f1->id < $f2->id;
        });

        foreach($feed as $f){
            if($f['published']){
                array_push($feed_published, $f);
            }
        }
      

        return $feed_published;
    }
}
