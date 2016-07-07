<?php

namespace Bebella\Events\Admin;

use Bebella\ProductOption;
use Illuminate\Http\Request;

use Bebella\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProductOptionWasCreated extends Event
{
    use SerializesModels;

    public $productOption;
    public $request;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ProductOption $productOption, Request $request)
    {
        $this->productOption = $productOption;
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
