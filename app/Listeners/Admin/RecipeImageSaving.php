<?php

namespace Bebella\Listeners\Admin;

use Storage;

use Bebella\Events\Admin\RecipeWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecipeImageSaving
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
     * @param  RecipeWasCreated  $event
     * @return void
     */
    public function handle(RecipeWasCreated $event)
    {
        if ($event->request->main_image) 
        {
            $base64_str = substr($event->request->main_image, strpos($event->request->main_image, ",")+1);
            $image = base64_decode($base64_str);
            
            $f = finfo_open();
            $mime_type = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
            $parts = explode('/', $mime_type);
            $ext = $parts[1]; 
            
            $filename = "images/recipe/" . time() . "-" . $event->recipe->id . "." . $ext;

            Storage::put($filename, $image);

            $event->recipe->image_path = "storage/" . $filename;

            $event->recipe->save();    
        }
    }
}
