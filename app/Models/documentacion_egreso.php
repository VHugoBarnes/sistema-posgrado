<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentacion_egreso extends Model
{
    use HasFactory;
    protected $table = 'documentacion_egresos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'estudiante_id',
        'liberacion_tesis',
        'tesis_ultima_version',
        'constancia_plagio',
        'estadia',
        'articulo',
        'evaluacion_desemp',
        'cvu',
        'numero_cvu',
        'encuesta_egresado',
        'validacion_ingles',
       ];
}
