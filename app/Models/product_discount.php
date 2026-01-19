<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product_discount extends Model
{
    protected $fillable = [
        'product_id',
        'from_date',
        'to_date',
        'currency_id',
        'discount_percent',
        'discount_value',
    ];

    protected $casts = [
        'from_date' => 'date',
        'to_date' => 'date',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(currency::class);
    }
}
