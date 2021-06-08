<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadia_Tecnica extends Model
{
    use HasFactory;

    protected $table = 'estadia_tecnica';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estudiante_id',
        'estatus',
        'nombre_empresa',
        'asesor',
        'area',
        'nombre_proyecto',
        'desde',
        'hasta',
        'observaciones',
        'ruta_oficio_presentacion',
        'ruta_informe_tecnico',
        'ruta_oficio_terminacion'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'estudiante_id');
    }
}
