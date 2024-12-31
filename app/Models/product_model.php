<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class product_model extends Model
{
    protected $fillable = [
        'enable',
        'imgPath',
        'product_group_id',
        'uuid'
    ];
    public function product_group(): BelongsTo
    {
        return $this->belongsTo(product_group::class);
    }

    public function product_model_translation(): HasMany
    {
        return $this->hasMany(product_model_tr::class);
    }
    public function product_model_with_lang_filter($langID)
    {
        return $this->hasMany(product_model_tr::class)->where('languages_id', $langID);
    }
}
