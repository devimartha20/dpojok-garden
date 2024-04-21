<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_payment',
        'status',
        'jumlah',
        'uang',
        'kembali',
        'total_bayar'
    ];

    public function paymetMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
