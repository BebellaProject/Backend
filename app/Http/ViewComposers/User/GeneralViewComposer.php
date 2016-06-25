<?php

namespace Bebella\Http\ViewComposers\User;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\View;

class GeneralViewComposer
{
    
    public function __construct()
    {
    }
    
    public function compose(View $view)
    {
        $view->with('STATIC_URL', env('APP_URL') . '/static/user');
    }
}