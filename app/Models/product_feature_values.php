<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class product_feature_values extends Model
{
    protected $fillable = [
        'feature_id',
        'product_id',
        'colors'
    ];

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(feature::class, 'product_feature_values', 'id', 'feature_id');
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class);
    }
    public function translation()
    {
        return $this->hasMany(product_feature_value_tr::class);
    }
}
