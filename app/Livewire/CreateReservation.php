<?php

namespace App\Livewire;

use App\Models\Admin\Customer;
use App\Models\Admin\Order;
use Livewire\Component;

class CreateReservation extends Component
{


    public function mount(){

       
    }


    public function render()
    {
        return view('livewire.create-reservation.blade.php');
    }
}
