<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_pesanan',
        'progress',
        'status',
        'employee_id',
        'customer_id',
        'payment_id',
        'pemesan',
        'total_harga',
        'jumlah_pesanan',
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function detailOrders()
    {
        return $this->hasMany(DetailOrder::class);
    }
}
