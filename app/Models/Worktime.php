<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worktime extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'start_time',
        'end_time',
        'rest_start_time',
        'rest_end_time',
        'rest_duration_min',
        'working_duration_min',
        'total_duration_min',
    ];

}
