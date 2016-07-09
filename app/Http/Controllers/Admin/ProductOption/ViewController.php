<?php

namespace Bebella\Http\Controllers\Admin\ProductOption;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function getNew() 
    {
        return view('admin.product_option.new');
    }
    
    public function getList() 
    {
        return view('admin.product_option.list');
    }
    
    public function getDetail() 
    {
        return view('admin.product_option.detail');
    }
    
}
