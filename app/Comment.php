<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment', 'user_id', 'story_id'];

    public function story() {
        return $this->belongsTo(Story::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
