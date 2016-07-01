<?php

namespace Bebella\Events\Admin;

use Bebella\Channel;

use Bebella\Events\Event;

use Illuminate\Http\Request;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChannelWasCreated extends Event
{
    use SerializesModels;

    public $channel;
    public $request;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Channel $channel, Request $request)
    {
        $this->channel = $channel;
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
