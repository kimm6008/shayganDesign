<?php

namespace App\Models;

use App\Http\SettingHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class product extends Model
{
    protected $fillable = [
        'product_group_id',
        'product_model_id',
        'enable',
        'uuid'
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($product) {
            $product->translation()->delete();
            $product->Gallery()->delete();
        });
    }
    public function product_group(): BelongsTo
    {
        return $this->belongsTo(product_group::class);
    }

    public function product_model(): BelongsTo
    {
        return $this->belongsTo(product_model::class);
    }
    public function translation(): HasMany
    {
        return $this->hasMany(product_tr::class);
    }
    public function Gallery(): HasMany
    {
        return $this->hasMany(product_gallery::class);
    }
    public function features()
    {
        return $this->product_group->features();
    }

    public function featureValues() : HasMany
    {
        return $this->hasMany(product_feature_values::class);
    }
    public function product_price() : HasMany
    {
        return $this->hasMany(product_price::class);
    }
    public function GetFeaturesWithValus()
    {
        $faLangID = SettingHelper::getFaLangID();
        $enLangID = SettingHelper::getEnLangID();
        return $this->featureValues()->with(['translation'])->get()
            ->mapWithKeys(function (product_feature_values $product_feature_values) use ($faLangID, $enLangID) {
                $feature_id = $product_feature_values->features->first()->id;
                return [
                    $feature_id => [
                        'fa_value' => $product_feature_values->translation->where('languages_id', $faLangID)->first()->value,
                        'en_value' => $product_feature_values->translation->where('languages_id', $enLangID)->first()->value
                    ]
                ];
            });
    }
}
