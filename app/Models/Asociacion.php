<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asociacion extends Model
{
    protected $fillable = [
    'razon_social',
    'ruc',
    'direccion',
    'correo',
    'telefono',
    'representante_legal',
    'celular_representante',
    'email_representante',
    'contactos',
    'maquinarias',
    'servicios',
];
    protected $casts = [
        'contactos' => 'array',
        'maquinarias' => 'array',
        'servicios' => 'array',
    ];
}
