<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Jobs\InsertDataJob;
use Illuminate\Support\Facades\Redirect;
use App\User;

class InsertUserController extends Controller
{
    
    public function insertData () {
    	$data =
    	[
 		   ['username'=>'teo','email'=>'teo@gmail.com','password'=>Hash::make(12345),'level'=>1],
           ['username'=>'tun','email'=>'tun@gmail.com','password'=>Hash::make(12345),'level'=>2],
           ['username'=>'tuan','email'=>'tuan@gmail.com','password'=>Hash::make(12345),'level'=>3]
    	];
        
    	InsertDataJob::dispatch($data);
    	return "insert data success";


    }
}
