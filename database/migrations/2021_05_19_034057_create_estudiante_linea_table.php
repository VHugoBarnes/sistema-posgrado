<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudianteLineaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante_linea', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->unsignedBigInteger('linea_investigacion_id');
            $table->timestamps();

            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->foreign('linea_investigacion_id')->references('id')->on('lineas_investigacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiante_linea');
    }
}
