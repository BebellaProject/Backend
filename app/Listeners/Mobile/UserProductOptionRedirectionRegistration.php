<?php

namespace Bebella\Listeners\Mobile;

use Bebella\Redirection;

use Bebella\Events\Mobile\RedirectionToProductOptionUrl;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserProductOptionRedirectionRegistration
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
     * @param  RedirectionToProductOptionUrl  $event
     * @return void
     */
    public function handle(RedirectionToProductOptionUrl $event)
    {
        $redirection = new Redirection;
        
        $redirection->user_id = $event->user->id;
        $redirection->product_option_id = $event->productOption->id;
        $redirection->recipe_id = $event->recipe->id;
        $redirection->url = $event->productOption->store_url;
        
        $redirection->save();
    }
}
