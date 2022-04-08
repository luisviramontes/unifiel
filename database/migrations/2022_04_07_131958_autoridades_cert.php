<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AutoridadesCert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoridades_cert', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned ();
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('cn');
            $table->string('ou');
            $table->string('org');
            $table->string('loc');
            $table->string('sta');
            $table->string('coun');
            $table->string('years');
            $table->string('captura');
            $table->string('estado');
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
        Schema::drop('autoridades_cert');
    }
}
