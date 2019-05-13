<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehInstructor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veh_instructor', function(Blueprint $table){

            $table->integer('id', true);
            $table->integer('instructor_id');
            $table->integer('vehicle_id');
            $table->timestamps();

            $table->unique(['id', 'instructor_id']);
            $table->unique(['id', 'vehicle_id']);

            $table->foreign('instructor_id')->references('id')->on('int_instructor')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('veh_vehicle')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('veh_instructor');
    }
}
