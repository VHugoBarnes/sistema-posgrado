<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Linea_Investigacion;
use App\Models\Estudiante;

class Programa extends Model
{
    use HasFactory;

    protected $table = 'programas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'impacto',
        'part_grupos_proyectos',
        'servicios_prestados',
        'datos_relevantes',
        'orientacion',
        'justificacion_orientacion'
    ];

    public function lineas_investigacion() {
        return $this->belongsToMany(Linea_Investigacion::class, 'lineas_programas', 'programa_id', 'linea_investigacion_id');
    }

    public function estudiante()
    {
        return $this->belongsToMany(Estudiante::class, 'estudiante_programa', 'programa_id', 'estudiante_id');
    }
}
