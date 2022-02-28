<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;


    public $tries = 5;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Order $order)
    {
        $order->load(['items', 'address']);
        $order->items->load(['product.media', 'product.category']);
        $order->address->load(['state', 'country']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orders.created');
    }
}
