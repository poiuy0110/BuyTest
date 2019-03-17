<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('odr_no', 50)->nullable();
            $table->string('odr_date', 20)->nullable();
            $table->integer('mem_id')->nullable();
            $table->string('login_id', 50)->nullable();
            $table->string('mem_name', 50)->nullable();
            $table->string('bill_to', 50)->nullable();
            $table->string('bill_address', 255)->nullable();
            $table->string('bill_tel', 20)->nullable();
            $table->string('bill_mobile', 20)->nullable();
            $table->string('bill_email', 128)->nullable();
            $table->string('ship_to', 50)->nullable();
            $table->string('ship_address', 255)->nullable();
            $table->string('ship_tel', 20)->nullable();
            $table->string('ship_mobile', 20)->nullable();
            $table->string('ship_email', 128)->nullable();
            $table->string('inv_type', 2)->nullable();
            $table->string('inv_title', 50)->nullable();
            $table->string('inv_bin', 50)->nullable();
            $table->string('inv_date', 50)->nullable();
            $table->string('inv_no', 50)->nullable();
            $table->tinyInteger('inv_void')->nullable();
            $table->tinyInteger('inv_cancel')->nullable();
            $table->dateTime('inv_void_time')->nullable();
            $table->string('inv_reason', 255)->nullable();
            $table->float('amount')->nullable();
            $table->float('tax')->nullable();
            $table->float('total')->nullable();
            $table->float('tax_rate')->nullable();
            $table->string('remark', 255)->nullable();
            $table->string('bill_zipcode', 10)->nullable();
            $table->string('bill_city', 50)->nullable();
            $table->string('bill_town', 50)->nullable();
            $table->string('ship_zipcode', 10)->nullable();
            $table->string('ship_city', 50)->nullable();
            $table->string('ship_town', 50)->nullable();

            $table->string('status', 10)->nullable();
            $table->string('pay_type', 10)->nullable();
            $table->string('ship_type', 10)->nullable();

            $table->string('cfm_user', 50)->nullable();
            $table->string('cfm_date', 15)->nullable();
            $table->string('cfm_ip', 128)->nullable();

            $table->float('shipping')->nullable();

            
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
