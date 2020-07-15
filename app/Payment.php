<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //No se si debe ir ts_payment en fillable
    protected $fillable = ['pay_method', 'payment_state', 'ts_payment'];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
