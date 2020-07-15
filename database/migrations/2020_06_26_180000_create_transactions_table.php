<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id')->autoincrement();
            //define las llaves
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idProduct');
            $table->unsignedBigInteger('idReview');
            $table->unsignedBigInteger('idPayment');
            //referencia las foraneas
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idProduct')->references('id')->on('products');
            $table->foreign('idReview')->references('id')->on('reviews');
            $table->foreign('idPayment')->references('id')->on('payments');
            $table->time('rentTime'); //debe ser tipo interval
            $table->timestamp('tsTransaction'); //faltan los digitos
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
        Schema::dropIfExists('transactions');
    }
}
