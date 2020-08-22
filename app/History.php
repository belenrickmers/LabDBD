<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['id_user','direct_action', 'visible'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
