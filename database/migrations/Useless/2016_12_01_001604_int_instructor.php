<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IntInstructor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('int_instructor', function (Blueprint $table){

            $table->integer('id', true);
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthday');
            $table->string('email');
            $table->string('id_number');
            $table->string('address');
            $table->string('mobile');
            $table->string('phone');
            $table->integer('city_id');
            $table->timestamps();

            $table->unique('email');
            $table->enum('gender', ['male', 'female']);
            $table->foreign('city_id')->references('id')->on('cnt_city')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('int_instructor');
    }
}