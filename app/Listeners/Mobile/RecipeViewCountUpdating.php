<?php

namespace Bebella\Listeners\Mobile;

use Bebella\Events\Mobile\RecipeWasViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecipeViewCountUpdating
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RecipeWasViewed  $event
     * @return void
     */
    public function handle(RecipeWasViewed $event)
    {
        $event->recipe->view_count += 1;
        
        $event->recipe->save();
    }
}
