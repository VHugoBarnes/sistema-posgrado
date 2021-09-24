<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Egreso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('documentacion_egresos', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->string('liberacion_tesis')->nullable();
            $table->string('tesis_ultima_version')->nullable();
            $table->string('constancia_plagio')->nullable();
            $table->string('estadia')->nullable();
            $table->string('articulo')->nullable();
            $table->string('evaluacion_desemp')->nullable();
            $table->string('cvu')->nullable();
            $table->string('numero_cvu')->nullable();
            $table->string('encuesta_egresado')->nullable();
            $table->string('validacion_ingles')->nullable();
            $table->timestamps();

            $table->foreign('estudiante_id')->references('usuario_id')->on('estudiantes');
            
           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentacion_egreso');
    }
}
