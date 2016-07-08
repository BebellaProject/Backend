<?php

namespace Bebella\Listeners\Mobile;

use Bebella\Visualization;

use Bebella\Events\Mobile\ProductOptionWasViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductOptionVisualizationCounting
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
     * @param  ProductOptionWasViewed  $event
     * @return void
     */
    public function handle(ProductOptionWasViewed $event)
    {
        $visualization = new Visualization;
        
        $visualization->user_id = $event->user->id;
        $visualization->recipe_id = $event->recipe->id;
        $visualization->product_option_id = $event->productOption->id;
        
        $visualization->save();
    }
}
