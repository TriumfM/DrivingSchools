<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStdVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('std_videos', function (Blueprint $table){

            $table->integer('id', true);
            $table->integer('student_id');
            $table->integer('video_id');
            $table->boolean('flag');

            $table->foreign('student_id')->references('id')->on('std_student')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('vid_video')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('std_videos');
    }
}
