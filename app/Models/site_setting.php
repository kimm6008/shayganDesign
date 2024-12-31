<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class site_setting extends Model
{
    protected $fillable = [
        'languages_id',
        'site_title',
        'site_desc',
        'about_us',
        'contact_us',
        'admin_password',
    ];

    public function languages(): BelongsTo
    {
        return $this->belongsTo(languages::class);
    }
}
