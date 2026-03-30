<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'imagen', 'fecha_hora', 'lugar', 'link', 'publicar'];
    protected $casts = [
        'publicar' => 'boolean',
        'fecha_hora' => 'datetime',
    ];
}
