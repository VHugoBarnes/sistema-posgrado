<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Usuario;
use App\Models\Docente;
use App\Models\Tesis;
use App\Models\Programa;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_id',
        'numero_control',
        'generacion',
        'nivel_estudios',
        'ruta_articulo',
        'becario',
        'cvu'
    ];

    // Relacion uno-uno
    public function usuario() 
    {
        // Nombre del modelo, llave foranea
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    // Relacion muchos-muchos
    public function docente() 
    {
        // nombre tabla a la que se relaciona, nombre tabla intermedia
        return $this->belongsToMany(Docente::class, 'docente_estudiante', 'estudiante_id', 'docente_id');
    }

    public function tesis() 
    {
        return $this->hasOne(Tesis::class, 'estudiante_id');
    }

    public function programa()
    {
        return $this->belongsToMany(Programa::class, 'estudiante_programa', 'estudiante_id', 'programa_id');
    }

    public function lineas()
    {
        return $this->belongsToMany(Linea_Investigacion::class, 'estudiante_linea', 'estudiante_id', 'linea_investigacion_id');
    }
}
