<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function paymetMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
