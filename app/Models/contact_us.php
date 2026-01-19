<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class contact_us extends Model
{
    protected $table='contact_us';
    public $timestamps=false;
    protected $fillable = [
        'Phone',
        'Mobile',
        'Fax',
        'Email',
        'Instagram',
        'Facebook',
        'Whatsapp',
        'Telegram',
        'PostalCode',
        'PdfName',
        'twitter'
    ];

    public function translation(): HasMany
    {
        return $this->hasMany(contact_us_tr::class);
    }
}
