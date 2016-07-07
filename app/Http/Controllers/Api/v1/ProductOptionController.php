<?php

namespace Bebella\Http\Controllers\Api\v1;

use Event;

use Bebella\ProductOption;

use Bebella\Events\Admin\ProductOptionWasCreated;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class ProductOptionController extends Controller
{
    public function getStoreUrl($id) 
    {
        $productOption = ProductOption::find($id);
        
        return $productOption->store_url;
    }
    
    public function save(Request $request) 
    {
        $productOption = ProductOption::create($request->all());
        
        Event::fire(new ProductOptionWasCreated($productOption, $request));
        
        return $productOption;
    }
    
    public function all() 
    {
        return ProductOption::where('product_options.active', true)
                            ->join('products', function ($join) {
                                $join->on('product_options.product_id' , '=', 'products.id');
                            })
                            ->join('stores', function ($join) {
                                $join->on('product_options.store_id' , '=', 'stores.id');
                            })
                            ->select(
                                "product_options.*",
                                "products.name as product_name",    
                                "stores.name as store_name"
                            )->get();
    }
    
    public function byProduct($id) 
    {
        return ProductOption::where('product_options.active', true)
                            ->where('product_options.product_id', $id)
                            ->join('products', function ($join) {
                                $join->on('product_options.product_id' , '=', 'products.id');
                            })
                            ->join('stores', function ($join) {
                                $join->on('product_options.store_id' , '=', 'stores.id');
                            })
                            ->select(
                                "product_options.*",
                                "products.name as product_name",    
                                "stores.name as store_name",
                                "stores.image_path as store_image"    
                            )->get();
    }
    
}
