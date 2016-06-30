<?php

namespace Bebella\Listeners\Admin;

use Storage;

use Bebella\Events\Admin\ProductWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductImageSaving
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
     * @param  ProductWasCreated  $event
     * @return void
     */
    public function handle(ProductWasCreated $event)
    {
        if ($event->request->image) 
        {
            $base64_str = substr($event->request->image, strpos($event->request->image, ",")+1);
            $image = base64_decode($base64_str);
            
            $f = finfo_open();
            $mime_type = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
            $parts = explode('/', $mime_type);
            $ext = $parts[1]; 
            
            $filename = "images/product/" . $event->product->id . "." . $ext;

            Storage::put($filename, $image);

            $event->product->image_path = "storage/" . $filename;

            $event->product->save();    
        }
    }
}
