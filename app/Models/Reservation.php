<?php

namespace App\Models;

use App\Models\Admin\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'start_time',
        'end_time',
        'guests',
        'status',
        'total_price'
    ];

    public $dates = [
        'date',
    ];

    public function order(){
        return $this->hasOne(Order::class);
    }
}
