<?php

namespace Bebella\Events\Admin;

use Bebella\Store;

use Illuminate\Http\Request;

use Bebella\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StoreWasCreated extends Event
{
    use SerializesModels;

    public $store;
    public $request;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Store $store, Request $request)
    {
        $this->store = $store;
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
