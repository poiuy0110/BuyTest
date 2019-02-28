<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class About extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kind', 20)->nullable();
            $table->string('post_date', 20)->nullable();
            $table->string('title', 50)->nullable();
            $table->string('subject', 50)->nullable();
            $table->text('desp')->nullable();
            $table->tinyInteger('vw');
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
        Schema::dropIfExists('about');
    }
}
