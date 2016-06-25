<?php

namespace Bebella\Http\Controllers\Admin\User;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class ViewController extends Controller
{

    public function getNew() 
    {
        return view('admin.user.new');
    }
    
    public function getList() 
    {
        return view('admin.user.list');
    }
   
}
