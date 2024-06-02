<?php

namespace App\Livewire;

use App\Models\Admin\Order;
use Livewire\Component;

class Orders extends Component
{
    public $orders_wp, $orders_w, $orders_p, $orders_f, $orders_s, $state;
    public $status;

    public function mount(){
        if(auth()->user()->hasRole('pelayan')){
            $this->state = 'selesai';
        }else{
            $this->state = 'menunggu';
        }
        $this->orders_wp = Order::where('progress', 'menunggu_pembayaran')->orderBy('updated_at', 'asc')->get();
        $this->orders_w = Order::where('progress', 'menunggu')->orderBy('updated_at', 'asc')->get();
        $this->orders_p = Order::where('progress', 'diproses')->orderBy('updated_at', 'asc')->get();
        $this->orders_f = Order::where('progress', 'selesai')->orderBy('updated_at', 'asc')->get();
        $this->orders_s = Order::where('progress', 'diterima')->orderBy('updated_at', 'asc')->get();
        $this->orders_d = Order::where('progress', 'dibatalkan')->orderBy('updated_at', 'asc')->get();
    }

    public function updateStatus($id, $progress){
        $order = Order::findOrFail($id)->update([
            'progress' => $progress,
        ]);
        $this->state = $progress;
        $this->orders_wp = Order::where('progress', 'menunggu_pembayaran')->orderBy('updated_at', 'asc')->get();
        $this->orders_w = Order::where('progress', 'menunggu')->orderBy('updated_at', 'asc')->get();
        $this->orders_p = Order::where('progress', 'diproses')->orderBy('updated_at', 'asc')->get();
        $this->orders_f = Order::where('progress', 'selesai')->orderBy('updated_at', 'asc')->get();
        $this->orders_s = Order::where('progress', 'diterima')->orderBy('updated_at', 'asc')->get();
        $this->orders_d = Order::where('progress', 'dibatalkan')->orderBy('updated_at', 'asc')->get();
    }
    public function render()
    {
        return view('livewire.orders', [
            'orders_wp' => $this->orders_wp,
            'orders_w' => $this->orders_w,
            'orders_p' => $this->orders_p,
            'orders_f' => $this->orders_f,
            'orders_s' => $this->orders_s,
            'orders_d' => $this->orders_d,
            'state' => $this->state,
        ]);
    }
}
