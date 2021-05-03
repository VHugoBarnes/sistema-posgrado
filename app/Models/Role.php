<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Usuario;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'roles',
    ];

    public function usuario()
    {
        return $this->belongsToMany(Usuario::class, 'role_usuario', 'role_id', 'usuario_id');
    }

}
