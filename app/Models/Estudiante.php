<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'id_usuario',
        'numero_control',
        'programa',
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
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    // Relacion muchos-muchos
    public function docente() 
    {
        // nombre tabla a la que se relaciona, nombre tabla intermedia
        return $this->belongsToMany(Docente::class, 'docentes_estudiantes');
    }

    public function tesis() 
    {
        return $this->hasOne(Tesis::class, 'id_estudiante');
    }
}
