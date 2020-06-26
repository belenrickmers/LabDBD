<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('id')->autoincrement();
            //llave foranea
            $table->unsignedBigInteger('idUser');
            //referencia foranea
            $table->foreign('idUser')->references('id')->on('users');
            $table->integer('card_number'); //el numero de tarjeta no deberia der un entero?
            $table->string('card_type', 10); //tipo de cuenta
            $table->string('bank', 20); //nombre banco
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
        Schema::dropIfExists('accounts');
    }
}
