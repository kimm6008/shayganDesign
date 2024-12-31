<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product_group_feature extends Model
{
    protected $fillable = [
        'feature_id',
        'product_group_id',
    ];

    public function product_group(): BelongsTo
    {
        return $this->belongsTo(product_group::class);
    }
}
