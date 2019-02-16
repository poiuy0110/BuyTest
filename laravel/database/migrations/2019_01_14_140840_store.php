<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Store extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('store_code', 50);
            $table->string('city', 50);
            $table->string('town', 50);
            $table->string('zip_code', 5);
            $table->string('address', 128);
            $table->string('tel', 20);
            $table->string('fax', 20);
            $table->string('contact_tel', 20);
            $table->string('charge', 20);
            $table->string('email', 20);
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
        Schema::dropIfExists('store');
    }
}
