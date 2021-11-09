<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
use App\Models\Usuario;
 
class Avance extends Model{
use HasFactory;
 
protected $table = 'avance';
 
/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $fillable = [
'usuario_id',
'fecha',
'hora',
'comentarios',
];
 
public function usuario(){
return $this->belongsTo(Usuario::class, 'usuario_id');
}

}