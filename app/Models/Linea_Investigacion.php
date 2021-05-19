<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea_Investigacion extends Model
{
    use HasFactory;

    protected $table = 'lineas_investigacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    // Los docentes registrados a una línea de investigacion
    public function docentes() {
        return $this->belongsToMany(Docente::class, 'docente_linea', 'linea_investigacion_id', 'docente_id');
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'estudiante_linea', 'linea_investigacion_id', 'estudiante_id');
    }

    public function programas() {
        return $this->belongsToMany(Programa::class, 'linea_programa', 'linea_investigacion_id', 'programa_id');
    }
}
