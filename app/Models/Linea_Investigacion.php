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
        return $this->belongsToMany(Docente::class, 'lineas_docentes', 'linea_investigacion_id', 'docente_id');
    }

    public function programas() {
        return $this->belongsToMany(Programa::class, 'lineas_programas', 'linea_investigacion_id', 'programa_id');
    }
}
