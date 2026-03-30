<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
    protected $fillable = ['edicion', 'imagen', 'archivo_pdf', 'fecha_edicion', 'publicar'];
    protected $casts = [
        'publicar' => 'boolean',
        'fecha_edicion' => 'date',
    ];
}
