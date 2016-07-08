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
        
        'Bebella\Events\Admin\ProductOptionWasCreated' => [
            'Bebella\Listeners\Admin\ProductOptionImageSaving',
        ],
        
        'Bebella\Events\Admin\UserWasCreated' => [
            'Bebella\Listeners\Admin\UserImageSaving',
        ],
        
        'Bebella\Events\Admin\ChannelWasCreated' => [
            'Bebella\Listeners\Admin\ChannelImageSaving',
        ],
        
        'Bebella\Events\Admin\RecipeWasCreated' => [
            'Bebella\Listeners\Admin\RecipeImageSaving',
        ],
        
        'Bebella\Events\Admin\StoreWasCreated' => [
            'Bebella\Listeners\Admin\StoreImageSaving',
        ],
        
        'Bebella\Events\Admin\RecipeStepWasCreated' => [
            'Bebella\Listeners\Admin\RecipeStepImageSaving',
        ],
        
        'Bebella\Events\Mobile\RecipeWasViewed' => [
            'Bebella\Listeners\Mobile\RecipeViewCountUpdating',
        ],
        
        'Bebella\Events\Mobile\RedirectionToProductOptionUrl' => [
            'Bebella\Listeners\Mobile\UserProductOptionRedirectionRegistration',
        ],
        
        'Bebella\Events\Mobile\ProductOptionWasViewed' => [
            'Bebella\Listeners\Mobile\ProductOptionVisualizationCounting',
        ],
        
        'Bebella\Events\Mobile\ProductOptionWasClicked' => [
            'Bebella\Listeners\Mobile\ProductOptionClickCounting',
        ],
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
