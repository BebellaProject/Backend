<?php

namespace Bebella\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class ViewController extends Controller
{
    
    public function getNew() 
    {
        return view('admin.category.new');
    }
    
    public function getList() 
    {
        return view('admin.category.list');
    }
    
}
