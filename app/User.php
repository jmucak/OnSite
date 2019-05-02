<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Traits\RoleValidation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;
    use RoleValidation;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug', 'gender', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($avatar){

        return asset(Storage::url($avatar));
    }

    // Roles relation
    public function roles() {

        return $this->belongsToMany(Role::class, 'user_role');
    }

    // Profile relationship
    public function profile() {

        return $this->hasOne(Profile::class);
    }

    // Story relationship
    public function stories() {
        return $this->hasMany(Story::class);
    }

    public function chapters() {
        return $this->hasMany(Chapter::class);
    }
}
