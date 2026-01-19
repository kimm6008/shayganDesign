<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class contact_us_tr extends Model
{
    protected $fillable = [
        'contact_us_id',
        'languages_id',
        'address',
    ];
     protected $table="contact_us_tr";
     public $timestamps = false;
    public function contact_us(): BelongsTo
    {
        return $this->belongsTo(contact_us::class);
    }

    public function languages(): BelongsTo
    {
        return $this->belongsTo(languages::class);
    }
}
