<?php

namespace App\Http\Controllers;

use App\Models\Admin\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('landing-page', compact('products'));
    }
}
