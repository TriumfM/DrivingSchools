<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_student', function (Blueprint $table){

            $table->integer('id', true);
            $table->integer('student_id');
            $table->integer('payment_id');

            $table->foreign('payment_id')->references('id')->on('pay_payment')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('std_student')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pay_student');
    }
}
