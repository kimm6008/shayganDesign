<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class party extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'fullname',
        'city_id',
        'postalcode',
        'mobile',
        'address',
        'uuid'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(city::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
