<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany(Linea_Investigacion::class, 'lineas_programas', 'id_programas', 'id_linea_investigacion');
    }
}
