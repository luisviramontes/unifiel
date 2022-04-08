<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FirmaElectronica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firma_electronica', function (Blueprint $table) {
            $table->increments('id');
            $table->binary('certificado');   
            $table->binary('clave_privada');   
            $table->binary('clave_publica');   
            $table->integer('id_usuario')->unsigned ();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->string('serial');           
            $table->string('captura');
            $table->string('cert');
            $table->string('llave');
            $table->string('password');
            $table->string('estado')->nullable();
            $table->date('expira')->nullable();
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
        Schema::drop('firma_electronica');
    }
}
