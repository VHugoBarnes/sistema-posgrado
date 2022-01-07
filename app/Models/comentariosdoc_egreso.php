<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentariosdoc_egreso extends Model
{
    use HasFactory;
    protected $table = 'comentariosdoc_egresos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'estudiante_id',
        'estado_liberacion_tesis',
        'estado_tesis_ultima_version',
        'estado_constancia_plagio',
        'estado_estadia',
        'estado_articulo',
        'estado_evaluacion_desemp',
        'estado_cvu',
        'estado_numero_cvu',
        'estado_encuesta_egresado',
        'estado_validacion_ingles',
        'comentario_liberacion_tesis',
        'comentario_tesis_ultima_version',
        'comentario_constancia_plagio',
        'comentario_estadia',
        'comentario_articulo',
        'comentario_evaluacion_desemp',
        'comentario_cvu',
        'comentario_numero_cvu',
        'comentario_encuesta_egresado',
        'comentario_validacion_ingles',
        'estudiante_id',
       ];
}
