<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laragear\Rut\HasRut;
use Parfaitementweb\FilamentCountryField\Forms\Components\Country;

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

    static public function pais(string $country_code): string
    {
        $country = new Country('list');

        return $country->getList()[$country_code];
    }
}
