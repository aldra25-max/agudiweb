<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $fillable = ['titulo', 'contenido', 'imagen', 'publicar'];
    protected $casts = ['publicar' => 'boolean'];
}
