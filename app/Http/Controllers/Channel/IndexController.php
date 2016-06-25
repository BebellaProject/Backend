<?php

namespace Bebella\Http\Controllers\Channel;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class IndexController extends Controller
{
    
    public function getIndex() 
    {
        return view('channel.index');
    }
    
}
