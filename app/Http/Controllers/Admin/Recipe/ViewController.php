<?php

namespace Bebella\Http\Controllers\Admin\Recipe;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function getNew() 
    {
        return view('admin.recipe.new');
    }
    
    public function getList() 
    {
        return view('admin.recipe.list');
    }
}
