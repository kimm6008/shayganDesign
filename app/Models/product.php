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
        'uuid',
        'is_selective',
        'color_code'
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
                        'isColor'=>$product_feature_values->features->first()->isColor,
                        'colors'=>explode(',', $product_feature_values->colors) ?? null,
                        'fa_value' =>optional($product_feature_values->translation->where('languages_id', $faLangID)->first())->value,
                        'en_value' =>optional($product_feature_values->translation->where('languages_id', $enLangID)->first())->value,
                        'feature_fa_name'=>$product_feature_values->features->first()->translations->where('languages_id', $faLangID)->first()->name,
                        'feature_en_name'=>$product_feature_values->features->first()->translations->where('languages_id', $enLangID)->first()->name

                    ]
                ];
            });
    }

    public static function GetProductFullInfo()
    {
        $faLangID = SettingHelper::getFaLangID();
        $enLangID = SettingHelper::getEnLangID();
        return product::with(['translation','Gallery','product_model.product_model_translation',
            'product_group.translation'])->get()
            ->map(function (product $product) use ($faLangID, $enLangID){
                return [
                    'id'=>$product->id,
                    'uuid'=>$product->uuid,
                    'enable'=>$product->enable,
                    'color'=>$product->color_code,
                    'fa_name'=>$product->translation->where('languages_id',$faLangID)->first()->name,
                    'en_name'=>$product->translation->where('languages_id',$enLangID)->first()->name,
                    'fa_desc'=>$product->translation->where('languages_id',$faLangID)->first()->description,
                    'en_desc'=>$product->translation->where('languages_id',$enLangID)->first()->description,
                    'product_group_id'=>$product->product_group_id,
                    'fa_group_name'=>$product->product_group->translation->where('languages_id',$faLangID)->first()->name,
                    'en_group_name'=>$product->product_group->translation->where('languages_id',$enLangID)->first()->name,
                    'product_model_id'=>$product->product_model_id,
                    'fa_model_name'=>$product->product_model->product_model_translation->where('languages_id',$faLangID)->first()->name,
                    'en_model_name'=>$product->product_model->product_model_translation->where('languages_id',$enLangID)->first()->name,
                    'main_image'=>$product->Gallery->where('isMainImage',1)->first()?->imgPath ?? '',
                    'banner_image'=>$product->Gallery->where('isBannerImage',1)->first()?->imgPath ?? '',
                    'is_selective'=>$product->is_selective
                ];
            });
    }
    public static function GetSelectiveProducts($langid)
    {
        return product::with(['translation'=>function ($query) use ($langid)  {
            return $query->where('languages_id', $langid);
        },'gallery'=>function ($query)  {
            return $query->where('isMainImage',1)->get('imgPath');
        }])->where('is_selective',true)->get();
    }
}
