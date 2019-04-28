<?php

namespace App\Traits;

trait RoleValidation {

    public function hasRole($role) {
        
        if($this->roles()->where('role', $role)->first()) {
            return true;
        }

        return false;
    }

    public function hasAnyRole($roles) {
        if(is_array($roles)) {
            foreach ($roles as $role) {
                if($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)) {
                return true;
            }
        }

        return false;
    }

    public function authorizeRoles($roles) {
        if(is_array($roles)) {

            return $this->hasAnyRole($roles) || abort(401);
        }

        return $this->hasRole($roles) || abort(401);
    }

    public function isAdmin() {

        return $this->hasRole('admin');
    }
}