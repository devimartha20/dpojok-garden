<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Admin\Payment;
use Illuminate\Http\Request;

class PaymentTransController extends Controller
{
    public function show($id){
        $payment = Payment::findOrFail($id);
        return view('user.kasir.payment.pay', compact('payment'));
    }
}
