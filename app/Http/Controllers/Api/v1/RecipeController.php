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

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class RecipeController extends Controller
{
 
    public function all() 
    {
        return Recipe::where('recipes.active', true)
                     ->join('channels', function ($join) {
                         $join->on('recipes.channel_id', '=', 'channels.id');
                     })
                     ->select('recipes.*', 'channels.name as channel_name')
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
