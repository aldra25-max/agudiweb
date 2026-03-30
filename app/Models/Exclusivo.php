<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exclusivo extends Model
{
    protected $fillable = ['titulo', 'contenido', 'docs', 'imagen', 'solo_socios', 'publicar'];
    protected $casts = [
        'solo_socios' => 'boolean',
        'publicar' => 'boolean',
    ];
}
