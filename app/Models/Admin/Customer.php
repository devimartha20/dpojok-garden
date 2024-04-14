<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'telepon',
        'user_id',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
