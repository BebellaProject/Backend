<?php

namespace Bebella;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        "channel_id",
        "type",
        "name",
        "desc"
    ];
}
