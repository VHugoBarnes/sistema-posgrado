<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tesis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->string('titulo');
            $table->text('objetivo_general')->nullable();
            $table->text('objetivo_especifico')->nullable();
            $table->unsignedBigInteger('director')->nullable();
            $table->string('director_externo')->nullable();
            $table->unsignedBigInteger('codirector')->nullable();
            $table->unsignedBigInteger('secretario')->nullable();
            $table->unsignedBigInteger('vocal')->nullable();
            $table->text('ruta_tesis')->nullable();
            $table->timestamps();

            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->foreign('director')->references('id')->on('usuarios');
            $table->foreign('codirector')->references('id')->on('usuarios');
            $table->foreign('secretario')->references('id')->on('usuarios');
            $table->foreign('vocal')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tesis');
    }
}
