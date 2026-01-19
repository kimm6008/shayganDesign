<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class about_us_tr extends Model
{
    protected $table='about_us_tr';
    public $timestamps = false;
    protected $fillable = [
        'about_us_id',
        'languages_id',
        'content',
        'vision',
        'mission',
        'first_page_content',
    ];

    public function about_us(): BelongsTo
    {
        return $this->belongsTo(about_us::class);
    }

    public function languages(): BelongsTo
    {
        return $this->belongsTo(languages::class);
    }
}
