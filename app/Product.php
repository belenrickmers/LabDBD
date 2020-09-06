<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Faltaria la foto
    protected $fillable = ['productName', 'price', 'productDescription', 'region', 'comuna', 'availability', 'reviewAverage', 'visible', 'product_picture'];

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
