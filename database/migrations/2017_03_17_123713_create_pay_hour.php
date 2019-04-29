<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayHour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_hour', function (Blueprint $table){

            $table->integer('id', true);
            $table->string('title');
            $table->double('pay_hours');
            $table->double('pay_per_hour');
            $table->double('pay_total');
            $table->integer('payment_id');


            $table->foreign('payment_id')->references('id')->on('pay_payment')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pay_hour');
    }
}
