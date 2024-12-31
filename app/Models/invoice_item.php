<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class invoice_item extends Model
{
    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity',
        'fee',
        'product_price_id',
        'currency_id',
        'totalPrice',
        'deliveryTime',
        'status',
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(invoice::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class);
    }

    public function productPrice(): BelongsTo
    {
        return $this->belongsTo(product_price::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(currency::class);
    }
}
