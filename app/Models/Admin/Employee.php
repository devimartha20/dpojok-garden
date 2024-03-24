<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'no_hp',
        "user_id",
        'user_id',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
