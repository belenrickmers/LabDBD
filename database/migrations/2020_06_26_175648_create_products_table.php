<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id')->autoincrement();
            $table->string('productName', 30);
            $table->integer('price'); //deberia ser del tipo money?
            $table->string('productDescription', 250); //modificado de 200 a 250
            $table->string('region', 40);
            $table->string('comuna', 40);
            $table->boolean('availability'); //Estado disponible o no disponible
            $table->string('product_picture')->nullable(); //foto del producto, url de la foto del producto
            $table->decimal('reviewAverage', 4, 2); //promedio de valoracion
            $table->boolean('visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
