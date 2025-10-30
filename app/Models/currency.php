<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class currency extends Model
{
    protected $fillable = [
        'name',
    ];
    public function product_price() : BelongsTo
    {
        return $this->belongsTo(product_price::class);
    }
}
