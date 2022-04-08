<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FirmasRevocadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firmas_revocadas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_firma')->nullable()->unsigned ();
            $table->foreign('id_firma')->references('id')->on('firmas_emitidas');
            $table->integer('id_asignacion')->unsigned();
            $table->foreign('id_asignacion')->references('id')->on('asignacion_documentos'); 
            $table->string('motivo');                      
            $table->string('captura');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('firmas_revocadas');
    }
}
