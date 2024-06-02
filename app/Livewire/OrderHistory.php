<?php

namespace App\Livewire;

use App\Models\Admin\Customer;
use App\Models\Admin\Order;
use Livewire\Component;

class OrderHistory extends Component
{
    public $orders_wp, $orders_w, $orders_p, $orders_f, $orders_s, $state;
    public $status;

    public function mount(){

        $this->state = 'menunggu_pembayaran';

        $customer = Customer::where('user_id', auth()->user()->id)->first();


        $this->orders_wp = Order::where('customer_id', $customer->id)->where('progress', 'menunggu_pembayaran')->orderBy('updated_at', 'desc')->get();
        $this->orders_w = Order::where('customer_id', $customer->id)->where('progress', 'menunggu')->orderBy('updated_at', 'desc')->get();
        $this->orders_p = Order::where('customer_id', $customer->id)->where('progress', 'diproses')->orderBy('updated_at', 'desc')->get();
        $this->orders_f = Order::where('customer_id', $customer->id)->where('progress', 'selesai')->orderBy('updated_at', 'desc')->get();
        $this->orders_s = Order::where('customer_id', $customer->id)->where('progress', 'diterima')->orderBy('updated_at', 'desc')->get();
        $this->orders_d = Order::where('customer_id', $customer->id)->where('progress', 'dibatalkan')->orderBy('updated_at', 'desc')->get();
    }


    public function render()
    {
        return view('livewire.order-history');
    }
}
