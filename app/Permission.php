<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['permission', 'perm_description'];

    public function permissionrol(){
        return $this->hasMany(PermissionRole::class);
    }
}
