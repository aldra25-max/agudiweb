<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $fillable = ['imagen', 'descripcion', 'orden', 'activo'];
    protected $casts = ['activo' => 'boolean'];
}
