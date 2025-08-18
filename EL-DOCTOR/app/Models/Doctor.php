<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    protected $table = 'doctores';
    protected $primaryKey = 'id_doctor';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'especialidad',
        'numero_colegiado',
        'usuario',
        'password_hash',
        'direccion_clinica',
        'estado',
        'fecha_creacion',
        'ultimo_login',
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