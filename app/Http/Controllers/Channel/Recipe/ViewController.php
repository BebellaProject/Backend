<?php

namespace Bebella\Http\Controllers\Channel\Recipe;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class ViewController extends Controller
{
    
    public function getList() 
    {
        return view('channel.recipe.list');
    }
    
    public function getNew() 
    {
        return view('channel.recipe.new');
    }
    
}
