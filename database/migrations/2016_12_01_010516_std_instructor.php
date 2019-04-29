<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StdInstructor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('std_instructor', function(Blueprint $table){

            $table->integer('id', true);
            $table->integer('instructor_id');
            $table->integer('student_id');
            $table->timestamps();

            $table->foreign('instructor_id')->references('id')->on('int_instructor')->onDelete('cascade');
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
        Schema::drop('std_instructor');
    }
}