<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Member extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login_id', 50);
            $table->string('login_pass', 100);
            $table->string('name', 50);
            $table->string('nick_name', 50)->nullable();
            $table->string('address', 125)->nullable();
            $table->string('zip_code', 5)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('town', 20)->nullable();
            $table->string('tel', 20)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->tinyInteger('active');
            $table->string('active_date', 20);
            $table->string('active_ip', 128);
            $table->string('last_login_date', 20);
            $table->string('last_login_ip', 128);
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
        Schema::dropIfExists('member');
    }
}
