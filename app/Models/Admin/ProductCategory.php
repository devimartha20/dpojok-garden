<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi'
    ];

    public function Product(){
        return $this->hasMany(Product::class);
    }
}
