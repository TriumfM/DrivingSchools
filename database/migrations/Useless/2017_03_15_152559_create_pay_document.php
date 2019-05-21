<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_document', function (Blueprint $table){

            $table->integer('id', true);
            $table->double('pay_amount');
            $table->integer('payment_id');
            $table->string('pay_file');

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
        Schema::drop('pay_document');
    }
}
