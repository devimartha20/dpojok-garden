<?php

namespace App\Models\Info;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'address',
        'name',
       'latitude',
       'longitude',
        'about',
        'desc',
    ];
}
