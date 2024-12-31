<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class feature extends Model
{
    protected $fillable = [
    ];
    public function feature_with_lang_filter($langID) : HasOne
    {
        return $this->hasOne(features_tr::class)->where('languages_id', $langID);
    }

    public function productGroups()
    {
        return $this->belongsToMany(ProductGroup::class, 'product_group_features', 'feature_id', 'product_group_id');
    }
    public function translations() : HasMany
    {
        return $this->hasMany(features_tr::class);
    }
    public function featureValues() : HasMany
    {
        return $this->hasMany(product_feature_values::class);
    }
}
