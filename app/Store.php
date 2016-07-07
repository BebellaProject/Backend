<?php

namespace Bebella;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        "user_id",
        "name",
        "short_desc",
        "desc",
        "image_path",
        "website",
        "facebook_page"
    ];
}
