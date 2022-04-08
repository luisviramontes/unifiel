<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AsignacionDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_documentos', function (Blueprint $table) {
            $table->increments('id');          
            $table->integer('id_user')->unsigned()->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_solicita')->unsigned()->nullable();
            $table->foreign('id_solicita')->references('id')->on('users');
            $table->integer('num_asignacion');           
            $table->string('clave_alfanumerica');
            $table->string('folio_referencia')->nullable();
            $table->string('documento');
            $table->integer('id_tipo_documento')->unsigned ();
            $table->foreign('id_tipo_documento')->references('id')->on('tipos_documentos');
            $table->string('observaciones')->nullable();
            $table->string('estado');                     
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
        Schema::drop('asignacion_documentos');
    }
}
