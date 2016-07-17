<?php

namespace Bebella\Http\Controllers\Api\v1;

use Auth;

use Illuminate\Http\Request;

use Bebella\Favorite;
use Bebella\Recipe;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    
    public function byUser($id) 
    {
        return Recipe::where('recipes.active', true)
					 ->where('favorites.user_id', $id)
					 ->where('favorites.active', true)
					 ->join('favorites', function ($join) {
						$join->on('recipes.id', '=', 'favorites.recipe_id');
					 })
					 ->join('channels', function ($join) {
						$join->on('recipes.channel_id', '=', 'channels.id');
					 })
					 ->select('recipes.*', 'channels.name as channel_name')
					 ->get();
    }
    
    public function add($id) 
    {
        $recipe = Recipe::find($id);
        
        $fav = new Favorite;
        
        $fav->user_id = Auth::guard('api')->user()->id;
        $fav->recipe_id = $id;
        
        $fav->save();
        
        $recipe->like_count += 1;
        
        $recipe->save();
        
        return 1;
    }
    
	public function remove($id) 
    {
        $recipe = Recipe::find($id);
        
        Favorite::where('recipe_id', $id)
			   ->where('user_id', Auth::guard('api')->user()->id)
			   ->update(['active' => false]);

        $recipe->like_count -= 1;
        
        $recipe->save();
        
        return 1;
    }

}
