<?php

namespace App\Models;

use App\Http\SettingHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product_gallery extends Model
{
    protected $fillable = [
        'product_id',
        'imgPath',
        'isMainImage',
    ];
    protected static function boot(){
        parent::boot();
        static::deleting(function($gallery){
            SettingHelper::DeleteImage($gallery->imgPath);
        });
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class);
    }
}
