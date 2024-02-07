<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    public function ayudas(): BelongsToMany
    {
        return $this->belongsToMany(Ayuda::class);
    }
}
