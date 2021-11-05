<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ComentariosDocEgreso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        Schema::enableForeignKeyConstraints();
        Schema::create('ComentariosDoc_egresos', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->unsignedBigInteger('estado_liberacion_tesis')->nullable();
            $table->unsignedBigInteger('estado_tesis_ultima_version')->nullable();
            $table->unsignedBigInteger('estado_constancia_plagio')->nullable();
            $table->unsignedBigInteger('estado_estadia')->nullable();
            $table->unsignedBigInteger('estado_articulo')->nullable();
            $table->unsignedBigInteger('estado_evaluacion_desemp')->nullable();
            $table->unsignedBigInteger('estado_cvu')->nullable();
            $table->unsignedBigInteger('estado_numero_cvu')->nullable();
            $table->unsignedBigInteger('estado_encuesta_egresado')->nullable();
            $table->unsignedBigInteger('estado_validacion_ingles')->nullable();
            
            $table->string('comentario_liberacion_tesis')->nullable();
            $table->string('comentario_tesis_ultima_version')->nullable();
            $table->string('comentario_constancia_plagio')->nullable();
            $table->string('comentario_estadia')->nullable();
            $table->string('comentario_articulo')->nullable();
            $table->string('comentario_evaluacion_desemp')->nullable();
            $table->string('comentario_cvu')->nullable();
            $table->string('comentario_numero_cvu')->nullable();
            $table->string('comentario_encuesta_egresado')->nullable();
            $table->string('comentario_validacion_ingles')->nullable();
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
        //
    }
}
