<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nomor',
        'penerima',
    ];

    public function payment(){
        return $this->hasMany(Payment::class);
    }
}
