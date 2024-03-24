<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
