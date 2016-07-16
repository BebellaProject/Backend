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
        return Favorite::where('favorites.active', true)
                       ->where('favorites.user_id', $id)
                       ->get();
    }
    
    public function add($id) 
    {
        $recipe = Recipe::find($id);
        
        $fav = new Favorite;
        
        $fav->user_id = Auth::guard('user')->user()->id;
        $fav->recipe_id = $id;
        
        $fav->save();
        
        $recipe->like_count += 1;
        
        $recipe->save();
        
        return $fav;
    }
    
}
