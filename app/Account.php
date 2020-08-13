<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['cardNumber', 'cardType'. 'bank', 'visible'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
