<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'nama',
        'deskripsi',
        'harga_jual',
        'harga_produksi',
        'stok',
        'product_category_id',
    ];

    public function productCategory(){
        return $this->belongsTo(ProductCategory::class);

    }


}
