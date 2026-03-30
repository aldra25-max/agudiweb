<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    protected $fillable = ['empresa', 'logo', 'descripcion', 'direccion', 'telefono', 'link', 'facebook', 'instagram', 'linkedin', 'fecha_ingreso', 'activo'];
    protected $casts = [
        'activo' => 'boolean',
        'fecha_ingreso' => 'date',
    ];
}
