<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Paciente extends Authenticatable
{
    protected $table = 'pacientes';
    protected $primaryKey = 'id_paciente';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'sexo',
        'correo',
        'telefono',
        'direccion',
        'usuario',
        'password_hash',
        'fecha_creacion',
    ];

    protected $hidden = [
        'password_hash',
    ];

    // Para que Auth funcione correctamente
    public function getAuthPassword()
    {
        return $this->password_hash;
    }
}