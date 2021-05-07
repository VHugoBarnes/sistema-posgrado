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
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    // Relación muchos-muchos
    public function estudiante() {
        return $this->belongsToMany(Estudiante::class, 'docente_estudiante', 'docente_id', 'estudiante_id');
    }

    // Las lineas de investigacion de un docente
    public function lineas_investigacion() {
        return $this->belongsToMany(Linea_Investigacion::class, 'docente_linea', 'docente_id', 'linea_investigacion_id');
    }
}
