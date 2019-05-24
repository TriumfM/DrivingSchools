<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocDocumentables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_documentables', function(Blueprint $table){

            $table->integer('document_id');
            $table->integer('doc_documentables_id');
            $table->string('doc_documentables_type');
            $table->timestamps();

            $table->foreign('document_id')->references('id')->on('doc_document')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doc_documentables');
    }
}
