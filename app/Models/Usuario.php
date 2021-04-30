<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Estudiante;
use App\Models\Docente;
use App\Models\Tesis;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'password',
        'genero',
        'direccion',
        'telefono',
        'tipo_usuario',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function docente() {
        return $this->hasOne(Docente::class);
    }

    public function estudiante() {
        return $this->hasOne(Estudiante::class, 'id_usuario');
    }

    public function director()
    {
        return $this->hasMany(Tesis::class, 'director');
    }

    public function codirector()
    {
        return $this->hasMany(Tesis::class, 'codirector');
    }

    public function secretario()
    {
        return $this->hasMany(Tesis::class, 'secretario');
    }

    public function vocal()
    {
        return $this->hasMany(Tesis::class, 'vocal');
    }
}
