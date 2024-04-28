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
        'total_bayar',
        'transaction_time',
        'transaction_status',
        'transaction_id',
        'status_code',
        'signature_key',
        'fraud_status',
        'payment_type',
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
