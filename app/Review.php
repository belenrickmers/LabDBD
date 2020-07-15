<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['comment', 'rate'];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
