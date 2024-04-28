<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    public function index(){
        $ids = session()->get('product_ids');

        $products = Product::whereIn('id', $ids)->get();

        return view('user.pelanggan.confirm', compact('products'));
    }

    public function confirm($order_id){
        
    }
}
