<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class sms_log extends Model
{
    protected $fillable = [
        'party_id',
        'sendTime',
        'subject',
        'message',
        'status',
    ];

    protected $casts = [
        'sendTime' => 'datetime',
    ];

    public function party(): BelongsTo
    {
        return $this->belongsTo(party::class);
    }
}
