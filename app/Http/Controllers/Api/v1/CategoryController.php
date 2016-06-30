<?php

namespace Bebella\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use Event;

use Bebella\Category;
use Bebella\Events\Admin\CategoryWasCreated;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class CategoryController extends Controller
{
    
    public function find ($id) 
    {
        return Category::find($id);
    }
    
    public function all() 
    {
        return Category::where('active', true)
                       ->get();
    }
    
    public function save(Request $request) 
    {
        $category = Category::create($request->all());
        
        Event::fire(new CategoryWasCreated($category, $request));
        
        return $category;
    }
    
    public function edit(Request $request) 
    {
        return Category::where('id', $request->id)
                       ->update($request->all());
    }
    
}
