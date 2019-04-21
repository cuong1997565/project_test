<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\ProductImageEvent;
class NewProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $products;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($product)
    {
       $this->products = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ProductImageEvent::insert($this->products);
    }
}
