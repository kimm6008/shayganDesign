<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class about_us extends Model
{
    protected $table="about_us";
    public $timestamps = false;
    protected $fillable = [
        'video',
    ];

    public function translation() : HasMany
    {
        return $this->hasMany(about_us_tr::class);
    }
}
