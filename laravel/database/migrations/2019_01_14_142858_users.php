<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id', 20);
            $table->string('password', 255);
            $table->string('title', 50)->nullable();
            $table->string('level', 4)->nullable();
            $table->string('email', 128)->nullable();
            $table->tinyInteger('active');
            $table->string('last_login', 20)->nullable();
            $table->string('last_login_ip', 128)->nullable();
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
