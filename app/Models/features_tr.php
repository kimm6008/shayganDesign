<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class features_tr extends Model
{
    protected $fillable = [
        'name',
        'languages_id',
        'feature_id',
    ];

    public function languages(): BelongsTo
    {
        return $this->belongsTo(languages::class);
    }

    public function feature(): BelongsTo
    {
        return $this->belongsTo(feature::class);
    }
}
