<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product_model_tr extends Model
{
    protected $fillable = [
        'name',
        'languages_id',
        'product_model_id',
    ];

    public function languages(): BelongsTo
    {
        return $this->belongsTo(languages::class);
    }

    public function product_model(): BelongsTo
    {
        return $this->belongsTo(product_model::class);
    }
}
