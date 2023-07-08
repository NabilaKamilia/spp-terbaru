<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $order, $user;

    public function __construct($order, $user)
    {
        parent::__construct();

        $this->order = $order;
        $this->user = $user;
    }

    public function getSnapToken()
    {
        // dd($this->order->spp->nominal);
        $params = [
            'transaction_details' => [
                'order_id' => $this->order->kode_pembayaran,
                'gross_amount' => $this->order->spp->nominal,
                // 'order_id' => $this->order->number,
                // 'gross_amount' => $this->order->total_price,
            ],
            'customer_details' => [
                'first_name' => $this->user->name ?? 'Imel',
                'email' =>  $this->user->email ?? 'imel@gmail.com',
                'phone' => '081234567890',
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
