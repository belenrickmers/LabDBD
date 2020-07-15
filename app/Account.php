<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['card_number', 'card_type'. 'bank'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
