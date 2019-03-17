<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OdrItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odr_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('odr_id')->nullable();
            $table->integer('prod_id')->nullable();
            $table->integer('prod_cat')->nullable();
            $table->string('prod_name', 50)->nullable();
            $table->float('qty')->nullable();
            $table->float('price', 50)->nullable();
            $table->float('amount', 255)->nullable();
           

            
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
