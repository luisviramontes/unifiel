<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Notificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users'); 
            $table->string('tipo')->nullable();  
            $table->string('id_aux')->nullable();  
            $table->string('tabla')->nullable();  
            $table->string('ruta')->nullable();  
            $table->string('observacion')->nullable();  
            $table->integer('id_envia')->unsigned();
            $table->foreign('id_envia')->references('id')->on('users'); 
            $table->string('estado')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notificaciones');
    }
}
