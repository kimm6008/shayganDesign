<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class slide_show extends Model
{
    protected $table = 'slide_show';

    protected $primaryKey='id';

    protected $fillable = [
        'product_gallery_id',
        'imgPath',
    ];

    public function productGallery(): BelongsTo
    {
        return $this->belongsTo(product_gallery::class);
    }

    public function translation() : HasMany
    {
        return $this->hasMany(slide_show_tr::class);
    }


}
