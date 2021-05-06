<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->enum('sni', ['S','N'])->nullable();
            $table->enum('catedras', ['S','N'])->nullable();
            $table->string('tipo_investigador')->nullable();
            $table->string('nivel_academico')->nullable();
            $table->string('puesto')->nullable();
            $table->string('jornada')->nullable();
            $table->string('publicaciones')->nullable();
            $table->string('cursos')->nullable();
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes');
    }
}
