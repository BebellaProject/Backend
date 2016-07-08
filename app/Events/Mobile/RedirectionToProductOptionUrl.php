<?php

namespace Bebella\Events\Mobile;

use Bebella\User;
use Bebella\ProductOption;
use Bebella\Recipe;

use Bebella\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RedirectionToProductOptionUrl extends Event
{
    use SerializesModels;

    public $user;
    public $recipe;
    public $productOption;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Recipe $recipe, ProductOption $productOption)
    {
        $this->user = $user;
        $this->recipe = $recipe;
        $this->productOption = $productOption;
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
