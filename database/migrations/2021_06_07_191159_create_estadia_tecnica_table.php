<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadiaTecnicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadia_tecnica', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->enum('estatus', ['Preparando', 'Pendiente', 'Aprovada', 'Rechazada', 'Sellado', 'Firmado', 'En Curso', 'Finalizado']);
            $table->string('nombre_empresa');
            $table->string('asesor');
            $table->string('area');
            $table->string('nombre_proyecto');
            $table->date('desde');
            $table->date('hasta');
            $table->string('observaciones')->nullable();
            $table->text('ruta_oficio_presentacion');
            $table->text('ruta_informe_tecnico')->nullable();
            $table->text('ruta_oficio_terminacion')->nullable();
            $table->timestamps();

            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estadia_tecnica');
    }
}
