<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product_tr extends Model
{
    protected $fillable = [
        'name',
        'languages_id',
        'product_id',
        'description',
    ];

    public function languages(): BelongsTo
    {
        return $this->belongsTo(languages::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class);
    }
}
