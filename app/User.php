<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'dateofbirth', 'email', 'password', 'contactNumber', 'visible' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function account(){
        return $this->hasMany(Account::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }

    public function userproduct(){
        return $this->hasMany(UserProduct::class);
    }

    public function history(){
        return $this->hasMany(History::class);
    }
}
