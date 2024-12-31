<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'number',
        'date',
        'party_id',
        'status',
        'totalPrice',
        'payPrice',
        'remainPrice',
        'deliveryTime',
        'languages_id',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function party(): BelongsTo
    {
        return $this->belongsTo(party::class);
    }
    public function language(): BelongsTo
    {
        return $this->belongsTo(languages::class);
    }
}
