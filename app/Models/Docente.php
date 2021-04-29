<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario',
        'sni',
        'catedras',
        'tipo_investigador',
        'nivel_academico',
        'puesto',
        'jornada',
        'publicaciones',
        'cursos',
    ];

    // Relación uno-uno
    public function usuario() {
        // Nombre del modelo, llave foranea
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    // Relación muchos-muchos
    public function estudiante() {
        return $this->belongsToMany(Estudiante::class, 'docentes_estudiantes', 'id_docente', 'id_estudiante');
    }

    // Las lineas de investigacion de un docente
    public function lineas_investigacion() {
        return $this->belongsToMany(Linea_Investigacion::class, 'lineas_docentes', 'id_docente', 'id_linea_investigacion');
    }
}
