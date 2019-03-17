<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Indexslide extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index_slide', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->text('desp')->nullable();
            
            
           

            
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
