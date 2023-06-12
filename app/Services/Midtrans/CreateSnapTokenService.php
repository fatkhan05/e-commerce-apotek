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
        $params = [
            'transaction_details' => [
                'name' => $this->order->name,
                'order_id' => $this->order->number,
                'gross_amount' => $this->order->total_price,
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => $this->order->total_price,
                    'quantity' => 1,
                    'name' => 'Paracetamol',
                ],
                [
                    'id' => 2,
                    'price' => $this->order->total_price,
                    'quantity' => 2,
                    'name' => 'Amoxcilin',
                ],
            ],
            'customer_details' => [
                'first_name' => 'Fatkhan Akbar',
                'email' => 'fatkhanakbar46@gmail.com',
                'phone' => '081266473374',
            ]
        ];
 
        $snapToken = Snap::getSnapToken($params);
 
        return $snapToken;
    }
}