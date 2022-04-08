<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DomiciliosUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned ();
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('codigo');
            $table->string('pais');
            $table->string('estado');
            $table->string('municipio');
            $table->string('asentamiento');
            $table->string('calle');
            $table->string('num');
            $table->string('num_int');
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
        Schema::drop('domicilios_user');
    }
}
