<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ExploreProductController extends Controller
{
    public function index(){
        $products = Product::where('stok', '>',0)->get();
        return view('user.pelanggan.searchproduct', compact('products'));            
    }
}
