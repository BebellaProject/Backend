<?php

namespace Bebella;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = [
        "user_id",
        "name",
        "short_desc",
        "desc",
        "image_path",
        "youtube_user",
        "facebook_page",
        "website"
    ];
}
