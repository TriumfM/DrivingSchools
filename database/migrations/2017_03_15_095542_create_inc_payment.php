<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_payment', function(Blueprint $table){

            $table->integer('id', true);
            $table->integer('category_id');
            $table->double('pay_total')->nullable();
            $table->double('pay_amount')->nullable();
            $table->double('pay_dept')->nullable();
            $table->boolean('pay_flag')->nullable();
            $table->string('description');
            $table->timestamps();

            $table->enum('pay_type', ['Cash', 'Bank']);
            $table->foreign('category_id')->references('id')->on('drv_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pay_payment');
    }
}
