<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product_price extends Model
{
    protected $fillable = [
        'product_id',
        'fromDate',
        'toDate',
        'currency_id',
        'price',
    ];

    protected $casts = [
        'fromDate' => 'date',
        'toDate' => 'date',
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
