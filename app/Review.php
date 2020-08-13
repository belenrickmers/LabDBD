<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['comment', 'rate', 'visible'];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
