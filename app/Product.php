<?php

namespace Bebella;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "category_id",
        "name",
        "short_desc",
        "desc"
    ];
}
