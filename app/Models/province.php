<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class province extends Model
{
    protected $fillable = [
        'name',
        'languages_id',
        'country_id'
    ];

    public function languages(): BelongsTo
    {
        return $this->belongsTo(languages::class);
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(country::class);
    }
    public function cities(): HasMany
    {
        return $this->hasMany( city::class);
    }
}
