<?php

namespace App\Models;

use App\Http\SettingHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class product_model extends Model
{
    protected $fillable = [
        'enable',
        'imgPath',
        'product_group_id',
        'uuid'
    ];
    protected static function boot()
    {
        parent::boot();

        static::saved(function () {
            Cache::forget('productGroups');
        });

        static::deleted(function () {
            Cache::forget('productGroups');
        });
    }
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

    public function products() : HasMany
    {
        return  $this->hasMany(product::class);
    }
    public static function FetchAllModels()
    {
        $faLangID = SettingHelper::getFaLangID();
        $enLangID = SettingHelper::getEnLangID();
        return product_model::with(['product_model_translation', 'product_group.translation'])->get()
            ->map(function ($productModel) use ($faLangID, $enLangID) {
                return [
                    'id' => $productModel->id,
                    'imgPath' => $productModel->imgPath,
                    'enable' => $productModel->enable,
                    'uuid' => $productModel->uuid,
                    'fa_name' => $productModel->product_model_translation->where('languages_id', $faLangID)->first()?->name ?? 'N/A',
                    'en_name' => $productModel->product_model_translation->where('languages_id', $enLangID)->first()?->name ?? 'N/A',
                    'fa_group_name' => $productModel->product_group->translation->where('languages_id', $faLangID)->first()?->name ?? 'N/A',
                    'en_group_name' => $productModel->product_group->translation->where('languages_id', $enLangID)->first()?->name ?? 'N/A',
                ];
            });
    }
}
