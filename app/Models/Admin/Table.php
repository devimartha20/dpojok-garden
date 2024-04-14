<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_meja',
        'jumlah_kursi',
        'status',
        'image',
        'deskripsi',
    ];

}
