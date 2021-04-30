<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Estudiante;
use App\Models\Usuario;

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
        'id_estudiante',
        'titulo',
        'director',
        'director_externo',
        'codirector',
        'secretario',
        'vocal'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }

    public function director()
    {
        return $this->belongsTo(Usuario::class, 'director');
    }

    public function codirector()
    {
        return $this->belongsTo(Usuario::class, 'codirector');
    }

    public function secretario()
    {
        return $this->belongsTo(Usuario::class, 'secretario');
    }

    public function vocal()
    {
        return $this->belongsTo(Usuario::class, 'vocal');
    }

}
