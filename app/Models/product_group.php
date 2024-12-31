<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class product_group extends Model
{
    protected $table = 'product_groups';

    protected $fillable = [
        'enable',
        'DeliveryDuration',
        'imgPath',
        'uuid'
    ];

    public function product_group_tr() : HasMany
    {
        return $this->hasMany(product_group_tr::class);
    }
    public function product_group_with_lang_filter($langID): HasOne
    {
        return $this->hasOne(product_group_tr::class)->where('languages_id', $langID);
    }
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'product_group_features', 'product_group_id', 'feature_id');
    }
    public function product_models(): HasMany
    {
        return $this->hasMany(product_model::class);
    }
    public function products():HasMany
    {
        return $this->hasMany(product::class);
    }
}
