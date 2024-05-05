<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getSnapToken()
    {
        $params = array(
            'transaction_details' => array(
                'order_id' => $this->order->no_pesanan,
                'gross_amount' => $this->order->total_harga,
            ),
            'customer_details' => array(
                'first_name' => $this->order->customer->nama,
                'email' => $this->order->customer->user->email,
            ),
        );

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
