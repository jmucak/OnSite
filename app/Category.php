<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function stories() {
        return $this->belongsToMany(Story::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
