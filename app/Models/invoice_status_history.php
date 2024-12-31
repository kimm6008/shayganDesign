<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class invoice_status_history extends Model
{
    protected $fillable = [
        'invoice_id',
        'fromStatus',
        'toStatus',
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(invoice::class);
    }
}
