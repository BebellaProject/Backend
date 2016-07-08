<?php

namespace Bebella\Listeners\Mobile;

use Bebella\Click;

use Bebella\Events\ProductOptionWasClicked;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductOptionClickCounting
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
     * @param  ProductOptionWasClicked  $event
     * @return void
     */
    public function handle(ProductOptionWasClicked $event)
    {
        $click = new Click;
        
        $click->user_id = $event->user->id;
        $click->recipe_id = $event->recipe->id;
        $click->product_option_id = $event->productOption->id;
        
        $click->save();
    }
}
