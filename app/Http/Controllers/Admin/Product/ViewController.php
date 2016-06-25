<?php

namespace Bebella\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function getNew() 
    {
        return view('admin.product.new');
    }
    
    public function getList() 
    {
        return view('admin.product.list');
    }
}
