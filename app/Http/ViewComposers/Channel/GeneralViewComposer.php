<?php

namespace Bebella\Http\ViewComposers\Channel;

use Auth;

use Bebella\Channel;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\View;

class GeneralViewComposer
{
    
    public function __construct()
    {
    }
    
    public function compose(View $view)
    {
        $view->with('STATIC_URL', env('APP_URL') . '/static/channel');
        $view->with('CHANNEL', Channel::where('user_id', Auth::user()->id)
                                      ->first());
        $view->with('API_TOKEN', Auth::user()->api_token);
    }
}