<?php

namespace Bebella\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
           ['admin.*', 'auth.*', 'channel.*', 'store.*', 'user.*', 'web.*'],
           'Bebella\Http\ViewComposers\GeneralViewComposer'
        );
        
        view()->composer(
           ['admin.*'],
           'Bebella\Http\ViewComposers\Admin\GeneralViewComposer'
        );
        
        view()->composer(
           ['auth.*'],
           'Bebella\Http\ViewComposers\Auth\GeneralViewComposer'
        );
        
        view()->composer(
           ['channel.*'],
           'Bebella\Http\ViewComposers\Channel\GeneralViewComposer'
        );
        
        view()->composer(
           ['store.*'],
           'Bebella\Http\ViewComposers\Store\GeneralViewComposer'
        );
        
        view()->composer(
           ['user.*'],
           'Bebella\Http\ViewComposers\User\GeneralViewComposer'
        );
        
        view()->composer(
           ['web.*'],
           'Bebella\Http\ViewComposers\Web\GeneralViewComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
