<?php

namespace Bebella\Listeners\Admin;

use Storage;

use Bebella\Events\Admin\UserWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserImageSaving
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        if ($event->request->profile_image) 
        {
            $base64_str = substr($event->request->profile_image, strpos($event->request->profile_image, ",")+1);
            $image = base64_decode($base64_str);
            
            $f = finfo_open();
            $mime_type = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
            $parts = explode('/', $mime_type);
            $ext = $parts[1]; 
            
            $filename = "images/user/" . $event->user->id . "." . $ext;

            Storage::put($filename, $image);

            $event->user->image_path = "storage/" . $filename;

            $event->user->save();    
        }
    }
}
