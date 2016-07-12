<?php

namespace Bebella\Http\Controllers\Channel\Profile;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class ViewController extends Controller
{
    
    public function getIndex() 
    {
        return view('channel.profile.index');
    }
    
}
