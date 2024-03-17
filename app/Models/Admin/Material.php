<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'stok',
        'unit_id'
    ];

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
