<?php

namespace Bebella\Events\Admin;

use Bebella\RecipeStep;

use Bebella\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RecipeStepWasCreated extends Event
{
    use SerializesModels;

    public $step;
    public $request;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(RecipeStep $step, $request)
    {
        $this->step = $step;
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
