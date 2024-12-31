<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class product_feature_value_tr extends Model
{
    protected $fillable = [
        'value',
        'languages_id',
        'product_feature_value_id',
    ];

    public function languages(): BelongsTo
    {
        return $this->belongsTo(languages::class);
    }

    public function product_feature_values(): BelongsTo
    {
        return $this->belongsTo(product_feature_values::class);
    }





}
