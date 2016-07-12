<?php

namespace Bebella;

use Illuminate\Database\Eloquent\Model;

class RecipeComment extends Model
{
    protected $fillable = [
        "user_id",
        "recipe_id",
        "comment"
    ];
}
