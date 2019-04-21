<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Event;
use App\Events\NewProduct;
use App\ProductImageEvent;

use App\Jobs\NewProductJob;

use Validator;
use DB;
use Carbon\Carbon;
class ImageEvent extends Controller
{
     public function getImageEvent()
    {
    	return view("image_product");
    }

    public function postImageEvent(Request $request)
    {
    	$validator = Validator::make($request->all(),
    	[
    		'name'    	 => 'required|max:255',
    		'price'      => 'required',
            'content'    => 'required',
            'demo_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    	]);
    	if($validator->fails())
    	{
    		return redirect('image-event')->withErrors($validator)->withInput();
    	} else {
    		$image = $request->file('demo_image');
	    	$demo_image = time().'.'.$image->getClientOriginalExtension();
	    	$destinationPath = public_path('event/image');
	    	$image->move($destinationPath, $demo_image);

	    	$data = [
	    			'name' 		=>	 $request->input('name'),
	    			'price'   	=> 	 $request->input('price'),
	    			'content'	=>   $request->input('content'),
	    			'image_path'=>	 $demo_image	
	    		];
	    	// $product_id = DB::table('product_image_events')->insertGetId($data);
	    	// $product = ProductImageEvent::find($product_id);
	    	event(new NewProduct($data));
            return redirect('image-event')->with('message','Sản phẩm được tạo thành công');

	    	// return redirect('image-event')->with('message','Sản phẩm được tạo thành công với ID: '.$product_id);
    	}
    }


    public function getImageJob () {
        return view("image_product_job");
    }

    public function postImageJob (Request $request) {
        $validator = Validator::make($request->all(),
        [
            'name'       => 'required|max:255',
            'price'      => 'required',
            'content'    => 'required',
            'demo_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($validator->fails()){
            return redirect('image-job')->withErrors($validator)->withInput();
        } else {
            $image = $request->file('demo_image');
            $demo_image = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('job/image');
            $image->move($destinationPath, $demo_image);

            $data = [
                'name'      =>  $request->input('name'),
                'price'     =>   $request->input('price'),
                'content'   =>   $request->input('content'),
                'image_path'=>   $demo_image
            ];
            $job = (new NewProductJob($data))->delay(Carbon::now()->addSeconds(90));
            dispatch($job);
            return redirect('image-job')->with('message','Sản phẩm được tạo thành công');

        }
    }
}
