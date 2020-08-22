<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement('
       CREATE OR REPLACE FUNCTION add_user_log() RETURNS trigger AS $paAdd_user_log$
       DECLARE lastID INT;
       DECLARE date TIMESTAMP;
       DECLARE update TIMESTAMP;
       BEGIN
           SELECT * INTO lastID FROM users ORDER BY id DESC LIMIT 1;
           SELECT created_at INTO date FROM users WHERE id = lastID;
           SELECT updated_at INTO update FROM users WHERE id = lastID;
           INSERT INTO histories (id_user, direct_action, visible, created_at, updated_at) VALUES (lastID , \'Se_agrego_un_usuario\', true, date, update);
           RETURN New;
       END;
       $paAdd_user_log$
       LANGUAGE plpgsql;
       ');
       DB::unprepared('
         CREATE TRIGGER tg_add_user_log
         AFTER INSERT ON users
         FOR EACH ROW
         EXECUTE PROCEDURE add_user_log()');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tg_add_user_log');
    }
}
