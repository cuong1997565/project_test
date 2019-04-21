<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exceptions\UserIsPrivate;
use App\Exceptions\CustomException;
use App\User;

class tryCatchController extends Controller
{
	public function getTryCatch($id) {
		throw new UserIsPrivate;
	}
	
	public function getTryCatchUser($id){
		try {
			$user = User::find($id);
			return $user;
		} catch (Exceptions $e) {
			throw new CustomException($e->getMessage());
		}
	}
    

	public function customException(){
		return view('customException');
	}

}
