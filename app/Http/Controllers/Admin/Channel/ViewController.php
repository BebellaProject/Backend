<?php

namespace Bebella\Http\Controllers\Admin\Channel;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class ViewController extends Controller
{

    public function getNew() 
    {
        return view('admin.channel.new');
    }
    
    public function getList() 
    {
        return view('admin.channel.list');
    }
    
}
