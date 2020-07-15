<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role_name', 'role_description'];

    public function permissionrole(){
        return $this->hasMany(PermissionRole::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }
}
