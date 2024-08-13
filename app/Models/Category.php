<?php

namespace App\Models;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'nPerCodigo'; // Especifica la columna clave primaria

    public $incrementing = false; // No usa auto-incremento si es el caso

    protected $keyType = 'string';

    public function personas()
    {
        return $this->hasMany(Persona::class, 'category_nPerCodigo', 'nPerCodigo');
    }
}

