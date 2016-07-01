<?php

namespace Bebella\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Bebella\Events\Admin\CategoryWasCreated' => [
            'Bebella\Listeners\Admin\CategoryImageSaving',
        ],
        
        'Bebella\Events\Admin\ProductWasCreated' => [
            'Bebella\Listeners\Admin\ProductImageSaving',
        ],
        
        'Bebella\Events\Admin\UserWasCreated' => [
            'Bebella\Listeners\Admin\UserImageSaving',
        ],
        
        'Bebella\Events\Admin\ChannelWasCreated' => [
            'Bebella\Listeners\Admin\ChannelImageSaving',
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
