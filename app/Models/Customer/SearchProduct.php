<?php

namespace App\Models\Customer; // Sesuaikan dengan struktur direktori yang sesuai

use App\Models\Admin\Order;
use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        // Tambahkan kolom lain yang dapat diisi oleh user dalam pencarian produk jika ada
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
