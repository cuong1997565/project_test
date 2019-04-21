<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Rules\CheckEvenRule;

class CustomValidateController extends Controller
{
    public function getCustom()
    {
    	return view('custom.validate');
    }

    public function postCustom(Request $request)
    {
    	$this->validate($request,[
            'title' => 'required|is_even'
    	]);
    	print_r('done');
    }

    public function index()
    {
    	return view('custom.myForm');
    }

    
    public function store()
    {
    	$input = request()->validate([
    		'name'   	=> 'required',
    		'number'	=>	[
    			'required',
    			new CheckEvenRule()
    		]
    	]);
    	dd("You can proceed now...");
    }

    public function getValidateModelImageEvent() 
    {
        return view('image_product_validate_model');
    }

    public function postValidateModelImageEvent(Request $request) 
    {

    }
}
