<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::firstOrCreate([
            'user_id' =>auth()->user()->id,
        ]);
        return view('user.pelanggan.cart', compact('cart'));
    }
}
