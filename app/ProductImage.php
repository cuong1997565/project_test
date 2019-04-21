<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table ="product_images";
    protected $fillable = ['id','image','product_id'];
    // protected $timestamps = false;

    public function product(){
          return $this->belongTo('App\Product');
    }
}
