<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TngQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tng_question', function(Blueprint $table){

            $table->integer('id', true);
            $table->string('name', 2000);
            $table->integer('order_number')->nullable();
            $table->integer('points');
            $table->integer('test_id');
            $table->string('photo_url')->nullable();
            $table->timestamps();

            $table->foreign('test_id')->references('id')->on('tng_test')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tng_question');
    }
}
