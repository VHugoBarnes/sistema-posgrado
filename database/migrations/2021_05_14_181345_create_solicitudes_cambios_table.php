<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesCambiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_cambios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tesis_id');
            $table->text('ruta_documento')->nullable();
            $table->string('asunto');
            $table->string('estatus');
            $table->string('titulo_nuevo');
            $table->string('titulo_anterior');
            $table->text('objetivog_nuevo');
            $table->text('objetivog_anterior');
            $table->text('objetivoe_nuevo');
            $table->text('objetivoe_anterior');
            $table->text('justificacion');
            $table->timestamps();

            $table->foreign('tesis_id')->references('id')->on('tesis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes_cambios');
    }
}
