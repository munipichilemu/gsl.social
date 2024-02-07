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
        'names',
        'lastname_1',
        'lastname_2',
        'address',
        'phone',
        'nationality',
        'annotations',
    ];

    protected $appends = [
        'rut',
        'full_name',
    ];

    public static function country(string $country_code): string
    {
        $country = new Country('list');

        return $country->getList()[$country_code];
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->names} {$this->lastname_1} {$this->lastname_2}";
    }
}
