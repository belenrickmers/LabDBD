<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Faltaria la foto
    protected $fillable = ['product_name', 'price', 'product_description', 'region', 'comuna', 'availability', 'review_average'];

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }

    public function userproduct(){
        return $this->hasMany(UserProduct::class);
    }

    public function categoryproduct(){
        return $this->hasMany(CategoryProduct::class);
    }
}
