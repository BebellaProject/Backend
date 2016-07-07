<?php

namespace Bebella\Listeners\Admin;

use Storage;

use Bebella\Events\Admin\ProductOptionWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductOptionImageSaving
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
     * @param  ProductOptionWasCreated  $event
     * @return void
     */
    public function handle(ProductOptionWasCreated $event)
    {
        if ($event->request->image) 
        {
            $base64_str = substr($event->request->image, strpos($event->request->image, ",")+1);
            $image = base64_decode($base64_str);
            
            $f = finfo_open();
            $mime_type = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
            $parts = explode('/', $mime_type);
            $ext = $parts[1]; 
            
            $filename = "images/product_option/" . time() . "-" . $event->productOption->id . "." . $ext;

            Storage::put($filename, $image);

            $event->productOption->image_path = "storage/" . $filename;

            $event->productOption->save();    
        }
    }
}
