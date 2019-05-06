<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    
    public function stories() {
        return $this->belongsToMany(Story::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
