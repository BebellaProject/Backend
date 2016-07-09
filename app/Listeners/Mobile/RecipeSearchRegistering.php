<?php

namespace Bebella\Listeners\Mobile;

use Bebella\Search;

use Bebella\Events\Mobile\RecipeWasSearched;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecipeSearchRegistering
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
     * @param  RecipeWasSearched  $event
     * @return void
     */
    public function handle(RecipeWasSearched $event)
    {
        $search = new Search;
        
        $search->type = 'recipe';
        $search->user_id = $event->user->id;
        $search->term = $event->request->term;
        
        $search->save();
    }
}
