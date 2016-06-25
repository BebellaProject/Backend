<?php

namespace Bebella\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class ViewController extends Controller
{
    
    public function getIndex() 
    {
        return view('admin.dashboard.index');
    }
    
}
