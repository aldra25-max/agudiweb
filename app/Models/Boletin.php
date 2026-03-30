<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boletin extends Model
{
    protected $fillable = ['titulo', 'link', 'imagen', 'publicar'];
    protected $casts = ['publicar' => 'boolean'];
}
