<?php

namespace Bebella\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use Event;

use Bebella\User;
use Bebella\Channel;

use Bebella\Events\Admin\UserWasCreated;
use Bebella\Events\Admin\ChannelWasCreated;

use Bebella\Http\Requests;
use Bebella\Http\Controllers\Controller;

class ChannelController extends Controller
{

    public function all() 
    {
        return Channel::where('channels.active', true)
                      ->join('users', function ($join) {
                          $join->on('channels.user_id', '=', 'users.id');
                      })
                      ->select('channels.*', 'users.name as user_name')
                      ->get();
    }
    
    public function save(Request $request) 
    {
        $user = User::create([
            "type" => "channel",
            "name" => $request->user_name,
            "email" => $request->user_email,
            "password" => $request->user_password
        ]);
        
        Event::fire(new UserWasCreated($user, $request));
        
        $channel = Channel::create(
            array_merge(
                [ "user_id" => $user->id ],
                $request->all()   
            )
        );
        
        Event::fire(new ChannelWasCreated($channel, $request));
        
        return $channel;
    }
    
}
