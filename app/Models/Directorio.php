<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    protected $fillable = ['empresa', 'nombre', 'cargo', 'foto', 'activo'];
    protected $casts = ['activo' => 'boolean'];
}
