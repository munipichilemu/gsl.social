<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ayuda extends Model
{
    use HasUlids, SoftDeletes;

    protected $fillable = [
        'beneficiario_id',
        'social_report_num',
        'social_report_date',
        'amount_given',
        'given_at',
        'report_submitted',
        'observations',
    ];

    public function beneficiario(): BelongsTo
    {
        return $this->belongsTo(Beneficiario::class);
    }

    public function tipos(): BelongsToMany
    {
        return $this->belongsToMany(Tipo::class);
    }
}
