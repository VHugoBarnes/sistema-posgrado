<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud_Cambio extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_cambios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tesis_id',
        'ruta_documento',
        'asunto',
        'estatus',
        'titulo_nuevo',
        'titulo_anterior',
        'objetivog_nuevo',
        'objetivog_anterior',
        'objetivoe_nuevo',
        'objetivoe_anterior',
        'justificacion',
        'comentarios'
    ];

    public function tesis()
    {
        return $this->belongsTo(Tesis::class, 'tesis_id');
    }
}
