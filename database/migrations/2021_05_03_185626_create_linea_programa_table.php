<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineaProgramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_programa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('linea_investigacion_id');
            $table->unsignedBigInteger('programa_id');
            $table->timestamps();

            $table->foreign('linea_investigacion_id')->references('id')->on('lineas_investigacion');
            $table->foreign('programa_id')->references('id')->on('programas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_programa');
    }
}
