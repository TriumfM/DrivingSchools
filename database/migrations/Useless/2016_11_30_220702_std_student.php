<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StdStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('std_student', function(Blueprint $table){

            $table->integer('id', true);
            $table->date('registration_date');
            $table->string('registration_number');
            $table->string('first_name');
            $table->string('parent_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('id_number');
            $table->date('birthday');
            $table->string('profession');
            $table->string('mobile')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->integer('city_id');
            $table->timestamps();

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
        Schema::drop('std_student');
    }
}
