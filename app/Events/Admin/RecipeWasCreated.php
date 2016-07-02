<?php

namespace Bebella\Events\Admin;

use Bebella\Recipe;

use Illuminate\Http\Request;

use Bebella\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RecipeWasCreated extends Event
{
    use SerializesModels;

    public $recipe;
    public $request;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Recipe $recipe, Request $request)
    {
        $this->recipe = $recipe;
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
