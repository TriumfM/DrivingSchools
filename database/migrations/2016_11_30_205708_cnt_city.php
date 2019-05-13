<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CntCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cnt_city', function(Blueprint $table){

            $table->integer('id', true);
            $table->string('name');
            $table->integer('country_id');
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('cnt_country')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cnt_city');
    }
}
