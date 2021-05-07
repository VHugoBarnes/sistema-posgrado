<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->text('impacto')->nullable();
            $table->text('part_grupos_proyectos')->nullable();
            $table->text('servicios_prestados')->nullable();
            $table->text('datos_relevantes')->nullable();
            $table->enum('orientacion', ['S','N']);
            $table->text('justificacion_orientacion')->nullable();
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
        Schema::dropIfExists('programas');
    }
}
