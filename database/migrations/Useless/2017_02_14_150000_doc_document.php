<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_document', function(Blueprint $table) {

            $table->integer('id', true);
            $table->string('number');
            $table->string('name');
            $table->string('description');
            $table->string('file');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();

            $table->enum('type', ['Medical', 'Job Contract']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doc_document');
    }
}
