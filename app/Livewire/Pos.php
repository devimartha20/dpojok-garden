<?php

namespace App\Livewire;

use App\Models\Admin\Order;
use Livewire\Component;

class Pos extends Component
{
    public $order = null;

    public function addOrder()
    {
        $no_order = time();
        $order = Order::create([

        ]);
    }
    public function render()
    {
        return view('livewire.pos');
    }


}
