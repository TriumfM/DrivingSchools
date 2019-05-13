<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrvStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drv_student', function(Blueprint $table){

            $table->integer('id', true);
            $table->integer('student_id');
            $table->integer('category_id');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('std_student')->onDelete('cascade');
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
        Schema::drop('drv_student');
    }
}
