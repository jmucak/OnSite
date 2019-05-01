<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['title', 'description', 'slug', 'user_id'];
    
    public function user() {
        
        return $this->belongsTo(User::class);
    }
}
