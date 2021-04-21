<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotacionesPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votaciones_preguntas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idpreguntavotada');
            $table->unsignedBigInteger('idopcionvotada');
            $table->foreign('idpreguntavotada')->references('id')->on('pregunta');
            $table->foreign('idopcionvotada')->references('id')->on('opciones_pregunta');
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
        Schema::dropIfExists('votaciones_preguntas');
    }
}
