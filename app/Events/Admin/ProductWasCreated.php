<?php

namespace Bebella\Events\Admin;

use Illuminate\Http\Request;

use Bebella\Product;

use Bebella\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProductWasCreated extends Event
{
    use SerializesModels;

    public $product;
    public $request;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Product $product, Request $request)
    {
        $this->product = $product;
        $this->request = $request;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
