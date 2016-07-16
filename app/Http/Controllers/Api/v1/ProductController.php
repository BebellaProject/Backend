<?php

namespace Bebella\Http\Controllers\Api\v1;

use Event;

use Illuminate\Http\Request;

use Bebella\Product;

use Bebella\Events\Admin\ProductWasCreated;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class ProductController extends Controller
{
    
    public function find($id) 
    {
        return Product::find($id);
    }
    
    public function save(Request $request) 
    {
        $product = Product::create($request->all());
        
        Event::fire(new ProductWasCreated($product, $request));
        
        return $product;
    }
    
    public function all() 
    {
        return Product::where('products.active', true)
                      ->join('categories', function ($join) {
                          $join->on('products.category_id', '=', 'categories.id');
                      })
                      ->select('products.*', 'categories.name as category_name')
                      ->get();
    }
    
    public function edit(Request $request) 
    {
        return Product::where('id', $request->id)
                      ->update(
                        array_except(
                            $request->all(),
                            "api_token"
                        )    
                      );
    }
    
    public function groupByCategory() 
    {
        return collect($this->all())->groupBy('category_name');
    }
    
}
