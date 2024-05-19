<?php

namespace App\Models\admin;

use App\Models\ReservationTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_meja',
        'jumlah_kursi',
        'status',
        'image',
        'deskripsi',
        'join_allowed',
    ];

    public function reservationTables(){
        return $this->hasMany(ReservationTable::class);
    }

}

