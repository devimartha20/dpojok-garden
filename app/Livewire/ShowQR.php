<?php

namespace App\Livewire;

use App\Models\ActiveQR;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\Component;

class ShowQR extends Component
{
    public $qr = null;
    public function mount($qr){
        $this->qr = $qr;
    }
    public function render()
    {

        return view('livewire.show-q-r', [
            'qr' => $this->qr,
        ]);
    }
}
