<?php

namespace Bebella\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class IndexController extends Controller
{
    
    public function getIndex() 
    {
        return view('admin.index');
    }
    
}
