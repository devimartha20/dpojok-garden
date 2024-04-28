<?php

namespace App\Models;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCart extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'product_id',
        'jumlah'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
}
