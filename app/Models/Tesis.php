<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Estudiante;
use App\Models\Usuario;
use App\Models\Comentariosdoc_egreso;

class Tesis extends Model
{
    use HasFactory;

    protected $table = 'tesis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estudiante_id',
        'titulo',
        'director',
        'director_externo',
        'codirector',
        'secretario',
        'vocal',
        'ruta_tesis'
    ];
    public function usuario() 
    {
        // Nombre del modelo, llave foranea
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }


    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'estudiante_id');
    }

    public function director_usuario()
    {
        return $this->belongsTo(Usuario::class, 'director');
    }

    public function codirector_usuario()
    {
        return $this->belongsTo(Usuario::class, 'codirector');
    }

    public function secretario_usuario()
    {
        return $this->belongsTo(Usuario::class, 'secretario');
    }

    public function vocal_usuario()
    {
        return $this->belongsTo(Usuario::class, 'vocal');
    }

    public function solicitud()
    {
        return $this->hasMany(Solicitud_Cambio::class, 'tesis_id');
    }
    public function comentariosdoc_egreso()
    {
        return $this->belongsTo(Comentariosdoc_egreso::class, 'estudiante_id');
    }


}
