<?php

namespace Bebella\Http\Controllers\Api\v1;

use Event;

use Illuminate\Http\Request;

use Bebella\Recipe;
use Bebella\RecipeTag;
use Bebella\RecipeStep;
use Bebella\RecipeProduct;

use Bebella\Events\Admin\RecipeWasCreated;
use Bebella\Events\Admin\RecipeStepWasCreated;
use Bebella\Events\Mobile\RecipeWasViewed;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class RecipeController extends Controller
{
    
    public function find($id) 
    {
        $recipe = Recipe::where('recipes.id', $id)
                        ->join('channels', function ($join) {
                            $join->on('recipes.channel_id', '=', 'channels.id');
                        })
                        ->select(
                            'recipes.*', 
                            'channels.name as channel_name',
                            'channels.image_path as channel_image'
                        )
                        ->first();
        
        Event::fire(new RecipeWasViewed($recipe));                
                        
        $recipe["tags"] = RecipeTag::where('recipe_id', $id)
                                   ->where('active', true)
                                   ->get();
        
        $recipe["steps"] = RecipeStep::where('recipe_id', $id)
                                     ->where('active', true)
                                     ->get();
        
        $recipe["products"] = RecipeProduct::where('recipe_products.recipe_id', $id)
                                           ->where('recipe_products.active', true)
                                           ->join('products', function ($join) {
                                               $join->on('recipe_products.product_id', '=', 'products.id');
                                           })
                                           ->select(
                                               'recipe_products.*',
                                               'products.name as product_name',
                                               'products.short_desc as product_desc',
                                               'products.image_path as product_image'
                                           )
                                           ->get();
                                           
        return $recipe;
    }
 
    public function all() 
    {
        return Recipe::where('recipes.active', true)
                     ->join('channels', function ($join) {
                         $join->on('recipes.channel_id', '=', 'channels.id');
                     })
                     ->select('recipes.*', 'channels.name as channel_name', 'channels.image_path as channel_image')
                     ->get();
    }
    
    public function trending() 
    {
        return Recipe::where('recipes.active', true)
                     ->join('channels', function ($join) {
                         $join->on('recipes.channel_id', '=', 'channels.id');
                     })
                     ->select('recipes.*', 'channels.name as channel_name', 'channels.image_path as channel_image')
                     ->orderBy('recipes.view_count', 'desc')
                     ->get();
    }
    
    public function save(Request $request) 
    {
        $recipe = Recipe::create($request->all());
        
        Event::fire(new RecipeWasCreated($recipe, $request));
        
        foreach ($request->tags as $key => $value) 
        {
            $tag = new RecipeTag;
            
            $tag->recipe_id = $recipe->id;
            $tag->name = $value["name"];
            
            $tag->save();
        }
        
        foreach ($request->steps as $key => $value) 
        {
            $step = new RecipeStep;
            
            $step->recipe_id = $recipe->id;
            $step->desc = $value["desc"];
            $step->order = $key + 1;
            
            $step->save();
            
            Event::fire(new RecipeStepWasCreated($step, $value));
        }
        
        foreach ($request->products as $key => $value) 
        {
            $product = new RecipeProduct;
            
            $product->recipe_id = $recipe->id;
            $product->product_id = $value["product_id"];
            
            $product->save();
        }
        
        return $recipe;
    }
    
}
