<?php

namespace Bebella\Http\Controllers\Admin\Store;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class ViewController extends Controller
{
    
    public function getNew() 
    {
        return view('admin.store.new');
    }
    
    public function getList() 
    {
        return view('admin.store.list');
    }
    
}
