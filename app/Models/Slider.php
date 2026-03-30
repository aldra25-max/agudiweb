<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['titulo', 'imagen', 'link', 'orden', 'activo'];
    protected $casts = ['activo' => 'boolean'];
}
