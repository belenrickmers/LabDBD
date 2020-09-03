<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('id')->autoincrement();
            //Se dejan comment y rate como nullable ya que para crear un review puede
            //ingresarse uno de los dos o ambos
            $table->string('comment', 250)->nullable(); //modificado de 150 a 250
            $table->integer('rate')->nullable(); //valoracion
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
        Schema::dropIfExists('reviews');
    }
}
