<?php

namespace Bebella\Http\Controllers\Api\v1;

use Event;

use Bebella\User;
use Bebella\Store;

use Bebella\Events\Admin\UserWasCreated;
use Bebella\Events\Admin\StoreWasCreated;

use Illuminate\Http\Request;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class StoreController extends Controller
{

    public function all() 
    {
        return Store::where('stores.active', true)
                      ->join('users', function ($join) {
                          $join->on('stores.user_id', '=', 'users.id');
                      })
                      ->select('stores.*', 'users.name as user_name')
                      ->get();
    }
    
    public function save(Request $request) 
    {
        $user = User::create([
            "type" => "store",
            "name" => $request->user_name,
            "email" => $request->user_email,
            "password" => bcrypt($request->user_password)
        ]);
        
        Event::fire(new UserWasCreated($user, $request));
        
        $store = Store::create(
            array_merge(
                [ "user_id" => $user->id ],
                $request->all()   
            )
        );
        
        Event::fire(new StoreWasCreated($store, $request));
        
        return $store;
    }
   
}
