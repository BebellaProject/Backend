<?php

namespace Bebella\Events\Admin;

use Bebella\Category;

use Bebella\Events\Event;

use Illuminate\Http\Request;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CategoryWasCreated extends Event
{
    use SerializesModels;

    public $category;
    public $request;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Category $category, Request $request)
    {
        $this->category = $category;
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
