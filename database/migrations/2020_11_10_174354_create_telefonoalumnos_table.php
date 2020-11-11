<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTelefonoalumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonoalumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('numero')->nullable();
            $table->boolean('predeterminado')->nullable();
            $table->integer('tipo')->nullable();
            $table->integer('persona')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('telefonoalumnos');
    }
}
