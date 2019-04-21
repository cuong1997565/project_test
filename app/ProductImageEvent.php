<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImageEvent extends Model
{
        protected $table = "product_image_events";
		protected $fillable = ['name','price','content'];

        // protected $events = [
        // 	'created' => Events\NewProduct::class
        // ];

}
