<?php

namespace App\Models\Admin;

use App\Models\Reservation;
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
        'harga',
        'tipe',
        'total_harga',
        'jumlah_pesanan',
        'reservation_id',
        'packing'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
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
    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }
}
