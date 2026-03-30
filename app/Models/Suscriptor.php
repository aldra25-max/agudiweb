<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suscriptor extends Model
{
    protected $fillable = ['email', 'activo', 'fecha_suscripcion'];
    protected $casts = [
        'activo' => 'boolean',
        'fecha_suscripcion' => 'date',
    ];
}
