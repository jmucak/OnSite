<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['about', 'firstname', 'lastname', 'location', 'socialnetwork', 'user_id'];

    // creating relationship with user -> 1 profile belong to 1 user
    public function user() {

        return $this->belongsTo(User::class);
    }
}
