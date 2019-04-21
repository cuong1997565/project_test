<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\API\ApiError;

class UserControllerTryCatch extends Controller
{
	public function index() {
		return view('users.index');
	}

	public function search(Request $request) {
		try {
			$user = User::findOrFail($request->input('user_id'));		
		} 
		catch (ModelNotFoundException $e) 
		{
			return back()->withError('User not found by ID ' . $request->input('user_id'))->withInput();
		}
		return view('users.sreach', compact('user'));	
	}

	public function show($id)
	{
		try {
			$user = User::findOrFail($id);
			$data = ['msg' => $user,'code' => 200];
			return response()->json($data);
		} catch (\Exception $e) {
			return response()->json(ApiError::errorMessage('Cant not ID :' .$id .' about table User' ,404));

		}
	}
}
