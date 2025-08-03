<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisitorLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'user_agent',
        'browser',
        'visited_at',
        'left_at',
        'duration_seconds',
    ];

    protected $dates = [
        'visited_at',
        'left_at',
    ];
}
