<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TngAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tng_answer', function(Blueprint $table){

            $table->integer('id', true);
            $table->string('name')->nullable();
            $table->integer('question_id');
            $table->timestamps();

            $table->enum('solution', ['Po','Jo']);
            $table->foreign('question_id')->references('id')->on('tng_question')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tng_answer');
    }
}
