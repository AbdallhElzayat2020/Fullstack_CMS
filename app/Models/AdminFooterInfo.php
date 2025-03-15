<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminFooterInfo extends Model
{
    protected $fillable = [
        'logo',
        'description',
        'copyright',
        'language',
    ];
}
