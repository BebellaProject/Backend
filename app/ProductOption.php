<?php

namespace Bebella;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $fillable = [
        "store_id",
        "product_id",
        "name",
        "desc",
        "price",
        "store_url",
        "image_path"
    ];
}
