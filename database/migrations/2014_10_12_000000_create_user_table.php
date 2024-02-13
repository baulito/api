<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_names');
            $table->string('user_lastnames');
            $table->string('user_email')->unique();
            $table->string('user_typeid')->nullable();
            $table->string('user_idnumber')->nullable();
            $table->string('user_city')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_address')->nullable();
            $table->integer('user_level');
            $table->integer('user_state');
            $table->string('user_user');
            $table->string('user_password');
            $table->integer('user_delete')->nullable();
            $table->string('user_code')->nullable();
            $table->text('user_informacion')->nullable();
            $table->string('user_foto')->nullable();
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
        Schema::dropIfExists('user');
    }
}
