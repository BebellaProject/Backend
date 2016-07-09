<?php

namespace Bebella\Http\Controllers\Api\v1;

use Event;

use Bebella\User;

use Bebella\Events\Admin\UserWasCreated;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class UserController extends Controller
{
    
    public function all() 
    {
        return User::get();
    }
    
    public function save(Request $request) 
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "type" => $request->type,
            "password" => bcrypt($request->password),
            "api_token" => str_random(120)
        ]);
        
        Event::fire(new UserWasCreated($user, $request));
        
        return $user;
    }
    
}
