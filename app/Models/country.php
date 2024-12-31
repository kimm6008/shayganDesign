<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class country extends Model
{
    protected $fillable = [
        'name',
        'languages_id',
        'currency_id'
    ];


    public function currency(): BelongsTo
    {
        return $this->belongsTo(currency::class);
    }
    public function languages(): BelongsTo
    {
        return $this->belongsTo(languages::class);
    }
    public function province(): HasMany
    {
        return $this->hasMany(province::class);
    }
}
