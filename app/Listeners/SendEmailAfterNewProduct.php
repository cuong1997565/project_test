<?php

namespace App\Listeners;

use App\Events\NewProduct;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use File;
use App\ProductImageEvent;
class SendEmailAfterNewProduct
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
     * @param  NewProduct  $event
     * @return void
     */
    public function handle(NewProduct $event)
    {
        ProductImageEvent::insert($event->product);
        // $fileName = $event->product->id.'.txt';
        // $data = 'Sản phẩm mới tạo : '. $event->product->name. 'với ID: '.$event->product->id;
        // File::put(public_path('event/txt/'.$fileName),$data);
        // return true;
    }
}
