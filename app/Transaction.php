<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //aqui no se si ts_transaction debe ir en $fillable

    protected $fillable = ['rentTime', 'visible'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }

    public function review(){
        return $this->hasOne(Review::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
