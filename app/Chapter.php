<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['title', 'content', 'story_id', 'user_id'];

    public function story() {
        return $this->belongsTo(Story::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
