<?php

namespace Bebella\Http\Controllers\Api\v1;

use Auth;
use Event;
use Illuminate\Http\Request;
use Bebella\Recipe;
use Bebella\RecipeTag;
use Bebella\RecipeStep;
use Bebella\RecipeProduct;
use Bebella\RecipeComment;
use Bebella\Events\Admin\RecipeWasCreated;
use Bebella\Events\Admin\RecipeWasEdited;
use Bebella\Events\Admin\RecipeStepWasCreated;
use Bebella\Events\Mobile\RecipeWasViewed;
use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class RecipeController extends Controller
{

    public function find($id)
    {
        $recipe = Recipe::where('recipes.id', $id)
                ->join('channels', function ($join)
                {
                    $join->on('recipes.channel_id', '=', 'channels.id');
                })
                ->select(
                        'recipes.*', 'channels.name as channel_name', 'channels.image_path as channel_image'
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
                ->join('products', function ($join)
                {
                    $join->on('recipe_products.product_id', '=', 'products.id');
                })
                ->select(
                        'recipe_products.*', 'products.name as product_name', 'products.short_desc as product_desc', 'products.image_path as product_image'
                )
                ->get();

        $recipe["comments"] = RecipeComment::where('recipe_comments.active', true)
                ->where('recipe_comments.recipe_id', $recipe->id)
                ->join('users', function ($join)
                {
                    $join->on('users.id', '=', 'recipe_comments.user_id');
                })
                ->select(
                        'recipe_comments.*', 'users.name as user_name', 'users.image_path as user_image'
                )
                ->orderBy('recipe_comments.created_at', 'desc')
                ->take(10)
                ->get();

        $array = array();

        $last = Recipe::where('recipes.channel_id', $recipe->channel_id)
                ->where('recipes.active', true)
                ->where('recipes.type', $recipe->type)
                ->where('recipes.id', '!=', $recipe->id)
                ->join('channels', function ($join)
                {
                    $join->on('recipes.channel_id', '=', 'channels.id');
                })
                ->select(
                        'recipes.*', 'channels.name as channel_name'
                )
                ->orderBy('recipes.created_at', 'desc')
                ->first();

        array_push($array, $last);

        $bests = Recipe::where('recipes.channel_id', $recipe->channel_id)
                ->where('recipes.active', true)
                ->where('recipes.type', $recipe->type)
                ->where('recipes.id', '!=', $recipe->id)
                ->join('channels', function ($join)
                {
                    $join->on('recipes.channel_id', '=', 'channels.id');
                })
                ->select(
                        'recipes.*', 'channels.name as channel_name'
                )
                ->orderBy('recipes.like_count', 'desc')
                ->take(3)
                ->get();

        foreach ($bests as $item)
        {
            if ($item->id != $last->id)
            {
                array_push($array, $item);
            }
        }

        if (count($array) <= 4)
        {
            $others = Recipe::where('recipes.active', true)
                    ->where('recipes.type', $recipe->type)
                    ->where('recipes.id', '!=', $recipe->id)
                    ->whereNotIn('recipes.id', collect($array)->map(function ($e)
                            {
                                return $e->id;
                            }))
                    ->join('channels', function ($join)
                    {
                        $join->on('recipes.channel_id', '=', 'channels.id');
                    })
                    ->select(
                            'recipes.*', 'channels.name as channel_name'
                    )
                    ->orderBy('recipes.like_count', 'desc')
                    ->take(4 - count($array))
                    ->get();

            foreach ($others as $other)
            {
                array_push($array, $other);
            }
        }

        if (count($array) <= 4)
        {
            $others = Recipe::where('recipes.active', true)
                    ->where('recipes.id', '!=', $recipe->id)
                    ->whereNotIn('recipes.id', collect($array)->map(function ($e)
                            {
                                return $e->id;
                            }))
                    ->join('channels', function ($join)
                    {
                        $join->on('recipes.channel_id', '=', 'channels.id');
                    })
                    ->select(
                            'recipes.*', 'channels.name as channel_name'
                    )
                    ->orderBy('recipes.like_count', 'desc')
                    ->take(4 - count($array))
                    ->get();

            foreach ($others as $other)
            {
                array_push($array, $other);
            }
        }

        $recipe["related"] = $array;

        return $recipe;
    }
    
    public function comment($id, Request $request) 
    {
        $user = Auth::guard('api')->user();
        
        $comment = RecipeComment::create([
            "user_id" => $user->id,
            "recipe_id" => $id,
            "comment" => $request->text
        ]);
        
        $comment["user_name"] = $user->name;
        $comment["user_image"] = $user->image_path;
        
        return $comment;
    }

    public function paginateWithFilters($page, Request $request)
    {
        $filters = array();
        $response = array();

        foreach ($request->all() as $key => $value)
        {
            if ($value)
                array_push($filters, $key);
        }

        $data = Recipe::where('recipes.active', true)
                ->whereIn('recipes.type', $filters)
                ->join('channels', function ($join)
                {
                    $join->on('recipes.channel_id', '=', 'channels.id');
                })
                ->select('recipes.*', 'channels.name as channel_name', 'channels.image_path as channel_image')
                ->orderBy('recipes.created_at', 'desc')
                ->take($page * 5)
                ->skip(($page - 1) * 5)
                ->get();

        $response["data"] = $data;
        $response["page"] = $page;

        return $response;
    }

    public function trendingWithFilters($page, Request $request)
    {
        $filters = array();
        $response = array();

        foreach ($request->all() as $key => $value)
        {
            if ($value)
                array_push($filters, $key);
        }

        $data = Recipe::where('recipes.active', true)
                ->whereIn('recipes.type', $filters)
                ->join('channels', function ($join)
                {
                    $join->on('recipes.channel_id', '=', 'channels.id');
                })
                ->select('recipes.*', 'channels.name as channel_name', 'channels.image_path as channel_image')
                ->orderBy('recipes.view_count', 'desc')
                ->take($page * 5)
                ->skip(($page - 1) * 5)
                ->get();

        $response["data"] = $data;
        $response["page"] = $page;

        return $response;
    }

    public function all()
    {
        return Recipe::where('recipes.active', true)
                        ->join('channels', function ($join)
                        {
                            $join->on('recipes.channel_id', '=', 'channels.id');
                        })
                        ->select('recipes.*', 'channels.name as channel_name', 'channels.image_path as channel_image')
                        ->orderBy('recipes.created_at', 'desc')
                        ->get();
    }

    public function trending()
    {
        return Recipe::where('recipes.active', true)
                        ->join('channels', function ($join)
                        {
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

    public function edit(Request $request)
    {
        Recipe::where('id', $request->id)
                ->update([
                    "name" => $request->name,
                    "desc" => $request->desc,
                    "channel_id" => $request->id,
                    "type" => $request->type
        ]);

        if ($request->main_image)
        {
            Event::fire(new RecipeWasEdited($recipe, $request));
        }

        RecipeTag::where('recipe_id', $request->id)
                ->update([
                    'active' => false
        ]);

        foreach ($request->tags as $key => $value)
        {
            $tag = new RecipeTag;

            $tag->recipe_id = $request->id;
            $tag->name = $value["name"];

            $tag->save();
        }

        RecipeProduct::where('recipe_id', $request->id)
                ->update([
                    'active' => false
        ]);

        foreach ($request->products as $key => $value)
        {
            $product = new RecipeProduct;

            $product->recipe_id = $request->id;
            $product->product_id = $value["product_id"];

            $product->save();
        }

        RecipeStep::where('recipe_id', $request->id)
                ->update([
                    'active' => false
        ]);

        foreach ($request->steps as $key => $value)
        {
            $step = new RecipeStep;

            $step->recipe_id = $request->id;
            $step->desc = $value["desc"];
            $step->order = $key + 1;

            $step->save();

            if (array_has($value, "image"))
            {
                Event::fire(new RecipeStepWasCreated($step, $value));
            } else
            {
                $step->image_path = $value["image_path"];

                $step->save();
            }
        }

        return 1;
    }

}
