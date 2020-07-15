<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id')->autoincrement();
            $table->unsignedBigInteger('idRole');
            $table->string('password', 20);
            $table->string('firstName', 20);
            $table->string('lastName', 20);
            $table->date('dateofbirth');
            $table->string('email', 50)->unique(); //cambiado de 40 a 50
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('contactNumber');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
