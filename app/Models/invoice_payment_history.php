<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class invoice_payment_history extends Model
{
    protected $fillable = [
        'invoice_id',
        'price',
        'trackingNumber',
        'status',
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(invoice::class);
    }
}
