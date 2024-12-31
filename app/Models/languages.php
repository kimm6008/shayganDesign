<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class languages extends Model
{
    protected $fillable = [
        'lang_name',
        'lang_code',
        'lang_dir',
    ];
}
