<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class slide_show_tr extends Model
{
    protected $table = 'slide_show_tr';

    protected $fillable = [
        'slide_show_id',
        'description',
        'languages_id'
    ];

    public function slideShow(): BelongsTo
    {
        return $this->belongsTo(slide_show::class);
    }

    public function languages(): BelongsTo
    {
        return $this->belongsTo(languages::class);
    }
}
