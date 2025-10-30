<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product_group_tr extends Model
{
    protected $fillable = [
        'name',
        'description',
        'languages_id',
        'product_group_id',
    ];

    public function languages(): BelongsTo
    {
        return $this->belongsTo(languages::class);
    }

    public function product_group(): BelongsTo
    {
        return $this->belongsTo(product_group::class);
    }
}
