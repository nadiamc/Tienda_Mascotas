<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    // Habilitamos los campos de la tabla para que se puedan cargar
    protected $fillable = ['name', 'species', 'age'];
}