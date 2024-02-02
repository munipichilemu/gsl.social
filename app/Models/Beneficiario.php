<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laragear\Rut\HasRut;

class Beneficiario extends Model
{
    use HasRut, SoftDeletes;

    protected $fillable = [
        'rut',
        'nombres',
        'apellido_1',
        'apellido_2',
        'direccion',
        'telefono',
        'nacionalidad',
        'anotaciones',
    ];

    public function shouldAppendRut(): bool
    {
        return true;
    }
}
