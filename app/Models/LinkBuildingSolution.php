<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkBuildingSolution extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'features' => 'array',
    ];
}
