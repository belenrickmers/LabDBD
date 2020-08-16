<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['directAction', 'visible'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
