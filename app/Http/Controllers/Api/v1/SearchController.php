<?php

namespace Bebella\Http\Controllers\Api\v1;

use DB;
use Auth;
use Event;

use Bebella\Recipe;

use Bebella\Events\Mobile\RecipeWasSearched;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class SearchController extends Controller
{
    
    public function searchRecipe(Request $request) 
    {
        $user = Auth::guard('api')->user();
        
        $data = array();
        
        $results = Recipe::where('recipes.active', true)
                         ->where(DB::raw(
                            "recipes.name like '%$request->term%' or recipes.desc like '%$request->term%'"
                         ))
                         ->join('channels', function ($join) {
                            $join->on('recipes.channel_id', '=', 'channels.id');
                        })
                        ->select('recipes.*', 'channels.name as channel_name', 'channels.image_path as channel_image')
                        ->orderBy('recipes.created_at', 'desc')
                        ->take($request->page * 5)
                        ->skip(($request->page - 1) * 5)
                        ->get();
        
        Event::fire(new RecipeWasSearched($user, $request));
        
        $data["result"] = $results;
        $data["term"] = $request->term;
        $data["page"] = $request->page;
        
        return $data;
    }
    
}
