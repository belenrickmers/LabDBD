<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['permission', 'permDescription'];

    public function permissionrol(){
        return $this->hasMany(PermissionRole::class);
    }
}
