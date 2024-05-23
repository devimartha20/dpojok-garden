<?php

namespace App\Models;

use App\Models\Admin\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'table_id',
        'seats',
        'date',
        'start_time',
        'end_time',
    ];

    public $dates = [
        'date',
    ];

    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }
    public function table(){
        return $this->belongsTo(Table::class);
    }
}
