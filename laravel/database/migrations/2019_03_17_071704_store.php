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
            $table->string('name', 50)->nullable();
            $table->string('store_code', 20)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('town', 20)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('tel', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('contact', 50)->nullable();
            $table->string('email', 128)->nullable();
            
           

            
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
        //
    }
}
