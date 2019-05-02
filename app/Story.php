<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['title', 'description', 'slug', 'user_id'];
    
    public function user() {
        
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function chapters() {
        return $this->hasMany(Chapter::class);
    }
}
